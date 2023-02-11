<div>
    @section('title', 'Collections')

    <div class="row">

        <div class="col-xl-12 mb-4">
            <div class="card">
                <h5 class="card-header">Payment Collections</h5>
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

                                        <small>Ksh {{ number_format($summations['total_collections']) }}</small>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-check custom-option custom-option-basic">
                                <label class="form-check-label custom-option-content" for="customRadioTemp2">
                                    <input name="customRadioTemp" class="form-check-input" type="radio" value=""
                                        id="customRadioTemp2" />
                                    <span class="custom-option-header">
                                        <span class="h6 mb-0">Loan Repayments</span>

                                    </span>
                                    <span class="custom-option-body">
                                        <small>Ksh {{ number_format($summations['total_repayments']) }}</small>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-check custom-option custom-option-basic">
                                <label class="form-check-label custom-option-content" for="customRadioTemp2">
                                    <input name="customRadioTemp" class="form-check-input" type="radio" value=""
                                        id="customRadioTemp2" />
                                    <span class="custom-option-header">
                                        <span class="h6 mb-0">Processing Fee</span>

                                    </span>
                                    <span class="custom-option-body">
                                        <small>Ksh {{ number_format($summations['total_processing_fee']) }}</small>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-check custom-option custom-option-basic">
                                <label class="form-check-label custom-option-content" for="customRadioTemp2">
                                    <input name="customRadioTemp" class="form-check-input" type="radio" value=""
                                        id="customRadioTemp2" />
                                    <span class="custom-option-header">
                                        <span class="h6 mb-0">Pending Approvals</span>

                                    </span>
                                    <span class="custom-option-body">
                                        <small>Ksh {{ number_format($summations['total_pending']) }}</small>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- DISPLAY PAYMENTS --}}
        <div class="col-xl-12 mb-4">
            <div class="card">
                <h5 class="card-header">Payment Collections</h5>
                <div class="card-body">
                    <table class="table" id="dataTable1">
                        <thead>
                            <tr>
                                <th class="text-white" style="font-size: 10px">#</th>

                                <th class="text-white" style="font-size: 10px">Reference</th>

                                <th class="text-white" style="font-size: 10px">Client</th>
                                <th class="text-white" style="font-size: 10px">Payment</th>
                                <th class="text-white" style="font-size: 10px">Date</th>
                                <th class="text-white" style="font-size: 10px">Amount</th>
                                <th class="text-white" style="font-size: 10px">Business Balance</th>
                                <th class="text-white" style="font-size: 10px">status</th>
                                <th class="text-white" style="font-size: 10px">Action</th>
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
