<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image'
        ]);

        if ($request->hasFile('image')){
            $path = $request->file('image')->store('public/_vehicles');
            $name = basename($path);

            $res = [
                "status" => 'success',
                'name' => $name,
                'error' => false
            ];

            return response()->json($res);
        }

        return response()->json([
            'error' => true,
            'message' => 'Upload failed'
        ], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($imageName)
    {
        try{
            // First lets find whether the file kept in db ? if so delete entry too
            $img = Image::where('image','=', $imageName)->first();
            if ($img)
                $img->delete();

            Storage::delete('public/_vehicles/' . $imageName);
            return response()->json(['message' => 'File deleted successfully']);
        }catch (\Exception $e){
            return response()->json(['error' => 'true', 'message' => $e->getMessage()], 401);
        }
    }
}
