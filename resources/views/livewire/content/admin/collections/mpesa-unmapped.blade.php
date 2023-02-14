<div>
    @section('title', 'Unmapped Repayments')

    <div class="row">

        <div class="col-xl-12 mb-4">
            <div class="card">
                <h5 class="card-header">@yield('title')</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md mb-md-0 mb-2 ">
                            <div class="form-check custom-option custom-option-basic">
                                <label class="form-check-label custom-option-content" for="customRadioTemp1">
                                    <input name="customRadioTemp" class="form-check-input" type="radio" value=""
                                        id="customRadioTemp1" checked />
                                    <span class="custom-option-header">
                                        <span class="h6 mb-0">Total @yield('title')</span>
                                    </span>
                                    <span class="custom-option-body">

                                        <small>Ksh {{ number_format($summations['total']) }}</small>
                                    </span>
                                </label>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 mb-4">
            <div class="card">
                <h5 class="card-header">Filter Transactions</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                            <div class="col-md-3 user_role">
                              <label for="">Date From</label>
                              <input type="date" wire:model="date_from" class="form-control" id="">
                            </div>
                            <div class="col-md-3 user_plan">
                                <label for="">Date To</label>
                                <input type="date" wire:model="date_to" class="form-control" id="">
                            </div>
                            <div class="col-md-3 user_plan">
                                <label for="">Business Shortcode</label>
                                <select wire:model="shortcode" class="form-select text-capitalize">
                                    <option value="All" class="text-capitalize">All</option>
                            
                                </select>
                            </div>
                            <div class="col-md-3 user_status">
                               
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

        {{-- DISPLAY PAYMENTS --}}
        <div class="col-xl-12 mb-4">
            <div class="card">
                <h5 class="card-header">@yield('title')</h5>
                <div class="card-body">
                    <table class="table" id="dataTable1">
                        <thead>
                            <tr>
                                <th style="font-size: 10px">#</th>

                                <th style="font-size: 10px">Reference</th>

                                <th style="font-size: 10px">Names</th>
                                <th style="font-size: 10px">Shortcode</th>
                                <th style="font-size: 10px">Msisdn</th>
                                <th style="font-size: 10px">Bill Number</th>
                                <th style="font-size: 10px">Date</th>
                                <th style="font-size: 10px">Time</th>
                                <th style="font-size: 10px">Amount</th>
                           
                                <th style="font-size: 10px">status</th>
                    
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $item)
                                <tr>
                                    <td style="font-size:10px">{{ $loop->iteration }}</td>

                                    <td style="font-size:12px">
                                        {{ $item->transaction_id }}
                                    </td>

                                    <td style="font-size:12px">
                                        {{ $item->first_name }}
                                        {{ $item->middle_name }}
                                        {{ $item->last_name }}
                                    </td>
                                    <td style="font-size:12px">
                                        {{ $item->business_shortcode }}
                                    </td>
                                    <td style="font-size:12px">
                                        {{ $item->msisdn }}
                                    </td>



                                   
                                    <td style="font-size:12px">
                                        {{ $item->bill_ref_number }}
                                    </td>
                                    <td style="font-size:12px">
                                        {{ $item->date }}
                                    </td>
                                    <td style="font-size:12px">
                                        {{ Carbon\Carbon::parse($item->created_at)->format('h:i A') }}
                                    </td>
                                    <td style="font-size:12px">
                                        {{ number_format($item->transaction_amount) }}
                                    </td>
                                    <td style="font-size:12px">
                                        @if ($item->mapped == '0')
                                            <span class="badge bg-label-warning">Pending </span>
                                        @elseif($item->mapped == '1')
                                            <span class="badge bg-label-success">Approved</span>
                                        @else
                                            <span class="badge bg-label-danger">Rejected</span>
                                        @endif
                                    </td>


                              
                                    
                                </tr>

                            @empty
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
