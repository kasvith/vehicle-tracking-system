@component('mail::message')
# Welcome to VIS

Hi {{ $user->name }},
You are getting this message because you are registered to the system.
To login use this password : {{ $password }}

@component('mail::button', ['url' => 'http://vis.lk/login'])
Login to VIS
@endcomponent

Thanks,<br>
webmaster@vis.lk
@endcomponent
