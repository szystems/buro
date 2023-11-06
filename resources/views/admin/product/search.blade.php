
                <form action="{{ url('products') }}" method="GET">
                    @csrf
                    <div class="row">

                        <div class="col-md-12 mb-0">
                            <label for=""><strong>{{ __('Filter by') }}:</strong></label>

                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">{{ __('Producto Name/Code') }} </label>
                            {{-- <select class="form-select px-2" aria-label="Default select example" name="fproduct"> --}}
                            <input class="form-select px-2" list="productListOptions" placeholder="{{ __('Search Product by Name/code...') }}" name="fproduct" value="{{ $queryProduct }}">
                            <datalist id="productListOptions">
                                <option value="">{{ __('All') }}</option>
                                @if ($queryProduct != null)
                                    <option selected value="{{ $queryProduct }}" >{{ $queryProduct }}</option>
                                @endif
                                @foreach ($filterProducts as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }} / {{ $item->code }}</option>
                                @endforeach
                            </datalist>
                            {{-- </select> --}}
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="">{{ __('Category') }}</label>
                            <select class="form-select px-2" aria-label="Default select example" name="fcategory">
                                <option value="">{{ __('All') }}</option>
                                @if ($queryCategory != null)
                                    <option selected value="{{ $queryCategory }}" >{{ $queryCategory }}</option>
                                @endif
                                @foreach ($filterCategories as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="">Stock</label>
                            <select class="form-select px-2" aria-label="Default select example" name="fstock">
                                <option value=">=">{{ __('All') }}</option>
                                @if ($queryStock != '>=')
                                    @if ($queryStock == '<=')
                                        <option selected value="<=">{{ __('Out of Stock') }}</option>
                                    @else
                                        <option selected value=">" >{{ __('With Stock') }}</option>
                                    @endif
                                @endif
                                <option value="<=">{{ __('Out of Stock') }}</option>
                                <option value=">">{{ __('With Stock') }}</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="">{{ __('Status') }}</label>
                            <select class="form-select px-2" aria-label="Default select example" name="fstatus">
                                <option value="">All</option>
                                @if ($queryStatus != null)
                                    @if ($queryStatus == '0')
                                        <option selected value="0">{{ __('Disabled') }}</option>
                                    @else
                                        <option selected value="1">{{ __('Enabled') }}</option>
                                    @endif
                                @endif
                                <option value="0">{{ __('Disabled') }}</option>
                                <option value="1">{{ __('Enabled') }}</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="">{{ __('Trending') }}</label>
                            <select class="form-select px-2" aria-label="Default select example" name="ftrending">
                                <option value="">{{ __('All') }}</option>
                                @if ($queryTrending != null)
                                    @if ($queryTrending == '0')
                                        <option selected value="0">{{ __('Disabled') }}</option>
                                    @else
                                        <option selected value="1">{{ __('Enabled') }}</option>
                                    @endif
                                @endif
                                <option value="0">{{ __('Disabled') }}</option>
                                <option value="1">{{ __('Enabled') }}</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="">{{ __('Discount') }}</label>
                            <select class="form-select px-2" aria-label="Default select example" name="fdiscount">
                                <option value="">{{ __('All') }}</option>
                                @if ($queryDiscount != null)
                                    @if ($queryDiscount == '0')
                                        <option selected value="0">{{ __('Disabled') }}</option>
                                    @else
                                        <option selected value="1">{{ __('Enabled') }}</option>
                                    @endif
                                @endif
                                <option value="0">{{ __('Disabled') }}</option>
                                <option value="1">{{ __('Enabled') }}</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3" >
                            <button type="submit" class="btn btn-info m-1 p-4 w-100 float-right b-3"><i class="material-icons">filter_list</i>{{ __('Filter') }}</button>
                        </div>
                    </div>
                </form>
