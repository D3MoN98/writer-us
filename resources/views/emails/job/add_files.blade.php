@component('mail::message')
# Job File Added

Hello {{$job->user->name}},

Files added to your job. Please review them on your dashboard.

@component('mail::button', ['url' => route('job.edit', $job->id)])
Job Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
