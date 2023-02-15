<div>

@section('title', 'Collection Sheet')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-invoice.css')}}" />
@endsection


@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
@endsection


<div class="row invoice-preview">
  <!-- Invoice -->
  <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
    <div class="card invoice-preview-card">
      <div class="card-body">
        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">
          <div class="mb-xl-0 mb-4">
            <div class="d-flex svg-illustration mb-4">
             
              <span class="app-brand-text fw-bold fs-4">
                {{ config('company.name') }}
              </span>
            </div>
            <p class="mb-2" wire:ignore> {{ config('company.address') }}</p>
            <p class="mb-0">Email: {{ config('company.email') }}</p>
            <p class="mb-0">Mobile: {{ config('company.mobile') }}</p>
            <p class="mb-2"> {{ config('company.town') }} {{ config('company.country') }}</p>
          </div>
          <div>
            <h4 class="fw-semibold mb-2">COLLECTION #{{$recordId}}</h4>
            <div class="mb-2 pt-1">
              <span>From Date:</span>
              <span class="fw-semibold">{{Carbon\Carbon::parse($date_from)->toFormattedDateString()}}</span>
            </div>
            <div class="pt-1">
              <span>To Date:</span>
              <span class="fw-semibold">{{Carbon\Carbon::parse($date_to)->toFormattedDateString()}}</span>
            </div>
          </div>
        </div>
      </div>
      <hr class="my-0" />
      <div class="card-body">
        <div class="row p-sm-3 p-0">
          <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
            <h6 class="mb-3">Daily Collection Sheet Report</h6>
                <span>Branch:</span>
              <span class="fw-semibold">{{$branches[$branch]['name']}} Branch (s)</span>
          </div>
          <div class="col-xl-6 col-md-12 col-sm-7 col-12">
            
          </div>
        </div>
      </div>
      <div class="table-responsive border-top m-2">
        <table class="table m-0 table-bordered">
          <thead>
            <tr >
                
              <th class="font-bold">Client</th>
              <th class="font-bold">L.Officer</th>
              <th class="font-bold">Loan Type</th>
              <th class="font-bold">Branch</th>
              <th class="font-bold">Loan</th>
              <th class="font-bold">Amount</th>
              <th class="font-bold">Date</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($collections as $item)
                
            @empty
                
            <tr class="text-center">
                <td colspan="7">No record Found</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <div class="card-body mx-3">
        <div class="row">
          <div class="col-12">
            <span class="fw-semibold">Note:</span>
            <span>It may take a few mins to view the collection sheet depending on how many loans you have.
              </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Invoice -->

  <!-- Invoice Actions -->
  <div class="col-xl-3 col-md-4 col-12 invoice-actions">
    <div class="card">
        <div class="card-header">
            <h6 class="card-title">Filter Collections</h6>
        </div>
      <div class="card-body">
        <div class="form-group mb-3">
            <label for="" class="form-label">Date From</label>
            <input type="date" wire:model="date_from" class="form-control" id="">
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Date To</label>
            <input type="date" wire:model="date_to" class="form-control" id="">
        </div>

        <div class="form-group mb-3">
            <label for="" class="form-label">Transaction Status </label>
            <select name="" id="" class="form-control">
                <option value="All">All</option>
                <option value="0">Pending</option>
                <option value="1">Approved</option>
                <option value="2">Rejected</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="" class="form-label">By Company Branches </label>
            <select wire:model="branch" id="" class="form-control">
                <option value="All">All</option>
                @forelse ($branches as $branch)
                <option value="{{$branch->id}}">{{strtoupper($branch->name)}}</option>
                @empty
                    
                @endforelse
            </select>
        </div>

        <button class="btn btn-info d-grid w-100 mb-2">
            <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-filter ti-xs me-1"></i>Filter Collections</span>
          </button>
        

        <button class="btn btn-primary d-grid w-100 mb-2" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="ti ti-send ti-xs me-1"></i>Send Invoice</span>
        </button>
       
      </div>
    </div>
  </div>
  <!-- /Invoice Actions -->
</div>

{{-- SEND EMAIL ATTACHMENTS --}}
@include('livewire.content.admin.collections.sheets.includes.collection-email')

</div>
