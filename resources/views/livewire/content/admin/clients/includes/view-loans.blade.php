<div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Client Loans</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body card-datatable table-responsive">
                <table class="table align-items-center mb-0" id="myTable">
                    <thead class="bg-gray-200">

                        <tr>
                            <th class=" text-xs " style="font-size: 12px">
                                Loan</th>
                            <th class=" text-xs " style="font-size: 12px">
                                Principal</th>
                          

                            <th class=" text-xs " style="font-size: 12px">
                                P. Fee</th>
                            <th class=" text-xs " style="font-size: 12px">
                                Disbursement</th>
                            <th class=" text-xs " style="font-size: 12px">
                                Due</th>
                            <th class=" text-xs " style="font-size: 12px">
                                Paid</th>
                            <th class=" text-xs " style="font-size: 12px">
                                Balance</th>
                            <th class=" text-xs " style="font-size: 12px">
                                Release </th>

                            <th class="text-xs " style="font-size: 12px">
                                Maturity</th>
                                <th class="text-xs " style="font-size: 12px">
                                    status</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse($borrower->loan()->orderBy('id','DESC')->get() as $key => $value)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                            
                                    <div  class="d-flex flex-column justify-content-center">
                                        <h6 style="font-size: 12px" class="mb-0 text-sm"><a href="{{route('loan-details',['domain'=>auth()->user()->domain->name,'id'=>$value->id])}}">{{ $value->loan_purpose }}</a></h6>
                                        <small class="text-xs text-info mb-0" style="font-size: 12px">
                                            {{ $value->transaction_code }}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs mb-0" style="font-size: 12px">
                                    {{ number_format($value->amount, 2) }}</p>
                                <p class="text-xs text-info mb-0" style="font-size: 12px">
                                    {{ $value->loanproduct->interest_rate }}%
                                    Rate</p>
                            </td>
                           
                            <td>
                                @if($value->processing_fee==1)
                                @if($value->status == 'Rejected')
                                <span class="text-danger  text-xs "style="font-size: 12px">Rejected</span>
                                @else
                                <p class="text-xs text-warning mb-0" style="font-size: 12px">
                                    Pending</p>
                                <p class="text-xs mb-0 text-success" style="font-size: 12px"><b>
                                        @php
                                        $rate=$value->loanproduct->procesing_fee_rate;
                                        echo 'Ksh '. $value->amount * $rate/100;
                                        @endphp
                                    </b></p>
                                @endif

                                @else
                                <p class="text-xs mb-0" style="font-size: 12px">
                                    <b>Completed</b>
                                </p>
                                <p class="text-xs mb-0 text-success" style="font-size: 12px"><b>
                                        @php
                                        $rate=$value->loanproduct->procesing_fee_rate;
                                        echo 'Ksh '. $value->amount * $rate/100;
                                        @endphp
                                    </b></p>
                                @endif
                            </td>
                            <td>
                                @if($value->disbursement_status==0)
                                @if($value->status == 'Rejected')
                                <span class="text-danger text-xs font-weight-bold" style="font-size: 12px">Rejected</span>
                                @else
                                <p class="text-xs text-warning mb-0" style="font-size: 12px">
                                    Pending</p>
                                @endif

                                @else
                                <p class="text-xs mb-0" style="font-size: 12px">
                                    <b>Disbursed</b>
                                </p>
                                <p class="text-xs mb-0 text-info" style="font-size: 12px"><b>Ksh @php

                                        $deduction_type=$value->loanproduct->interest_type;
                                        if($deduction_type=='Before'){
                                        echo number_format((float) $value->amount - (float)
                                        $value->interest);
                                        }else{
                                            echo number_format($value->amount,2);
                                        }
                                        @endphp </b></p>

                                @endif
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs" style="font-size: 12px">{{ number_format($value->total
                                    ,2)}}</span>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs" style="font-size: 12px">{{ number_format($value->statement()->where('action','Loan Repayment')->sum('amount')
                                    ,2)}}</span>
                            </td>
                           
                            {{-- LOAN BALANCE --}}
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs" style="font-size: 12px">{{ 
                                    number_format($borrower->loan->last()->first()->statement()->latest()->first() ?$borrower->loan->last()->first()->statement()->latest()->first()->balance:0,
                                    2) }}</span>
                            </td>
                            {{-- RELEASE DATE --}}
                            <td class="align-middle text-center">
                                <span style="font-size: 12px"
                                    class="text-secondary text-xs">{{Carbon\Carbon::parse($value->date)->format('d/m/Y')
                                    }}</span>
                            </td>
                            {{-- MATURITY DATE --}}
                            <td class="align-middle text-center">
                                <span style="font-size: 12px"
                                    class="text-secondary text-xs">{{Carbon\Carbon::parse($value->due_date)->format('d/m/Y')
                                    }}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                @if ($value->status == 'Active')
                                <span class="text-xs text-success" style="font-size: 12px">{{ $value->status }}</span>
                                @elseif($value->status == 'Rejected')
                                <span style="font-size: 12px" class="text-xs text-danger">{{ $value->status }}</span>
                                @else
                                <span style="font-size: 12px" class="text-xs text-info">{{ $value->status }}</span>
                                @endif

                            </td>
                           
                            {{-- @include('livewire.admin.loans.options.edit-loan')
                            @include('livewire.admin.loans.options.delete')
                            @include('livewire.admin.loans.options.disburse-update')
                            @include('livewire.admin.loans.options.approve')
                            @include('livewire.admin.loans.options.reschedule-loan') --}}
                            

                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="10">No Loans Found</td>
                        </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
               
            </div>
        </div>
    </div>
</div>
