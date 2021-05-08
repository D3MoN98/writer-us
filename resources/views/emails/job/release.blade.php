@component('mail::message')
# Job Released

Hello {{$job->user->email}},

Your job is released by writer us.

@component('mail::button', ['url' => route('job.edit', $job->id)])
Check Job Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
