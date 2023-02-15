<!-- Send Invoice Sidebar -->
<div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
    <div class="offcanvas-header my-1">
      <h5 class="offcanvas-title">Send Invoice</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body pt-0 flex-grow-1">
      <form>
        <div class="mb-3">
          <label for="invoice-from" class="form-label">From</label>
          <input type="text" class="form-control" id="invoice-from" value="{{auth()->user()->email}}" placeholder="company@email.com" />
        </div>
        <div class="mb-3">
          <label for="invoice-to" class="form-label">To</label>
          <input type="text" class="form-control" id="invoice-to" value="{{config('company.email')}}" placeholder="company@email.com" />
        </div>
        <div class="mb-3">
          <label for="invoice-subject" class="form-label">Subject</label>
          <input type="text" class="form-control" id="invoice-subject" value="Daily Collection Sheet" placeholder="Invoice regarding goods" />
        </div>
        <div class="mb-3">
          <label for="invoice-message" class="form-label">Message</label>
          <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8">Dear {{auth()->user()->name}},
            Attached is the Daily Collection Sheet of loan repayments between
            {{$date_from}} and {{$date_to}} from all branches totalling {{number_format($total)}}
            </textarea>
        </div>
        <div class="mb-4">
          <span class="badge bg-label-primary">
            <i class="ti ti-link ti-xs"></i>
            <span class="align-middle">Invoice Attached</span>
          </span>
        </div>
        <div class="mb-3 d-flex flex-wrap">
          <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
          <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </div>
      </form>
    </div>
  </div>
  <!-- /Send Invoice Sidebar -->
  