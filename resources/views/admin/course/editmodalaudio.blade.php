!-- Delete Modal -->
<div class="modal fade" id="editModalAudio-{{ $audio->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-normal" id="exampleModalLabel"><i class="material-icons opacity-10">hearing</i> {{ __('Edit') }} {{ __('Audio') }}</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('update-audio/'.$audio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body" align="center">
                <br>

                <div class="col-md-12 mb-3">
                    <label for="">{{ __('Name') }}</label>
                    <input type="text" class="form-control border px-2 " name="name" value="{{ $video->name }}">
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
                    <textarea name="description" cols="30" rows="5" class="form-control border px-2 ">{{ $video->description }}</textarea>
                    @if ($errors->has('description'))
                        <span class="help-block opacity-7">
                                <strong>
                                    <font color="red">{{ $errors->first('description') }}</font>
                                </strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-3 mb-3">
                    <label for="">{{ __('Change Image') }}</label>
                    <input type="file" name="image" class="form-control border">
                </div>
                @if ($video->file_video)
                <div class="col-md-9 mb-3">
                    {{-- <label for="">{{ __('Image') }}</label> --}}
                    <video width="320" height="240" controls>
                        <source src="{{ asset('assets/uploads/videos/'.$video->file_video) }}" type="video/mp4">
                        <source src="{{ asset('assets/uploads/videos/'.$video->file_video) }}" type="video/ogg">
                        {{ __('Your browser does not support the video tag.') }}
                    </video>
                </div>
                @endif

            </div>
            <div class="modal-footer">
                <input type="hidden" name="inscription_id" value="{{ $video->id }}">
                <button type="button" class="btn bg-gradient-info" data-bs-dismiss="modal"><i class="material-icons">close</i> {{ __('Cancel') }}</button>
                <button type="submit" class="btn btn-success"><i class="material-icons">payments</i> {{ __('Save') }}</button>
            </div>
        </form>
      </div>
    </div>
  </div>
