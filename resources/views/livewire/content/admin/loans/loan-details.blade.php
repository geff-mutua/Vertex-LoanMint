<div>
    @section('title', 'Loan Details')


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
        <!-- View sales -->
        <div class="col-xl-4 mb-4 col-lg-5 col-12">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h5 class="card-title mb-0">{{ $loan->borrower->fullname() }}! 🎉</h5>
                            <p class="mb-2">Current Loan Balance</p>
                            <h4 class="text-primary mb-1">Ksh
                                {{ number_format(
                                    $loan->statement()->latest()->first()
                                        ? $loan->statement()->latest()->first()->balance
                                        : 0,
                                    2,
                                ) }}
                            </h4>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exLargeModal">
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
                        <div class="col-md-4 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2"><i
                                        class="ti ti-chart-pie-2 ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0">
                                        {{ number_format($loan->total, 2) }}
                                    </h5>
                                    <small>{{ $loan->status }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2"><i class="ti ti-users ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">0</h5>
                                    <small>Repayments</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2"><i
                                        class="ti ti-currency-dollar ti-sm"></i></div>
                                <div class="card-info">
                                    <h5 class="mb-0">Ksh
                                        {{ number_format(
                                            $loan->statement()->latest()->first()
                                                ? $loan->statement()->latest()->first()->balance
                                                : 0,
                                            2,
                                        ) }}
                                    </h5>
                                    <small> Balance</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="d-flex justify-content-between p-3">

                <h5 class="m-0 me-2 card-title">Loan Details</h5>


            </div>
            <div class="card-body">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead class="bg-gray-200">

                            <tr>
                                <th style="font-size:12px">
                                    Loan</th>
                                <th style="font-size:12px">
                                    Principal</th>
                                <th style="font-size:12px">
                                    Product </th>

                                <th style="font-size:12px">
                                    p. Fee</th>
                                <th style="font-size:12px">
                                    Disbursement</th>
                                <th style="font-size:12px">
                                    Due</th>
                                <th style="font-size:12px">
                                    Paid</th>
                                <th style="font-size:12px">
                                    Balance</th>
                                <th style="font-size:12px">
                                    Release </th>

                                <th style="font-size:12px">
                                    Maturity</th>
                                <th style="font-size:12px">
                                    status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">

                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm" style="font-size:12px">{{ $loan->loan_purpose }}
                                            </h6>
                                            <small class="text-xs text-info mb-0" style="font-size:12px">
                                                {{ $loan->transaction_code }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs mb-0" style="font-size:12px">
                                        {{ number_format($loan->total, 2) }}</p>
                                    <p class="text-xs text-info mb-0" style="font-size:12px">
                                        {{ $loan->loanproduct->interest_rate }}%
                                        Rate</p>
                                </td>
                                <td>
                                    <p class="text-xs mb-0" style="font-size:12px">
                                        {{ $loan->loanproduct->product_name }}</p>
                                    <p class="text-xs text-info mb-0" style="font-size:12px">Repayment:
                                        {{ $loan->loanproduct->duration }} Days
                                    </p>
                                </td>

                                <td>
                                    @if ($loan->processing_fee == 1)
                                        @if ($loan->status == 'Rejected')
                                            <span class="text-danger  text-xs " style="font-size:12px">Rejected</span>
                                        @else
                                            <p class="text-xs text-warning mb-0" style="font-size:12px">
                                                Pending</p>
                                            <p class="text-xs mb-0 text-success" style="font-size:12px"><b>
                                                    @php
                                                        $rate = $loan->loanproduct->procesing_fee_rate;
                                                        echo 'Ksh ' . ($loan->amount * $rate) / 100;
                                                    @endphp
                                                </b></p>
                                        @endif
                                    @else
                                        <p class="text-xs mb-0" style="font-size:12px">
                                            <b>Completed</b>
                                        </p>
                                        <p class="text-xs mb-0 text-success" style="font-size:12px"><b>
                                                @php
                                                    $rate = $loan->loanproduct->procesing_fee_rate;
                                                    echo 'Ksh ' . ($loan->amount * $rate) / 100;
                                                @endphp
                                            </b></p>
                                    @endif
                                </td>
                                <td>
                                    @if ($loan->disbursement_status == 0)
                                        @if ($loan->status == 'Rejected')
                                            <span class="text-danger text-xs font-weight-bold"
                                                style="font-size:12px">Rejected</span>
                                        @else
                                            <p class="text-xs text-warning mb-0" style="font-size:12px">
                                                Pending</p>
                                        @endif
                                    @else
                                        <p class="text-xs mb-0" style="font-size:12px">
                                            <b>Disbursed</b>
                                        </p>
                                        <p class="text-xs mb-0 text-info" style="font-size:12px"><b>Ksh
                                                @php
                                                    
                                                    $deduction_type = $loan->loanproduct->interest_type;
                                                    if ($deduction_type == 'Before') {
                                                        echo number_format((float) $loan->amount - (float) $loan->interest);
                                                    }
                                                @endphp </b></p>

                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs"
                                        style="font-size:12px">{{ number_format($loan->total, 2) }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs"
                                        style="font-size:12px">{{ number_format(
                                            $loan->statement()->where('action', 'Loan Repayment')->sum('amount'),
                                            2,
                                        ) }}</span>
                                </td>
                                {{-- LOAN BALANCE --}}
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs"
                                        style="font-size:12px">{{ number_format($loan->statement()->latest()->first()? $loan->statement()->latest()->first()->balance: 0,2) }}</span>
                                </td>
                                {{-- RELEASE DATE --}}
                                <td class="align-middle text-center">
                                    <span style="font-size:12px"
                                        class="text-secondary text-xs">{{ Carbon\Carbon::parse($loan->due_date)->format('d/m/Y') }}</span>
                                </td>
                                {{-- MATURITY DATE --}}
                                <td class="align-middle text-center">
                                    <span style="font-size:12px"
                                        class="text-secondary text-xs">{{ Carbon\Carbon::parse($loan->due_date)->format('d/m/Y') }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    @if ($loan->status == 'Active')
                                        <span style="font-size:12px"
                                            class="text-xs text-success">{{ $loan->status }}</span>
                                    @elseif($loan->status == 'Rejected')
                                        <span style="font-size:12px"
                                            class="text-xs text-danger">{{ $loan->status }}</span>
                                    @else
                                        <span style="font-size:12px"
                                            class="text-xs text-info">{{ $loan->status }}</span>
                                    @endif

                                </td>

                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="card text-center mt-3">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-within-card-active" aria-controls="navs-within-card-active"
                            aria-selected="true">Repayments</button>
                    </li>
                    <li class="nav-item"><button type="button" class="nav-link" role="tab"
                            data-bs-toggle="tab" data-bs-target="#navs-within-card-link"
                            aria-controls="navs-within-card-link" aria-selected="false">Loan Schedules</button>
                    </li>
                    
                </ul>
            </div>
            <div class="card-body" wire:init="schedules">
                <div class="tab-content p-0 pt-4">
                    <div class="tab-pane fade show active" id="navs-within-card-active" role="tabpanel">
                        <h4 class="card-title">Loan Repayments</h4>
                        <p class="card-text">No Repayment record found for the selected Loan.</p>
                        <a href="javascript:void(0)" class="btn btn-primary">Add Repayment</a>
                    </div>
                    <div class="tab-pane fade" id="navs-within-card-link" role="tabpanel">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead class="bg-gray-200">
        
                                    <tr>
                                        <td>#</td>
                                        <th style="font-size:12px">
                                            Loan Id</th>
                                        <th style="font-size:12px">
                                            Repayment Date</th>
                                        <th style="font-size:12px">
                                            Amount </th>
        
                                        <th style="font-size:12px">
                                           Status</th>
                                        
        
                                    </tr>
                                </thead>
                               <tbody>
                                @forelse ($schedules as $schedule)
                                        <tr>
                                            <td style="font-size: 12px">{{$loop->iteration}}</td>
                                            <td style="font-size: 12px">{{$schedule->loan->transaction_code}}</td>
                                            <td style="font-size: 12px">{{$schedule->repayment_date}}</td>
                                            <td style="font-size: 12px">{{number_format($schedule->amount)}}</td>
                                            <td style="font-size: 12px">{{$schedule->status}}</td>
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

    </div>
</div>
