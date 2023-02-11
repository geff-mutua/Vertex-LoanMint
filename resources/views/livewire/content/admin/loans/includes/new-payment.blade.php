

<div wire:ignore.self class="modal fade" id="newPayment" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Post New Payment Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form wire:submit.prevent="store">
                    <div class="row ">
                        <div class="form-group col-md-6 text-left">
                            <label class="form-label">Reference Code</label>
                            <input type="text" class="form-control" wire:model="reference_code"
                                placeholder="Recerence Code">
                           
                            @error('reference_code')
                                <small style="font-size: 10px" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Amount</label>
                            <input type="text" class="form-control" wire:model="amount"
                                placeholder="Amount "s>
                        @error('amount')
                            <small style="font-size: 10px" class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Msisdn (Phone Number)</label>
                            <input type="text" class="form-control" wire:model="msisdn"
                            placeholder="Msisdn|Mobile"s>
                            @error('msisdn')
                                <small style="font-size: 10px" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Transaction Date</label>
                            <input type="date" class="form-control" wire:model="date"
                            placeholder="Date"s>
                            @error('date')
                                <small style="font-size: 10px" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label  class="form-label">Associated Loan</label>
                            <select class="form-control" wire:model="loan_id" id="">
                                <option value="">--select--</option>
                                @if( $loan->status !="Rejected")
                                <option value="{{ $loan->id }}">{{ $loan->transaction_code }}</option>
                                @endif

                            </select>
                            @error('loan_id')
                                <small style="font-size: 10px" class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label  class="form-label">Transaction Type</label>
                            <select class="form-control" wire:model="transaction_type" id="">
                                <option value="">--select--</option>
                                <option value="Processing Fee">Processing Fee</option>
                                <option value="Loan Repayment">Loan Repayment</option>
                            </select>
                            @error('transaction_type')
                                <small style="font-size: 10px" class="text-danger">{{ $message }}</small>
                            @enderror
                           
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label">Payment Option</label>
                            <select class="form-control" wire:model="payment_method" id="">
                                <option value="">--select--</option>
                                <option value="Mpesa">Mpesa</option>
                                <option value="Cash">Cash</option>
                            </select>
                            @error('payment_method')
                                <small style="font-size: 10px" class="text-danger">{{ $message }}</small>
                            @enderror
                           
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end pt-3">
                        <button wire:click="store" class="btn btn-primary col-md-4" type="button">
                            <div wire:loading wire:target="store">
                                <span class="spinner-border me-1" role="status" aria-hidden="true"></span>
                            </div>
                            Post Transaction
                          </button>
                       
                    </div>
                </form>

            </div>
           
            </form>
        </div>
    </div>
</div>
