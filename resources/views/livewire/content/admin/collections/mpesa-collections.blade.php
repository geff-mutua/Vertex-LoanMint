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
                                <input wire:model="date_to" type="date" class="form-control" id="">
                            </div>
                            <div class="col-md-3 user_plan">
                                <label for="">Branch Name</label>
                                <select wire:model="branch" class="form-select text-capitalize">
                                    <option value="All" class="text-capitalize">All</option>
                                  @forelse ($branches as $item)
                                  <option value="{{$item->id}}" class="text-capitalize">{{$item->name}}</option>
                                  @empty
                                      
                                  @endforelse
                                </select>
                            </div>
                            <div class="col-md-3 user_status">
                                <label for="">Repayment Status</label>
                                <select wire:model="status" class="form-select text-capitalize">
                                   
                                    <option value="All" class="text-capitalize">All</option>
                                    <option value="1" class="text-capitalize">Active</option>
                                    <option value="0" class="text-capitalize">Pending</option>
                                    <option value="2" class="text-capitalize">Rejected</option>
                                  
                                </select>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <div class="card-header border-bottom">
               
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

                                <th style="font-size: 10px">Loanee</th>
                                <th style="font-size: 10px">Type</th>
                                <th style="font-size: 10px">Loan Id</th>
                                <th style="font-size: 10px">Date</th>
                                <th style="font-size: 10px;text-align:right">Amount</th>
                                <th style="font-size: 10px">Status</th>
                               
                    
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
                                        {{ $item->loan->borrower->fullname() }}
                                        
                                    </td>
                                    <td style="font-size:12px">
                                        {{ $item->transaction_type }}
                                    </td>
                                    <td style="font-size:12px">
                                        {{ $item->loan->transaction_code }}
                                    </td>



                                    <td style="font-size:12px">
                                        {{ \Carbon\Carbon::parse($item->date)->format('Y-M-d') }}
                                    </td>
                                    <td style="font-size:12px;text-align:right">
                                        {{ number_format($item->amount,2) }}
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


                                  

                                    
                                </tr>

                        @empty
                            @endforelse
                            <tr>
                                <td colspan="4" style="text-align: right;font-weight:bold">TOTAL</td>
                                <td style="text-align: right;font-weight:bold"></td>
                                <td  style="font-weight:bold;text-align: right;">{{number_format($summations['total'],2)}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
