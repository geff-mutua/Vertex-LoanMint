<div>
    <div wire:ignore.self class="modal-onboarding modal fade animate__animated" id="transactionDetails" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content ">
                <div class="modal-header border-0">
               
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
    
                    <div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="onboarding-info">
                                    <h4 class="onboarding-title ">Client Details</h4>
                                </div>
                                <div class="onboarding-info">Client: {{$transaction?$transaction->borrower->fullname():''}}</div>
                                <div class="onboarding-info">National Id: {{$transaction?$transaction->borrower->id_number:''}} </div>
                                <div class="onboarding-info">Mobile: {{$transaction?$transaction->borrower->mobile:''}} </div>
                            </div>
                            <div>
                                <div class="onboarding-info">
                                    <h4 class="onboarding-title ">Transaction Details</h4>
                                </div>
                                <div class="onboarding-info">Payment Type: {{$transaction?$transaction->action:''}} </div>
                                <div class="onboarding-info">Date: {{$transaction?$transaction->date:''}} </div>
                                <div class="onboarding-info">Pay Mode:{{$transaction?$transaction->payment_option:''}}  </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="onboarding-title ">Payment Details</h5>
                        <form>
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="mb-3">
                                        <label for="nameEx7" class="form-label">Amount Paid</label>
                                        <input class="form-control" value="{{$transaction?$transaction->amount:''}}" disabled readonly placeholder="Enter your full name..."
                                            type="text" tabindex="0" >
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="mb-3">
                                        <label for="nameEx7" class="form-label">Loan Referenced</label>
                                        <input class="form-control" disabled readonly placeholder="Loan Reference"
                                            type="text" tabindex="0"
                                            value="{{$transaction?$transaction->loan->transaction_code:''}}"
                                            >
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="mb-3">
                                        <label for="nameEx7" class="form-label">Posted By</label>
                                        <input class="form-control" disabled readonly placeholder="Loan Reference"
                                            type="text" value="{{$transaction?$transaction->posted_by:''}}"
                                            >
                                    </div>
                                </div>
    
                               
    
                            </div>
                        </form>
                        <hr>
                        <h5 class="onboarding-title ">Transaction Status</h5>
    
                        @if($transaction?$transaction->status=="0":'')
                        <span class="badge bg-label-warning">Pending Approval </span>
                        <button wire:click="approve({{$transaction}})" class="btn btn-info btn-sm" type="button">
                            <div wire:loading wire:target="approve">
                                <span class="spinner-border me-1" role="status" aria-hidden="true"></span>
                            </div>
                            Approve Transaction
                          </button>
                       
                        @elseif($transaction?$transaction->status=="1":'')
                        <span class="badge bg-label-success">Approved</span>
                        @else
                        <span class="badge bg-label-warning">--</span>
                        <span class="badge bg-label-warning">--</span>
                        @endif
    
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    
</div>