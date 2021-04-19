@extends('layout.app')

@push('styles')
<style>
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: white !important;
    }
</style>
@endpush

@section('content')

<div class="container">
    <div class="row my-5">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link text-primary" id="v-pills-profile-tab" href="{{route('profile')}}">Profile</a>
                <a class="nav-link text-primary active" href="{{route('job.index')}}">Jobs</a>
                <a class="nav-link text-primary">Payment Method</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content">
                <div class="tab-pane fade show active">
                    <form action="{{route('job.update', $job->id)}}" method="post">

                    </form>
                    <div class="row">
                        @csrf
                        @method('put')

                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Docement Type</label>
                                <select class="form-control" name="job[document_type]" required>
                                    <option value="">Select a document type</option>
                                    <option value="Essay">Essay</option>
                                    <option value="Tem Paper">tem Paper</option>
                                    <option value="Research Paper">Research Paper</option>
                                    <option value="Research Report">research Report</option>
                                    <option value="Coursework">Coursework</option>
                                    <option value="Book report">Book report</option>
                                    <option value="Book Review">Book Review</option>
                                    <option value="Movie Review">Movie Review</option>
                                    <option value="Research Summary">Research Summary</option>
                                    <option value="Dissertation">Dissertation</option>
                                    <option value="Thesis">Thesis</option>
                                    <option value="Thesis Proposal">Thesis Proposal</option>
                                    <option value="Project Proposal">Project Proposal</option>
                                    <option value="Dissertation Chapter-Abstract">Dissertation Chapter-Abstract</option>
                                    <option value="Dissertation Chapter-AbstractA">Dissertation Chapter-AbstractA
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Academic Level</label>
                                <select class="form-control" name="job[academic_level]" required>
                                    <option value="">Select an academic level</option>
                                    <option value="School">School</option>
                                    <option value="College">College</option>
                                    <option value="University">University</option>
                                    <option value="Masters">Masters</option>
                                    <option value="PhD">PhD</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Number of pages :</label>
                                <input type="number" name="job[pages]" class="form-control" placeholder="" required>
                                <label>275 words one page (double spaced)</label>
                            </div>

                            <div class="form-group">
                                <label>Select your subject :</label>
                                <select class="form-control" name="job[subject]" required>
                                    <option value="">Select a subject</option>
                                    <option value="Accounting">Accounting</option>
                                    <option value="Anthropology">Anthropology</option>
                                    <option value="Architecture">Architecture</option>
                                    <option value="Theatre and Film">Theatre and Film</option>
                                    <option value="Biology">Biology</option>
                                    <option value="Entrepreneurship">Entrepreneurship</option>
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="Criminology">Criminology</option>
                                    <option value="Economics">Economics</option>
                                    <option value="Education">Education</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Ethics">Ethics</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Geography">Geography</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="History">History</option>
                                    <option value="Legal Issues">Legal Issues</option>
                                    <option value="Linguistics">Linguistics</option>
                                    <option value="Literature">Literature</option>
                                    <option value="Management">Management</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Mathematics">Mathematics</option>
                                    <option value="Music">Music</option>
                                    <option value="Nursing">Nursing</option>
                                    <option value="Psychology">Psychology</option>
                                    <option value="Sociology">Sociology</option>
                                    <option value="Sport">Sport</option>
                                    <option value="Technology">Technology</option>
                                    <option value="Tourism">Tourism</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Urgency :</label>
                                <select class="form-control" name="job[urgency]" required>
                                    <option value="">Select a urgency</option>
                                    <option value="30 Days">30 Days</option>
                                    <option value="14 Days">14 Days</option>
                                    <option value="10 Days">10 Days</option>
                                    <option value="7 Days">7 Days</option>
                                    <option value="5 Days">5 Days</option>
                                    <option value="3 Days">3 Days</option>
                                    <option value="2 Days">2 Days</option>
                                    <option value="24 Hours">24 Hours</option>
                                    <option value="16 Hours">16 Hours</option>
                                    <option value="12 Hours">12 Hours</option>
                                    <option value="5 Hours">5 Hours</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>What is your topic? </label>
                                <textarea class="form-control" name="job[topic]" placeholder="Write about…"
                                    required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Paper instructions :</label>
                                <textarea class="form-control" name="job[paper_instructions]"
                                    placeholder="Any special requirements? Give us the main idea of the paper and other details (e.g. citation formatting)"
                                    required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
