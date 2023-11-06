
                <form action="{{ url('course-categories') }}" method="GET">
                    @csrf
                    <div class="row">

                        <div class="col-md-12 mb-0">
                            <label for=""><strong>{{ __('Search') }} {{ __('Course Category') }}:</strong></label>

                        </div>
                        <div class="col-md-6 mb-3">

                            <input class="form-select px-2" list="categoryListOptions" placeholder="{{ __('Search') }}..." name="fcategory" value="{{ $queryCategory }}">
                            <datalist id="categoryListOptions">
                                <option value="">{{ __('All') }}</option>
                                @if ($queryCategory != null)
                                    <option selected value="{{ $queryCategory }}" >{{ $queryCategory }}</option>
                                @endif
                                @foreach ($filterCategories as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </datalist>
                            {{-- </select> --}}
                        </div>
                        <div class="col-md-2 mb-3" >
                            <button type="submit" class="btn btn-info"><i class="material-icons">search</i> {{ __('Search') }}</button>
                        </div>
                    </div>
                </form>
