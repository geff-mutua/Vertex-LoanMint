<div>

    @section('title', 'Rejected Loans')

    @section('vendor-style')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
        <link rel="stylesheet"
            href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    @endsection

    @section('page-style')
        <!-- Page -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}">
    @endsection

    @section('vendor-script')
        <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    @endsection

    @section('page-script')

    @endsection


    <div class="row">
        <div class="col-xl-12 mb-4">
            <div class="card">
                <h5 class="card-header">Rejected Loans</h5>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md mb-md-0 mb-2 ">
                            <div class="form-check custom-option custom-option-basic">
                                <label class="form-check-label custom-option-content" for="customRadioTemp1">
                                    <input name="customRadioTemp" class="form-check-input" type="radio" value=""
                                        id="customRadioTemp1" checked />
                                    <span class="custom-option-header">
                                        <span class="h6 mb-0">Total Rejected Loans</span>
                                    </span>
                                    <span class="custom-option-body">

                                        <small>Ksh {{ number_format($summations['rejected']) }}</small>
                                    </span>
                                </label>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
      
        <div class="card-datatable table-responsive">
            <table class="table" id="dataTable1">
                <thead>
                    <tr>
                        <tr>
                            <th style="font-size:10px">
                                Loan</th>
                            <th style="font-size:10px">
                                Principal</th>
                           

                            <th style="font-size:10px">
                                Fee</th>
                            <th style="font-size:10px">
                                Disbursement</th>
                            <th style="font-size:10px">
                                Due</th>
                            <th style="font-size:10px">
                                Paid</th>
                            <th style="font-size:10px">
                                Balance</th>
                            <th style="font-size:10px">
                                Release </th>

                            <th style="font-size:10px">
                                Maturity</th>
                                <th style="font-size:10px">
                                    status</th>
                            <th style="font-size:10px">
                                Action</th>
                        </tr>
                    </tr>
                </thead>
                <tbody>
                  
                    @forelse ($loans as $value)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                        
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0" style="font-size: 12px"><a href="{{route('borrower-profile',['domain'=>auth()->user()->domain->name,'id'=>$value->borrower->id])}}">{{ $value->borrower->first_name }} {{ $value->borrower->last_name }}</a></h6>
                                    
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
                                    echo  number_format($value->amount * $rate/100,2);
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
                            <p class="text-xs mb-0 text-info"style="font-size: 12px"><b> @php

                                    $deduction_type=$value->loanproduct->interest_type;
                                    if($deduction_type=='Before'){
                                    echo number_format((float) $value->amount - (float)
                                    $value->interest,2);
                                    }else{
                                        echo number_format((float) $value->amount,2);
                                    }
                                    @endphp </b></p>

                            @endif
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs" style="font-size: 12px">{{ number_format($value->total
                                ,2)}}</span>
                        </td>
                        <td class="align-middle text-center">
                           
                            <span class="text-secondary text-xs"style="font-size: 12px">{{ number_format($value->statement()->where('action','Loan Repayment')->sum('amount')
                                ,2)}}</span>
                        </td>
                        {{-- LOAN BALANCE --}}
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs"style="font-size: 12px">{{ 
                                number_format($value->statement()->latest()->first()?$value->statement()->latest()->first()->balance:0,
                                2) }}</span>
                        </td>
                        {{-- RELEASE DATE --}}
                        <td class="align-middle text
                        
                        -center">
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
                        <td class="align-middle text-center text-sm" style="font-size: 12px">
                            @if ($value->status == 'Active')
                            <span class="text-xs badge bg-label-success">{{ $value->status }}</span>
                            @elseif($value->status == 'Rejected')
                            <span class="text-xs badge bg-label-danger">{{ $value->status }}</span>
                            @else
                            <span class="text-xs badge bg-label-warning">{{ $value->status }}</span>
                            @endif

                        </td>
                        <td style="font-size: 12px">
                           
                            <a href="{{route('loan-details',['domain'=>auth()->user()->domain->name,'id'=>$value->id])}}"
                               >
                                <small class="text-xs text-info"style="font-size: 12px" ><b>View</b></small>
                            </a>
                        </td>
                       
                    </tr>
                    @empty
                    
                    @endforelse

                </tbody>

            </table>
        </div>
    </div>


</div>
