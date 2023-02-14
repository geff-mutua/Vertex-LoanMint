<div>
    @section('title', 'Client Profile')


    @section('vendor-style')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    @endsection

    @section('vendor-script')
        <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
        {{-- <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script> --}}
    @endsection

    @section('page-script')
        <script src="{{ asset('assets/js/dashboards-ecommerce.js') }}"></script>
    @endsection
    <div class="row">
        @if ($borrower->status == 0)
            <div class="col-md-12">
                <div class="alert alert-primary" role="alert">
                    The profile of the client {{ $borrower->fullname() }} is not yet approved.
                </div>
            </div>
            @elseif($borrower->status == 2)
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    The borrower profile is rejected
                </div>
            </div>
        @endif
        <!-- View sales -->
        <div class="col-xl-4 mb-4 col-lg-5 col-12">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h5 class="card-title mb-0">{{ $borrower->fullname() }}! 🎉</h5>
                            <p class="mb-2">Current Loan Balance</p>
                            <h4 class="text-primary mb-1">Ksh {{ 
                                number_format(count($borrower->loan) >0 ?$borrower->loan->last()->first()->statement()->latest()->first()?$borrower->loan->last()->first()->statement()->latest()->first()->balance:0:0,
                                2) }}</h4>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exLargeModal">
                                All Loans
                              </button>
                        </div>
                    </div>
                    <div class="col-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/img/illustrations/card-advance-sale.png') }}" height="140"
                                alt="view sales">
                        </div>
                    </div>
                </div>
            </div>
        </div>

   @include('livewire.content.admin.clients.includes.view-loans')
        <!-- Statistics -->
        <div class="col-xl-8 mb-4 col-lg-7 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0 text-xs">Current Loan Statistics</h5>
                        <small class="text-muted">Current Loan Stats</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2"><i
                                        class="ti ti-chart-pie-2 ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ 
                                        number_format(count($borrower->loan)>0?$borrower->loan->last()->first()->total:0,
                                        2) }}</h5>
                                    <small>{{count($borrower->loan)>0?$borrower->loan->last()->first()->status:''}}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2"><i class="ti ti-users ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">0</h5>
                                    <small>Repayments</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2"><i
                                        class="ti ti-shopping-cart ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0">0.00</h5>
                                    <small>Arrears</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2"><i
                                        class="ti ti-currency-dollar ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0">Ksh {{ 
                                        number_format(count($borrower->loan) >0 ?$borrower->loan->last()->first()->statement()->latest()->first()?$borrower->loan->last()->first()->statement()->latest()->first()->balance:0:0,
                                        2) }}</h5>
                                    <small> Balance</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics -->

        <div class="col-xl-4 col-12">
            <div class="row">
                <!-- Expenses -->
                <div class="col-xl-6 mb-4 col-md-3 col-6">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5 class="card-title mb-0">{{ number_format(count($borrower->loan)>0?$borrower->loan->last()->first()->statement()->where('action','Loan Repayment')->sum('amount'):0
                                ,2)}}</h5>
                            <small class="text-muted">Repayment</small>
                        </div>
                        <div class="card-body">
                            <div id="expensesChart"></div>
                            <div class="mt-md-2 text-center mt-lg-3 mt-3">
                                <small class="text-muted mt-3">Running Loan Repayment</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Expenses -->

                <!-- Profit last month -->
                <div class="col-xl-6 mb-4 col-md-3 col-6">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5 class="card-title mb-0">Credit Score</h5>

                        </div>
                        <div class="card-body" wire:ignore.self>
                            <div id="profitLastMonth"></div>
                            <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                                <h4 class="mb-0">0</h4>
                                <small class="text-success">+0.1%</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Profit last month -->

                <!-- Generated Leads -->
                <div class="col-xl-12 mb-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column">
                                    <div class="card-title mb-auto">
                                        <h5 class="mb-1 text-nowrap">Client Profile</h5>

                                    </div>
                                    <div class="chart-statistics">
                                        @if ($borrower->status == 0)
                                        <button wire:click="approve" class="btn btn-info btn-sm" type="button">
                                            <div wire:loading wire:target="approve">
                                                <span class="spinner-border me-1" role="status" aria-hidden="true"></span>
                                            </div>
                                            Approve Account
                                          </button>

                                          <button wire:click="reject" class="btn btn-danger btn-sm" type="button">
                                            <div wire:loading wire:target="reject">
                                                <span class="spinner-border me-1" role="status" aria-hidden="true"></span>
                                            </div>
                                            Reject Account
                                          </button>
                                           
                                           
                                        @else
                                            <button class="btn btn-primary btn-sm">View Details</button>
                                            <button class="btn btn-danger btn-sm mt-2">Flag Account</button>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Generated Leads -->
            </div>
        </div>

        <div class="col-12 col-xl-8 mb-4 col-lg-7">
            <div class="card">
                <div class="d-flex justify-content-between p-3">
                    <div>
                        <h5 class="m-0 me-2 card-title">Recent Loans</h5>
                    </div>
                    <div>
                        @if($borrower->status==1)
                        <a href="/admin/borrower-statement/{{$borrower->id}}" class="btn btn-sm btn-info">Loan Statements</a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive card-datatable">
                        <table class="table datatable-invoice border-top">
                            <thead>
                                <tr>

                                    <th><small style="font-size: 12px">Loan ID</small></th>
                                    <th style="font-size: 12px">Amount</th>
                                    <th style="font-size: 12px">Paid</th>
                                    <th style="font-size: 12px">Balance</th>
                                    <th style="font-size: 12px">Status</th>
                                    <th style="font-size: 12px"> Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($borrower->loan()->orderBy('id','DESC')->get() as $key => $value)
                        <tr>
                            <td>
                                <a href="{{route('loan-details',['domain'=>auth()->user()->domain->name,'id'=>$value->id])}}">
                                <small class="text-xs text-info mb-0" style="font-size: 12px">
                                    {{ $value->transaction_code }}
                                </small>
                            </a>
                            </td>
                            <td>
                                <p class="text-xs mb-0" style="font-size: 12px">
                                    {{ number_format($value->total, 0) }}</p>
                               
                            </td>
                            {{--PAID--}}
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs" style="font-size: 12px">{{ number_format($value->statement()->where('action','Loan Repayment')->sum('amount')
                                    ,0)}}</span>
                            </td>
                           
                            {{-- LOAN BALANCE --}}
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs" style="font-size: 12px">{{ 
                                    number_format($borrower->loan->last()->first()->statement()->latest()->first() ?$borrower->loan->last()->first()->statement()->latest()->first()->balance:0,
                                    0) }}</span>
                            </td>

                            <td class="align-middle text-center text-sm">
                                @if ($value->status == 'Active')
                                <span class="text-xs badge bg-label-success" style="font-size: 12px">{{ $value->status }}</span>
                                @elseif($value->status == 'Rejected')
                                <span style="font-size: 12px" class="text-xs badge bg-label-danger">{{ $value->status }}</span>
                                @else
                                <span style="font-size: 12px" class="text-xs badge bg-label-warning">{{ $value->status }}</span>
                                @endif

                            </td>
                            <td>
                                @if($value->status=='Pending')
                                <a href="javascript:void(0)" wire:click="editLoan({{$value->id}})"
                                    data-bs-toggle="modal" data-bs-target="#editLoan{{$value->id}}">
                                    <small class="text-xs text-warning"><i class="fa fa-edit" title="Edit this loan"></i></small>
                                </a>
                                |
                                @endif


                                @if($value->processing_fee=="2")
                                @if($value->status=="Approved")
                                @if($value->disbursement_status=="0")
                                <a href="javascript:void(0)" wire:click="editLoan({{$value->id}})"
                                    data-bs-toggle="modal" data-bs-target="#updateDisbursment{{$value->id}}">
                                    <small class="text-xs text-info"><b>Disburment Update</b></small>
                                </a>
                                |
                                @else

                                @endif
                                @endif
                                @endif


                                @if(Carbon\Carbon::now() > Carbon\Carbon::parse($value->due_date))
                                @if($value->status !="Paid")
                                <a href="javascript:void(0)" wire:click="reschedule({{$value->id}}) "
                                    data-toggle="modal" data-target="#reschedule{{$value->id}}">
                                    <small class="text-xs text-info"><b>Reschedule</b></small>
                                </a>
                                |
                                @endif
                                @endif
                                @if($value->status=='Pending' | $value->status=='Approved' | $value->status=='Rejected')
                                <a href="javascript:void(0)" wire:click="setDeleteId({{$value->id}})"
                                    data-bs-toggle="modal" data-bs-target="#deleteLoan{{$value->id}}">
                                    <small class="text-xs text-danger"><i class="fa fa-trash" title="Delete Loan"></i></small>
                                </a>
                                |
                                @endif

                               
                                    @if($value->status=='Pending')
                                    <a href="javascript:void(0)" wire:click="editLoan({{$value->id}})"
                                        data-bs-toggle="modal" data-bs-target="#approveLoan{{$value->id}}">
                                        <small class="text-xs text-info"><i class="fa fa-check" title="Aprove Loan"></i></small>
                                    </a>
                                    |
                                    @endif
                               

                                
                                <a href="{{route('loan-details',['domain'=>auth()->user()->domain->name,'id'=>$value->id])}}"
                                   >
                                    <small class="text-xs text-info"><i class="fa fa-eye" title="View Loan Details"></i></small>
                                </a>
                            </td>
                            @include('livewire.content.admin.clients.includes.edit-loan')
                            @include('livewire.content.admin.clients.includes.delete-loan')
                            @include('livewire.content.admin.clients.includes.update-disbursement')
                            @include('livewire.content.admin.clients.includes.approve-loan')
                            {{-- @include('livewire.admin.loans.options.reschedule-loan') --}}
                            

                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="6"><small style="font-size: 12px">No Loans Found</small></td>
                        </tr>
                        @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Loans --}}
        <!-- Transactions -->
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title m-0 me-2">
                        <h5 class="m-0 me-2">Repayments</h5>
                        <small class="text-muted">Total {{count($reconcilliations)}} Transactions done in this Month</small>
                    </div>
                    {{-- <div class="dropdown">
          <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
          </div>
        </div> --}}
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        @forelse ($reconcilliations as $value )
                        <li class="d-flex mb-3 pb-1 align-items-center">
                            <div class="badge bg-label-primary me-3 rounded p-2">
                                <i class="ti ti-coin ti-sm"></i>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">{{$value->transaction_type}}</h6>
                                    @if ($value->status == '1')
                                    <span class="text-xs badge bg-label-success" style="font-size: 12px">Approved</span>
                                    @elseif($value->status == '0')
                                    <span style="font-size: 12px" class="text-xs badge bg-label-warning">Pending</span>
                                    @else
                                    <span style="font-size: 12px" class="text-xs badge bg-label-danger">Rejected</span>
                                    @endif
                                   
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    @if ($value->status == '1')
                                    <h6 class="mb-0 text-success">Ksh {{number_format($value->amount)}}</h6>
                                    @elseif($value->status == '0')
                                    <h6 class="mb-0 text-warning">Ksh {{number_format($value->amount)}}</h6>
                                    @else
                                    <h6 class="mb-0 text-danger">Ksh {{number_format($value->amount)}}</h6>
                                    @endif
                                    
                                </div>
                            </div>
                        </li>
                        @empty
                            
                        @endforelse
                       

                    </ul>
                </div>
            </div>
        </div>
        <!--/ Transactions -->


        <!-- /Invoice table -->

    </div>
</div>
