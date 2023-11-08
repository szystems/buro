@extends('layouts.admin')

@section('content')
    <div class="row">

        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">local_library</i>
                    </div>

                    <div class="text-center pt-1">
                        {{-- <p class="text-sm mb-0 text-capitalize">Today's Money</p> --}}
                        <h4 class="mb-0">{{ __('Courses') }}</h4>
                    </div>
                    <hr class="dark horizontal my-0">
                </div>
                <div class="card-body p-3 pt-2">
                    <h4><u>{{ __('Show') }} {{ __('Course') }}</u></h4>
                    <div>
                        <a href="{{ url('edit-course/'.$course->id) }}" type="button" class="btn btn-warning"><i class="material-icons">edit</i></a>
                        <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $course->id }}">
                            <i class="material-icons">delete</i>
                        </button>
                        @include('admin.course.deletemodal')
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for=""><strong>{{ __('Name') }}</strong></label>
                            <p>{{ $course->name }}</p>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for=""><strong>{{ __('Course Category') }}</strong></label>
                            <p>{{ $course->category_courses->name }}</p>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for=""><strong>{{ __('Slug') }}</strong></label>
                            <p>{{ $course->slug }}</p>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="show"
                                    {{ $course->show == 1 ? 'checked' : '' }} disabled>
                                <label class="form-check-label" for="flexSwitchCheckDefault"><strong>{{ __('Hide/Show') }}</strong></label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="popular"
                                    {{ $course->popular == 1 ? 'checked' : '' }} disabled>
                                <label class="form-check-label" for="flexSwitchCheckDefault"><strong>Popular</strong></label>
                            </div>
                            @if ($course->file_pdf)
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons opacity-10">picture_as_pdf</i> {{ __('Show PDF') }}</button><br>
                                <a href="{{ asset('assets/uploads/courses_pdf/'.$course->file_pdf) }}" type="button" class="btn btn-primary" target="blank__"><i class="material-icons opacity-10">download</i> {{ __('Download') }} {{ __('PDF') }}</a>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for=""><strong>{{ __('Description') }}</strong></label>
                            <textarea rows="6" class="form-control border px-2" readonly>{{ $course->description }}</textarea>
                        </div>


                        <!-- Modal PDF-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ver PDF</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <embed src="{{ asset('assets/uploads/courses_pdf/'.$course->file_pdf) }}#zoom=100" frameborder="0" width="100%" height="600px">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @if ($course->image)
                            <div class="col-md-8 mb-3">
                                <label for=""><strong>{{ __('Image') }}</strong></label><br>
                                <img class="border-radius-md w-25" src="{{ asset('assets/uploads/courses/' . $course->image) }}" alt="Course Image">
                            </div>
                        @endif
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p> --}}
                    </div>
                </div>
            </div>

        </div>
    @endsection
