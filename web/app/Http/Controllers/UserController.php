<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistered;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
	/**
	 * UserController constructor.
	 */
	public function __construct() {
		$this->middleware('admin');
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = User::where('id' , '!=', auth()->user()->id)->paginate(25);
    	$users->withPath('users');
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $request->validate([
		    'name' => 'required|string|min:2|max:50',
		    'email' => 'required|email|min:10|max:100|unique:users',
		    'nic' => 'required|min:8|max:20|unique:users',
		    'type' => 'required|in:admin,officer',
		    'address' => 'min:10|string',
		    'gender' => 'required|in:male,female',
		    'image' => 'sometimes|mimes:jpg,jpeg,bmp,png|max:10000'
	    ]);

	    $password = $this->generateRandomString();
		$user = new User();
		$user->name = $request->get('name');
		$user->nic  = $request->get('nic');
		$user->type = $request->get('type');
		$user->gender = $request->get('gender');
		$user->address = $request->get('address');
		$user->email = $request->get('email');
		$user->password = bcrypt($password);

		if (!$request->hasFile('image')){
			if ($request->get('gender') == 'male')
				$user->image = '_admin/img/avatar.png';
			else
				$user->image = '_admin/img/avatar2.png';
		}else{
			$path = $request->file('image')->store('public/_avatars/admin');
			$path = str_replace('public', 'storage', $path);
			$user->image = $path;
		}

		$user->save();

		try{
			Mail::to($user->email)->send(new UserRegistered($user, $password));
		}catch (\Exception $e){
			logger('Sending mail failed');
		}

		log_entry(auth()->user() , 'User <b>' . $user->name . '</b> was created');

		return redirect()->route('admin.users')->with(
			callout('Adding user success', 'success', 'User added successfully. Email sent with password')
		);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
	    if ($user->id == auth()->user()->id)
		    return redirect()->route('admin.users.profile');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
    	if ($user->id == auth()->user()->id)
    		return redirect()->route('admin.users.settings');

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
    	if (!$user){
		    return redirect()->route('admin.users')->with(
		    	callout('Updating user failed', 'danger','User update failed.')
		    );
	    }

	    $request->validate([
		    'name' => 'required|string|min:2|max:50',
		    'email' => 'required|email|min:10|max:100|unique:users,email,'. $user->id,
		    'nic' => 'required|min:8|max:20|unique:users,nic,'. $user->id,
		    'type' => 'required|in:admin,officer',
		    'address' => 'required|min:10|string',
		    'gender' => 'required|in:male,female',
		    'image' => 'sometimes|mimes:jpg,jpeg,bmp,png|max:10000'
	    ]);

	    $user->name = $request->get('name');
	    $user->nic  = $request->get('nic');
	    $user->type = $request->get('type');
	    $user->gender = $request->get('gender');
	    $user->address = $request->get('address');
	    $user->email = $request->get('email');

	    if ($request->hasFile('image')){
		    if (!strpos($user->image, '_admin/img/avatar.png') && !strpos($user->image, '_admin/img/avatar2.png')){
			    $old = str_replace('storage', 'public', $user->image);
			    Storage::delete($old);
		    }

		    $path = $request->file('image')->store('public/_avatars/admin');
		    $path = str_replace('public', 'storage', $path);
		    $user->image = $path;

	    }else if ($request->get('remove_image') == true){
		    if ($request->get('gender') == 'male')
			    $user->image = '_admin/img/avatar.png';
		    else
			    $user->image = '_admin/img/avatar2.png';
	    }

	    $user->save();

	    log_entry(auth()->user() , "User <b>" . $user->name . "</b> was updated");

	    return redirect()->to('/admin/users')->with(
	    	callout('Updating user success', 'success', 'User updated successfully.')
	    );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $success = $user->delete();
        $callout_type = 'success';
        $callout = 'User <b>'. $user->name . "</b> removed successfully";
        $callout_title = 'User removed';

        if (!$success){
	        $callout_type = 'danger';
	        $callout = 'User removing failed due to unknown error';
	        $callout_title = 'Failed removing user';
        }

	    log_entry(auth()->user() , 'User <b>' . $user->name . '</b> was removed');

        return redirect()->route('admin.users')->with(
        	callout($callout_title, $callout_type, $callout)
        );
    }

	/**
	 * Show user log
	 *
	 * @param User $user
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function showLog(User $user){
    	return view('admin.users.log', compact('user'));
    }

	/**
	 * Show profile
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function showProfile(){
    	return view('admin.users.show')->with('user', auth()->user());
    }

	/**
	 * Show settings
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function showSettings(){
    	$user = User::find(auth()->user()->id);
		return view('admin.users.settings', compact('user'));
	}

	/**
	 * Search by AJAX
	 *
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function searchAJAX(Request $request){
    	$search = $request->get('q', '');

    	$users = \DB::table('users')
		            ->select('id', 'name', 'nic', 'email')
		            ->where('nic', 'LIKE' , '%'.$search.'%')
		            ->orWhere('name', 'LIKE', '%'.$search.'%')
		            ->orWhere('email', 'LIKE', '%'.$search.'%')
		            ->orderBy('name', 'desc')
		            ->limit(5)
		            ->get();

    	return $users;
	}

	/**
	 * Save settings
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function saveSettings(Request $request){
		$user = auth()->user();

		$request->validate([
			'name' => 'required|string|min:2|max:50',
			'email' => 'required|email|min:10|max:100|unique:users,email,'. $user->id,
			'address' => 'required|min:10|string',
			'image' => 'sometimes|mimes:jpg,jpeg,bmp,png|max:10000'
		]);

		$user->name = $request->get('name');
		$user->address = $request->get('address');
		$user->email = $request->get('email');

		if ($request->hasFile('image') && $request->get('remove_image') != true){
			if (!strpos($user->image, '_admin/img/avatar.png') && !strpos($user->image, '_admin/img/avatar2.png')){
				$old = str_replace('storage', 'public', $user->image);
				Storage::delete($old);
			}

			$path = $request->file('image')->store('public/_avatars/admin');
			$path = str_replace('public', 'storage', $path);
			$user->image = $path;

		}else if ($request->get('remove_image') == true){
			if ($user->gender == 'male')
				$user->image = '_admin/img/avatar.png';
			else
				$user->image = '_admin/img/avatar2.png';
		}

		$user->save();

		log_entry($user, 'Updated preferences');

		return redirect()->route('admin.users.settings')->with(
			callout('Information', 'success', 'Preferences was updated')
		);
	}

	/**
	 * Updates password of user
	 *
	 * @param Request $request
	 *
	 * @return $this|\Illuminate\Http\RedirectResponse
	 */
	public function updatePassword(Request $request){
		$request->validate([
			'current_password' => 'required',
			'password' => 'required|confirmed',
		]);

		if (!Hash::check($request->current_password, auth()->user()->getAuthPassword())){
			return redirect()->back()->withErrors(['current_password' => 'Password is not correct'])->withInput();
		}

		auth()->user()->password = bcrypt($request->get('password'));
		auth()->user()->save();

		log_entry(auth()->user(), 'Password updated');

		return redirect()->route('admin.users.settings')->with(
			callout('Password updated', 'success', 'Your password has been successfully update')
		);
	}

	/**
	 * Generate a random password
	 *
	 * @param int $length
	 *
	 * @return string
	 */
    public function generateRandomString($length = 8) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
		    $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
    }
}
