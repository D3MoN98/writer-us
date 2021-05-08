@component('mail::message')
# Message

Hello, You have a new message from {{$user->name}} ({{$user->email}}).

Message: {{$message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
