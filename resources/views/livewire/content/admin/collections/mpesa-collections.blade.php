<div>
    @section('title', 'Mpesa Repayments')

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
                                        <span class="h6 mb-0">Total Collections</span>
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
        <div class="col-md-12 mb-2">
            <div class="card-header border-bottom">
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <h5 class="card-title mb-3">Filter Transactions</h5>
                    <div class="col-md-3 user_role">
                      <label for="">Date From</label>
                      <input type="date" class="form-control" name="" id="">
                    </div>
                    <div class="col-md-3 user_plan">
                        <label for="">Date To</label>
                        <input type="date" class="form-control" name="" id="">
                    </div>
                    <div class="col-md-3 user_plan">
                        <label for="">Branch Name</label>
                        <select id="FilterTransaction" class="form-select text-capitalize">
                           
                            <option value="Pending" class="text-capitalize">Pending</option>
                            <option value="Active" class="text-capitalize">Active</option>
                            <option value="Inactive" class="text-capitalize">Inactive</option>
                            <option value="Inactive" class="text-capitalize">Rejected</option>
                        </select>
                    </div>
                    <div class="col-md-3 user_status">
                        <label for="">Repayment Status</label>
                        <select id="FilterTransaction" class="form-select text-capitalize">
                            <option value=""> Filter By Status</option>
                            <option value="Pending" class="text-capitalize">All</option>
                            <option value="Pending" class="text-capitalize">Pending</option>
                            <option value="Active" class="text-capitalize">Approved</option>
                            <option value="Inactive" class="text-capitalize">Rejected</option>
                        </select>
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
                                <th style="font-size: 10px">Amount</th>
                                <th style="font-size: 10px">Org.Balance</th>
                                <th style="font-size: 10px">status</th>
                    
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $item)
                                <tr>
                                    <td style="font-size:10px">{{ $loop->iteration }}</td>

                                    <td style="font-size:12px">
                                        {{ $item->reference_code }}
                                    </td>

                                    <td style="font-size:12px">
                                        {{ $item->loan->borrower->first_name }}
                                        {{ $item->loan->borrower->last_name }}
                                    </td>
                                    <td style="font-size:12px">
                                        {{ $item->payment_option }}
                                    </td>



                                    <td style="font-size:12px">
                                        {{ \Carbon\Carbon::parse($item->date)->format('Y-M-d') }}
                                    </td>
                                    <td style="font-size:12px;text-align:right">
                                        {{ number_format($item->amount) }}
                                    </td>

                                    <td style="font-size:12px">
                                        {{ $item->business_balance }}
                                    </td>
                                    <td style="font-size:12px">
                                        @if ($item->status == '0')
                                            <span class="badge bg-label-warning">Pending </span>
                                        @elseif($item->status == '1')
                                            <span class="badge bg-label-success">Approved</span>
                                        @else
                                            <span class="badge bg-label-danger">Rejected</span>
                                        @endif
                                    </td>


                                    <td style="font-size:12px">
                                        <small style="font-size:12px; cursor: pointer;" class="text-info"
                                            data-bs-toggle="modal" wire:click="transactionDetails({{ $item->id }})"
                                            data-bs-target="#transactionDetails">Details</small>
                                    </td>

                                    @livewire('content.admin.collections.transactions.transaction-detail')
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
