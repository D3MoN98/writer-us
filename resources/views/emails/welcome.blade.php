@component('mail::message')
# WELCOME

Welcome {{$user->name}},

Thank you for registrating to writer Us.

@component('mail::button', ['url' => url('/')])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
