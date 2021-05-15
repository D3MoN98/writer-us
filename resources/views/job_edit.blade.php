@extends('layout.app')

@push('styles')
<style>
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: white !important;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
@endpush

@section('content')

<div class="container">
    <div class="row my-5">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link text-primary" id="v-pills-profile-tab" href="{{route('profile')}}">Profile</a>
                <a class="nav-link text-primary active" href="{{route('job.index')}}">Jobs</a>
                <a href="{{route('message')}}" class="nav-link text-primary">Send Message</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content">
                <div class="tab-pane fade show active">
                    <form action="{{route('job.update', $job->id)}}" method="post">

                        <div class="row">
                            @csrf
                            @method('put')


                            <div class="col-12">
                                <div class="form-group d-flex justify-content-between">
                                    <h3>Job Details </h3>
                                    <label>Status:
                                        @php
                                        switch($job->status){
                                        case 'revision':
                                        $badge = 'warning';
                                        break;
                                        case 'accepted':
                                        $badge = 'success';
                                        break;
                                        case 'completed':
                                        $badge = 'success';
                                        break;
                                        case 'released':
                                        $badge = 'success';
                                        break;
                                        case 'cancelled':
                                        $badge = 'danger';
                                        break;
                                        default:
                                        $badge = 'primary';
                                        break;
                                        }
                                        @endphp
                                        <span
                                            class="badge badge-{{$badge}}"><strong>{{ucwords($job->status)}}</strong></span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="">Docement Type</label>
                                    <select class="form-control" name="job[document_type]" readonly required>
                                        <option value="">Select a document type</option>
                                        @foreach ($document_types as $item)
                                        <option {{ $job->document_type == $item ? 'selected' : ''}} value="{{$item}}">
                                            {{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Academic Level</label>
                                    <select class="form-control" name="job[academic_level]" readonly required>
                                        <option value="">Select an academic level</option>
                                        @foreach ($academic_levels as $item)
                                        <option {{ $job->academic_level == $item ? 'selected' : '' }} value="{{$item}}">
                                            {{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Number of pages :</label>
                                    <input type="number" name="job[pages]" value="{{$job->pages}}" class="form-control"
                                        placeholder="" readonly required>
                                    <label>275 words one page (double spaced)</label>
                                </div>

                                <div class="form-group">
                                    <label>Select your subject :</label>
                                    <select class="form-control" name="job[subject]" readonly required>
                                        <option value="">Select a subject</option>
                                        @foreach ($subjects as $item)
                                        <option {{ $job->subject == $item ? 'selected' : '' }} value="{{$item}}">
                                            {{$item}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Urgency :</label>
                                    <select class="form-control" name="job[urgency]" readonly required>
                                        <option value="">Select a urgency</option>
                                        @foreach ($urgencies as $item)
                                        <option {{ $job->urgency == $item['value'] ? 'selected' : '' }}
                                            data-urgency-price="{{$item['cost']}}" value="{{$item['value']}}">
                                            {{$item['value']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>What is your topic? </label>
                                    <textarea class="form-control" name="job[topic]" placeholder="Write about…" readonly
                                        required>{{$job->topic}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Paper instructions :</label>
                                    <textarea class="form-control" name="job[paper_instructions]"
                                        placeholder="Any special requirements? Give us the main idea of the paper and other details (e.g. citation formatting)"
                                        readonly required>{{$job->paper_instructions}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Demo Files :</label>
                                    <ul class="list-group">
                                        @php
                                        $demo_file = 0
                                        @endphp
                                        @if ($job->job_files->count() > 0)
                                        @foreach ($job->job_files as $file)
                                        @if ($file->is_demo)
                                        <li class="list-group-item d-flex justify-content-between">File {{$file->id}}
                                            <a class="btn btn-link ml-auto" data-fancybox data-type="iframe"
                                                data-src="{{asset('storage/'.$file->file)}}" href="javascript:;">
                                                View
                                            </a>
                                        </li>
                                        @php
                                        $demo_file++
                                        @endphp
                                        @endif
                                        @endforeach
                                        @endif

                                        @if($demo_file == 0)
                                        <li class="list-group-item d-flex justify-content-between">
                                            No demo file available right now
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label>Final Files :</label>
                                    <ul class="list-group">
                                        @php
                                        $final_file = 0
                                        @endphp
                                        @if ($job->job_files->count() > 0)
                                        @foreach ($job->job_files as $file)
                                        @if (!$file->is_demo)
                                        <li class="list-group-item d-flex justify-content-between">File {{$file->id}}
                                            <a class="btn btn-link ml-auto" data-fancybox data-type="iframe"
                                                data-src="{{asset('storage/'.$file->file)}}" href="javascript:;">
                                                View
                                            </a>
                                        </li>
                                        @php
                                        $final_file++
                                        @endphp
                                        @endif
                                        @endforeach
                                        @endif

                                        @if($final_file == 0)
                                        <li class="list-group-item d-flex justify-content-between">
                                            No final file available right now
                                        </li>
                                        @endif
                                    </ul>
                                </div>

                                @if ($job->status != 'released')
                                <div class="form-group">
                                    <label>Action:</label><br>
                                    @if ($job->status != 'accepted')
                                    <button type="submit" name="accept" value="1" class="btn btn-success accept"><i
                                            class="fas fa-check" aria-hidden="true"></i> Accept</button>
                                    @endif
                                    <button type="button" class="btn btn-warning revision"><i
                                            class="fas fa-redo-alt"></i>
                                        Revision</button>
                                </div>
                                <div class="form-group d-none">
                                    <label>Revision Note:</label>
                                    <textarea name="revision_note" placeholder="Revision note" class="form-control"
                                        id="" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group d-none">
                                    <button type="submit" name="revision" value="1" class="btn btn-warning"><i
                                            class="fas fa-redo-alt"></i>
                                        Revision</button>
                                    <button type="button" class="btn btn-secondary revision-cancel">Cancel</button>
                                </div>
                                @endif

                                @if ($job->status == 'revision')
                                <div class="form-group">
                                    <label for="">Revision Note</label>
                                    <textarea placeholder="Revision note" class="form-control" id="" cols="30" rows="5"
                                        readonly>{{$job->revision_note}}</textarea>
                                </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<script>
    $(document).on('click', '.revision', function(){
        $(this).closest('.form-group').hide();
        $(this).closest('.form-group').next().removeClass('d-none');
        $(this).closest('.form-group').next().next().removeClass('d-none');
    });

    $(document).on('click', '.revision-cancel', function(){
        $('.revision').closest('.form-group').show();
        $(this).closest('.form-group').addClass('d-none');
        $(this).closest('.form-group').prev().addClass('d-none');
    });
</script>
@endpush
