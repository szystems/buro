
                <form action="{{ url('index-courses') }}" method="GET">
                    @csrf
                    <div class="row">

                        <div class="col-md-12 mb-0">


                        </div>
                        <div class="col-md-4 mb-3">
                            <label for=""><strong>{{ __('Search') }} {{ __('Course') }}:</strong></label>
                            <input class="form-select px-2" list="courseListOptions" placeholder="{{ __('Search') }}..." name="fcourse" value="{{ $queryCourse }}">
                            <datalist id="courseListOptions">
                                <option value="">{{ __('All') }}</option>
                                @if ($queryCategory != null)
                                    <option selected value="{{ $queryCourse }}" >{{ $queryCourse }}</option>
                                @endif
                                @foreach ($filterCourses as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </datalist>
                            {{-- </select> --}}
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="">{{ __('Course Category') }}</label>
                            <select class="form-select px-2" aria-label="Default select example" name="fcategory">
                                    @if ($queryCategory != null)
                                        @php
                                            $categoryinfo = \App\Models\CategoryCourse::find($queryCategory);
                                        @endphp
                                        <option selected value="{{ $categoryinfo->id }}">{{ $categoryinfo->name }}</option>
                                    @else
                                        <option selected value="">{{ __('All') }}</option>
                                    @endif
                                    <option value="">{{ __('All') }}</option>
                                    @foreach ($filterCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                            </select>
                            {{-- </select> --}}
                        </div>
                        <div class="col-md-2 mb-3" >
                            <label for="">{{ __('Search') }}</label><br>
                            <button type="submit" class="btn btn-info"><i class="material-icons">search</i></button>
                        </div>
                    </div>
                </form>
