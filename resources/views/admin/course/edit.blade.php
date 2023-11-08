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
                        <h4 class="mb-0">{{ __('Course') }}</h4>
                    </div>
                    <hr class="dark horizontal my-0">
                </div>
                <div class="card-body p-3 pt-2">
                    <h4><u>{{ __('Edit') }} {{ __('Course') }}</u></h4>
                    @if (count($errors)>0)
                        <div class="alert alert-danger text-white" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                      <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('update-course/'.$course->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                @php
                                    $CourseCategory = \App\Models\CategoryCourse::find($course->category_course_id);
                                @endphp
                                <label for="">{{ __('Category') }}</label>
                                <select class="form-select px-2" aria-label="Default select example" name="category_course_id">
                                    <option value="{{ $CourseCategory->id }}">{{ $CourseCategory->name }}</option>
                                    @foreach($filterCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">{{ __('Name') }}</label>
                                <input type="text" class="form-control border px-2 " name="name" value="{{ $course->name }}">
                                @if ($errors->has('name'))
                                    <span class="help-block opacity-7">
                                            <strong>
                                                <font color="red">{{ $errors->first('name') }}</font>
                                            </strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">{{ __('Description') }}</label>
                                <textarea name="description" cols="30" rows="5" class="form-control border px-2 ">{{ $course->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block opacity-7">
                                            <strong>
                                                <font color="red">{{ $errors->first('description') }}</font>
                                            </strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="show" {{ $course->show == 1 ? 'checked':'' }}>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">{{ __('Hide/Show') }}</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="popular" {{ $course->popular == 1 ? 'checked':'' }}>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Popular</label>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="">{{ __('Change Image') }}</label>
                                <input type="file" name="image" class="form-control border">
                            </div>
                            @if ($course->image)
                            <div class="col-md-9 mb-3">
                                {{-- <label for="">{{ __('Image') }}</label> --}}
                                <img class="border-radius-md w-25" src="{{ asset('assets/uploads/courses/'.$course->image) }}" alt="Category Image">
                            </div>
                            @endif
                            <div class="col-md-3 mb-3">
                                <label for="">{{ __('Change PDF') }}</label>
                                <input type="file" name="file_pdf" class="form-control border">
                            </div>
                            @if ($course->file_pdf)
                            <div class="col-md-9 mb-3">
                                <br>
                                <!-- Trigger the modal with a button -->
                                {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">{{ __('Show PDF') }}</button> --}}
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons opacity-10">picture_as_pdf</i> {{ __('Show PDF') }}</button>
                                <a href="{{ asset('assets/uploads/courses_pdf/'.$course->file_pdf) }}" type="button" class="btn btn-primary" target="blank__"><i class="material-icons opacity-10">download</i> {{ __('Download') }} {{ __('PDF') }}</a>

                                <!-- Modal -->

                                <!-- Modal -->
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

                                {{-- <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-lg">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Modal Header</h4>
                                            </div>
                                            <div class="modal-body">

                                                <embed src="{{ asset('assets/uploads/courses_pdf/'.$course->file_pdf) }}"
                                                    frameborder="0" width="100%" height="400px">

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div> --}}

                            </div>
                            @endif

                            <div class="col-md-12 mb-3" >
                                <button type="submit" class="btn btn-success"><i class="material-icons">save</i> {{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p> --}}
                </div>
            </div>
        </div>

    </div>
@endsection
