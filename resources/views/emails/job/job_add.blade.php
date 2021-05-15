@component('mail::message')
# Job Create

Hello {{ucwords(strtolower($job->user->name))}},

You created a job on {{$job->created_at->format('m/d/Y')}} with job id {{$job->id}}, You can check job details using
below link.

@component('mail::button', ['url' => route('job.edit', $job->id)])
View Job Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
