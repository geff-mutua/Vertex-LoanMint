@extends('layouts/layoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-advance.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}">
</script>
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
<script src="{{asset('assets/js/charts-apex.js')}}"></script>
@endsection


@section('content')

<div class="row">

    <!-- Statistics -->
    <div class="col-lg-8 mb-4 col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <h5 class="card-title mb-0">Statistics</h5>
          <small class="text-muted">As at Todate</small>
        </div>
        <div class="card-body pt-2">
          <div class="row gy-3">
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="badge rounded-pill bg-label-primary me-3 p-2"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
                <div class="card-info">
                  <h5 class="mb-0">{{number_format($data['total_disbursement'])}}</h5>
                  <small>Loans Issued</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="badge rounded-pill bg-label-info me-3 p-2"><i class="ti ti-currency-dollar ti-sm"></i></div>
                <div class="card-info">
                  <h5 class="mb-0">{{number_format($data['total_repayment'])}}</h5>
                  <small>Repayments</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="badge rounded-pill bg-label-danger me-3 p-2"><i class="ti ti-shopping-cart ti-sm"></i></div>
                <div class="card-info">
                  <h5 class="mb-0">{{number_format($data['loan_balance'])}}</h5>
                  <small>Balances</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-6">
              <div class="d-flex align-items-center">
                <div class="badge rounded-pill bg-label-success me-3 p-2"><i class="ti ti-currency-dollar ti-sm"></i></div>
                <div class="card-info">
                  <h5 class="mb-0">{{number_format($data['arrears'])}}</h5>
                  <small>Loan Arrears</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Orders -->
    <div class="col-lg-2 col-6 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <div class="badge rounded-pill p-2 bg-label-danger mb-2"><i class="ti ti-users ti-sm"></i></div>
          <h5 class="card-title mb-2">{{$data['clients']}}</h5>
          <small>Total Clients</small>
        </div>
      </div>
    </div>
  
    <!-- Reviews -->
    <div class="col-lg-2 col-6 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <div class="badge rounded-pill p-2 bg-label-success mb-2"><i class="ti ti-message-dots ti-sm"></i></div>
          <h5 class="card-title mb-2">{{$data['groups']}}</h5>
          <small>Group Loans</small>
        </div>
      </div>
    </div>

  <!-- Earning Reports -->
  <div class="col-lg-6 mb-4">
    <div class="card h-100">
      <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
        <div class="card-title mb-0">
          <h5 class="mb-0">Weekly Reports</h5>
          <small class="text-muted">Weekly Earnings Overview</small>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="earningReportsId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsId">
            <a class="dropdown-item" href="javascript:void(0);">View More</a>
            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
          </div>
        </div>
        <!-- </div> -->
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-4 d-flex flex-column align-self-end">
            <div class="d-flex gap-2 align-items-center mb-2 pb-1 flex-wrap">
              <h4 class="mb-0">Ksh {{$data['today_repayment']}}</h4>
              <div class="badge rounded bg-label-success">+4.2%</div>
            </div>
            <small class="text-muted">Statistics of the loan repayments</small>
          </div>
          <div class="col-12 col-md-8">
            <div id="weeklyEarningReports"></div>
          </div>
        </div>
        <div class="border rounded p-3 mt-2">
          <div class="row gap-4 gap-sm-0">
            <div class="col-12 col-sm-4">
              <div class="d-flex gap-2 align-items-center">
                <div class="badge rounded bg-label-primary p-1"><i class="ti ti-currency-dollar ti-sm"></i></div>
                <h6 class="mb-0">Earned Income</h6>
              </div>
              <h4 class="my-2 pt-1">{{number_format($data['total_profit'])}}</h4>
              <div class="progress w-75" style="height:4px">
                <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="d-flex gap-2 align-items-center">
                <div class="badge rounded bg-label-info p-1"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
                <h6 class="mb-0">Processing Fee</h6>
              </div>
              <h4 class="my-2 pt-1">{{number_format($data['total_processing_fee'])}}</h4>
              <div class="progress w-75" style="height:4px">
                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <div class="d-flex gap-2 align-items-center">
                <div class="badge rounded bg-label-danger p-1"><i class="ti ti-brand-paypal ti-sm"></i></div>
                <h6 class="mb-0">Expense</h6>
              </div>
              <h4 class="my-2 pt-1">Ksh {{number_format($data['expenses'])}}</h4>
              <div class="progress w-75" style="height:4px">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Earning Reports -->

  <!-- Support Tracker -->
  <div class="col-md-6 mb-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between pb-0">
        <div class="card-title mb-0">
          <h5 class="mb-0">Loan Book Overview</h5>
          <small class="text-muted">Overall </small>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="supportTrackerMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="supportTrackerMenu">
            <a class="dropdown-item" href="javascript:void(0);">View More</a>
            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-4 col-md-12 col-lg-4">
            <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-1">
              <h1 class="mb-0">{{number_format($data['loan_book'])}}</h1>
              <p class="mb-0">Loan Book Value</p>
            </div>
            <ul class="p-0 m-0">
              <li class="d-flex gap-3 align-items-center mb-lg-3 pt-2 pb-1">
                <div class="badge rounded bg-label-primary p-1"><i class="ti ti-ticket ti-sm"></i></div>
                <div>
                  <h6 class="mb-0 text-nowrap">Total Issued Loans</h6>
                  <small class="text-muted">{{number_format($data['total_disbursement'])}}</small>
                </div>
              </li>
              <li class="d-flex gap-3 align-items-center mb-lg-3 pb-1">
                <div class="badge rounded bg-label-info p-1"><i class="ti ti-circle-check ti-sm"></i></div>
                <div>
                  <h6 class="mb-0 text-nowrap">Total Repayments</h6>
                  <small class="text-muted">{{number_format($data['total_loan_repayments'])}}</small>
                </div>
              </li>
              <li class="d-flex gap-3 align-items-center pb-1">
                <div class="badge rounded bg-label-warning p-1"><i class="ti ti-clock ti-sm"></i></div>
                <div>
                  <h6 class="mb-0 text-nowrap"></h6>
                  <small class="text-muted">1 Day</small>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-12 col-sm-8 col-md-12 col-lg-8">
            <div id="supportTracker"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Support Tracker -->

  <div class="col-lg-3 col-sm-6 mb-4">
    <div class="card">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div class="card-title mb-0">
          <h5 class="mb-0 me-2">{{number_format($data['today_disbursement'])}}</h5>
          <small>Today Disbursements</small>
        </div>
        <div class="card-icon">
          <span class="badge bg-label-primary rounded-pill p-2">
            <i class='ti ti-cpu ti-sm'></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 mb-4">
    <div class="card">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div class="card-title mb-0">
          <h5 class="mb-0 me-2">{{number_format($data['today_repayment'])}}</h5>
          <small>Today Repayments</small>
        </div>
        <div class="card-icon">
          <span class="badge bg-label-success rounded-pill p-2">
            <i class='ti ti-server ti-sm'></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 mb-4">
    <div class="card">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div class="card-title mb-0">
          <h5 class="mb-0 me-2">Ksh {{number_format($data['pending_transactions'])}}</h5>
          <small>Pending Approvals</small>
        </div>
        <div class="card-icon">
          <span class="badge bg-label-danger rounded-pill p-2">
            <i class='ti ti-chart-pie-2 ti-sm'></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-sm-6 mb-4">
    <div class="card">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div class="card-title mb-0">
          <h5 class="mb-0 me-2">128</h5>
          <small>Pending Disbursements</small>
        </div>
        <div class="card-icon">
          <span class="badge bg-label-warning rounded-pill p-2">
            <i class='ti ti-alert-octagon ti-sm'></i>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-12 mb-4">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div>
          <h5 class="card-title mb-0">Branch Performance</h5>
          <small class="text-muted">Loans issued by each branch registered in the system</small>
        </div>
        
      </div>
      <div class="card-body">
        <div id="donutChart"></div>
      </div>
    </div>
  </div>

  <div class="col-lg-6 mb-4 mb-lg-0">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between">
        <h5 class="card-title m-0 me-2">Latest Transaction</h5>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="teamMemberList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="teamMemberList">
            <a class="dropdown-item" href="javascript:void(0);">Download</a>
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-borderless border-top">
          <thead class="border-bottom">
            <tr>
              <th style="font-size:12px">ID</th>
              <th style="font-size:12px">DATE</th>
              <th style="font-size:12px">STATUS</th>
              <th style="font-size:12px">Amount</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($data['today_transactions'] as $item)
            <tr>
              <td>
                <div class="d-flex justify-content-start align-items-center">
                  <div class="me-3">
                    <img src="{{asset('assets/img/icons/payments/visa-img.png')}}" alt="Visa" height="30">
                  </div>
                  <div class="d-flex flex-column">
                    <p class="mb-0 fw-semibold">*4230</p><small class="text-muted">Credit</small>
                  </div>
                </div>
              </td>
              <td>
                <div class="d-flex flex-column">
                  <p class="mb-0 fw-semibold">Sent</p>
                  <small class="text-muted text-nowrap">17 Mar 2022</small>
                </div>
              </td>
              <td><span class="badge bg-label-success">Verified</span></td>
              <td>
                <p class="mb-0 fw-semibold">+$1,678</p>
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

@endsection
