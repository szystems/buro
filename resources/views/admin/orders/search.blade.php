
                <form action="{{ url('orders') }}" method="GET">
                    @csrf
                    <div class="row">

                        <div class="col-md-12 mb-0">
                            <label for=""><strong>{{ __('Filter by') }}:</strong></label>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="">{{ __('From') }} </label>
                                <div class="input-daterange input-group" >
                                    <div class="input-group input-group-dynamic mb-4">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" id="datepickerdesde" aria-label="Amount (to the nearest dollar)" name="fdesde" value="{{ $desde }}" >
                                    </div>

                                </div>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="">{{ __('To') }} </label>
                                <div class="input-daterange input-group" >
                                    <div class="input-group input-group-dynamic mb-4">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" id="datepickerhasta" aria-label="Amount (to the nearest dollar)" name="fhasta"  value="{{ $hasta }}">
                                    </div>

                                </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="">{{ __('Status') }}</label>
                            <select class="form-select px-2" aria-label="Default select example" name="fstatus">
                                <option value="">{{ __('All') }}</option>
                                @if ($queryStatus != null)
                                    @if ($queryStatus == '0')
                                        <option selected value="0">{{ __('Pending') }}</option>
                                    @elseif ($queryStatus == '1')
                                        <option selected value="1">{{ __('Completed') }}</option>
                                    @elseif ($queryStatus == '2')
                                        <option selected value="2">{{ __('Cancelled') }}</option>
                                    @endif
                                @endif
                                <option value="0">{{ __('Pending') }}</option>
                                <option value="1">{{ __('Completed') }}</option>
                                <option value="2">{{ __('Cancelled') }}</option>
                            </select>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="">{{ __('Payment Mode') }}</label>
                            <select class="form-select px-2" aria-label="Default select example" name="fpayment">
                                <option value="">{{ __('All') }}</option>
                                @if ($queryPayment != null)
                                    @if ($queryPayment == 'POD or DBT')
                                        <option selected value="POD or DBT">{{ __('POD or DBT') }}</option>
                                    @else
                                        <option selected value="Paid by PayPal">{{ __('Paid by PayPal') }}</option>
                                    @endif
                                @endif
                                <option value="Paid by PayPal">{{ __('Paid by PayPal') }}</option>
                                <option value="POD or DBT">{{ __('POD or DBT') }}</option>
                            </select>
                        </div>

                        <div class="col-md-2 mb-3" >
                            <button type="submit" class="btn btn-info m-1 p-4 w-100 float-right b-3"><i class="material-icons">filter_list</i>{{ __('Filter') }}</button>
                        </div>
                    </div>
                </form>

                <script>
                    var date = new Date();
                    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

                    var optSimple = {
                        format: "dd-mm-yyyy",
                        language: "es",
                        autoclose: true,
                        todayHighlight: true,
                        todayBtn: "linked",
                        orientation: "bottom auto"
                    };
                    $( '#datepickerdesde' ).datepicker( optSimple );

                    $( '#datepickerhasta' ).datepicker( optSimple );
                </script>
