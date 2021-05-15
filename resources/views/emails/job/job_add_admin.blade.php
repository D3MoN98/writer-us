@component('mail::message')
# Job Added

One job added by {{$job->user->name}} ({{$job->user->email}}), check job details using below link.

@component('mail::button', ['url' => route('admin.job.edit', $job->id)])
View Job Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
