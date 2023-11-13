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

        <div class="container-fluid py-4">
            <div class="row">

                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3"><i class="material-icons opacity-10">movie</i> {{ __('Videos') }} ({{ $videos->count() }})</h6>
                            </div>
                        </div>

                        <div class="card-body p-4 pt-5">

                            <p>
                                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="material-icons opacity-10">add</i> {{ __('Add Video') }}
                                </button>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <form action="{{ url('insert-video') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12 mb-3">
                                                <label for="">{{ __('Name') }}</label>
                                                <input type="text" class="form-control border px-2 " name="name" value="{{ old('name') }}" >
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
                                                <textarea name="description" cols="30" rows="5" class="form-control border px-2 " >{{ old('description') }}</textarea>
                                                @if ($errors->has('description'))
                                                    <span class="help-block opacity-7">
                                                            <strong>
                                                                <font color="Red">{{ $errors->first('description') }}</font>
                                                            </strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="">{{ __('Video') }}</label>
                                                <input type="file" name="file_video" class="form-control border">
                                                @if ($errors->has('file_video'))
                                                    <span class="help-block opacity-7">
                                                            <strong>
                                                                <font color="red">{{ $errors->first('file_video') }}</font>
                                                            </strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="col-md-12 mb-3" >
                                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                <button type="submit" class="btn btn-info float-end"><i class="material-icons">save</i> {{ __('Save') }}</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>

                        <div class="card-body p-4 pt-5">
                            @if ($videos->count() == 0)
                                <div class="card-header p-4 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="alert alert-primary text-white" role="alert">
                                        <strong>{{ __('No videos added or found!') }}</strong>
                                    </div>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-sm align-products-center mb-0 table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('Video') }}</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('Description') }}</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('Date') }}</th>
                                                <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><i class="material-icons">format_list_bulleted</i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($videos as $video)
                                                <tr>
                                                    @php
                                                        $created_at = date("d-m-Y", strtotime($video->created_at));
                                                    @endphp
                                                    <td>
                                                        <div class="d-flex flex-column justify-content-center text-center">

                                                            <h6 class="mb-0 text-xs">{{ $video->name }}</h6>
                                                            {{-- <p class="text-xs text-secondary mb-0">CUI:{{ $atleta->cui_dpi }} - {{ __('Phone') }}/Whatsapp:{{ $atleta->phone }}/{{ $atleta->whatsapp }} - Email:{{ $atleta->email }}</p> --}}
                                                        </div>
                                                        <div class="d-flex px-2 py-1 justify-content-center">
                                                            @if ($video->file_video)
                                                                <div>
                                                                    <video width="320" height="240" controls>
                                                                        <source src="{{ asset('assets/uploads/videos/'.$video->file_video) }}" type="video/mp4">
                                                                        {{-- <source src="{{ asset('assets/uploads/videos/'.$video->file_video) }}" type="video/ogg"> --}}
                                                                        {{ __('Your browser does not support the video tag.') }}
                                                                    </video>
                                                                </div>
                                                            @endif

                                                        </div>

                                                    </td>
                                                    <td class="align-middle text-center text-sm"><strong><textarea readonly class="form-control border px-2" rows="5">{{ $video->description }}</textarea></strong></td>
                                                    <td class="align-middle text-center text-sm"><strong>{{ $created_at }}</strong></td>
                                                    <td class="align-middle text-sm">
                                                        {{-- <a href="{{ url('show-video/'.$inscription->id) }}" type="button" class="btn btn-info"><i class="material-icons">visibility</i></a> --}}
                                                        {{-- <a href="{{ url('edit-video/'.$video->id) }}" type="button" class="btn btn-warning"><i class="material-icons">edit</i></a> --}}
                                                        <button type="button" class="btn bg-gradient-warning" data-bs-toggle="modal" data-bs-target="#editModalVideo-{{ $video->id }}">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#deleteModalVideo-{{ $video->id }}">
                                                            <i class="material-icons">delete</i>
                                                        </button>

                                                    </td>
                                                </tr>
                                            @include('admin.course.deletemodalvideo')
                                            @include('admin.course.editmodalvideo')
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            @endif

                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p> --}}

                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3"><i class="material-icons opacity-10">hearing</i> {{ __('Audios') }} ({{ $audios->count() }})</h6>
                            </div>
                        </div>

                        <div class="card-body p-4 pt-5">

                            <p>
                                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="material-icons opacity-10">add</i> {{ __('Add Audio') }}
                                </button>
                            </p>
                            <div class="collapse" id="collapseExample2">
                                <div class="card card-body">
                                    <form action="{{ url('insert-audio') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12 mb-3">
                                                <label for="">{{ __('Name') }}</label>
                                                <input type="text" class="form-control border px-2 " name="name" value="{{ old('name') }}" >
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
                                                <textarea name="description" cols="30" rows="5" class="form-control border px-2 " >{{ old('description') }}</textarea>
                                                @if ($errors->has('description'))
                                                    <span class="help-block opacity-7">
                                                            <strong>
                                                                <font color="Red">{{ $errors->first('description') }}</font>
                                                            </strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="">{{ __('Audio') }}</label>
                                                <input type="file" name="file_audio" class="form-control border">
                                                @if ($errors->has('file_audio'))
                                                    <span class="help-block opacity-7">
                                                            <strong>
                                                                <font color="red">{{ $errors->first('file_audio') }}</font>
                                                            </strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="col-md-12 mb-3" >
                                                <button type="submit" class="btn btn-info float-end"><i class="material-icons">save</i> {{ __('Save') }}</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>

                        <div class="card-body p-4 pt-5">
                            @if ($audios->count() == 0)
                                <div class="card-header p-4 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="alert alert-primary text-white" role="alert">
                                        <strong>{{ __('No audios added or found!') }}</strong>
                                    </div>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-sm align-products-center mb-0 table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('Audio') }}</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('Description') }}</th>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('Date') }}</th>
                                                <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><i class="material-icons">format_list_bulleted</i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($audios as $audio)
                                                <tr>
                                                    @php
                                                        $created_at = date("d-m-Y", strtotime($audio->created_at));
                                                    @endphp
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            @if ($audio->file_audio)
                                                                <div>
                                                                    <img src="{{ asset('assets/uploads/videos/'.$audio->file_video) }}" class="avatar avatar-sm me-3">
                                                                </div>
                                                            @endif
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-xs">{{ $audio->name }}</h6>
                                                            {{-- <p class="text-xs text-secondary mb-0">CUI:{{ $atleta->cui_dpi }} - {{ __('Phone') }}/Whatsapp:{{ $atleta->phone }}/{{ $atleta->whatsapp }} - Email:{{ $atleta->email }}</p> --}}
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm"><strong><textarea readonly class="form-control border px-2" rows="5">{{ $audio->description }}</textarea></strong></td>
                                                    <td class="align-middle text-center text-sm"><strong>{{ $created_at }}</strong></td>
                                                    <td class="align-middle text-sm">
                                                        {{-- <a href="{{ url('show-video/'.$inscription->id) }}" type="button" class="btn btn-info"><i class="material-icons">visibility</i></a> --}}
                                                        <a href="{{ url('edit-audio/'.$audio->id) }}" type="button" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                        <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#deleteModalAudio-{{ $audio->id }}">
                                                            <i class="material-icons">delete</i>
                                                        </button>

                                                    </td>
                                                </tr>
                                            @include('admin.course.deletemodalaudio')
                                            @endforeach
                                        </tbody>
                                    </table>
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
        </div>
    </div>
    @endsection
