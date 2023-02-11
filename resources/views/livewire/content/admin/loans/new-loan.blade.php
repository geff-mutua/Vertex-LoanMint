<div wire:ignore.self class="modal fade" id="newLoan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">New Loan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Select Borrower</label>
                        <div class="input-group input-group-outline">
                            <select class="form-control"
                                wire:model="individual_loan_borrower" required>
                                <option value="">--Select Borrower--</option>
                                @forelse ($borrowers as $item)
                                <option value="{{$item->id}}">{{$item->first_name}}
                                    {{$item->last_name}}</option>
                                @empty

                                @endforelse
                            </select>
                           
                        </div>
                        @error('individual_loan_borrower') <small style="font-size: 10px"
                            class="text-danger">{{ $message
                            }}</small> @enderror
                            <small style="font-size: 10px"
                            class="text-danger">{{ $has_existing_loan
                            }}</small>
                    </div>

                    <div class="col-md-6">
                        <label>Loan Amount</label>
                        <div class="input-group input-group-outline">
                            <input wire:click="setLoanDetails" type="number" class="form-control"
                                wire:model="individual_loan_amount"
                                placeholder="Enter Amount" required>
                        </div>
                        @error('individual_loan_amount') <small style="font-size: 10px"
                            class="text-danger">{{ $message
                            }}</small> @enderror
                              <small style="font-size: 10px"
                              class="text-danger">{{ $max_limit
                              }}</small>
                    </div>

                    <div class="col-md-6">
                        <label>Loan Purpose</label>
                        <div class="input-group input-group-outline">
                            <select class="form-control" wire:model="loan_purpose" id="">
                                <option value="Business">Business</option>
                                <option value="Medical">Medical</option>
                                <option value="School Fees">School Fees</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        @error('loan_purpose') <small style="font-size: 10px"
                            class="text-danger">{{ $message
                            }}</small> @enderror
                    </div>
                    <div class="col-md-6">
                        <label>Loan Product</label>
                        <div class="input-group input-group-outline">
                            <select wire:click="setLoanDetails" class="form-control" wire:model="loan_product" id="">
                                <option value="">--Select Product--</option>
                                @forelse ($loanProducts as $item)
                                    <option value="{{$item->id}}">{{$item->product_name}}</option>
                                @empty
                                    
                                @endforelse
                                
                            </select>
                        </div>
                        @error('loan_product') <small style="font-size: 10px"
                            class="text-danger">{{ $message
                            }}</small> @enderror
                    </div>
                    <br>
                    

                    @if($loan_product !="")
                    <hr>
                    <h6>Selected Product Rates</h6>
                    <hr>
                    <div class="col-md-4">
                        <label for="">Product Interest Rate</label>
                        <label for="" class="text-success">{{$interest_rate}}%</label>
                    </div>
                    <div class="col-md-4">
                        <label for="">Interest Type</label>
                        <small for="" class="text-success">Deducted {{$interest_type}}</small>
                    </div>
                    <div class="col-md-4">
                        <label for="">Processing Fee</label>
                        <p for="" class="text-success">{{$processing_fee}}</p>
                    </div>
                    <div class="col-md-4">
                        <label for="">Repayment Period</label>
                        <label for="" class="text-success">{{$repayment_period}} Days</label>
                    </div>
                   

                    <hr>
                    <h6>Loan Summary Info</h6>
                    <hr>
                    <div class="col-md-4">
                        <label for=""> Repayment Amount</label>
                        <h6 for="" class="text-success">Ksh {{number_format($total)}}</h6>
                    </div>
                    <div class="col-md-4">
                        <label for="">Interest Amount</label>
                        <h6 for="" class="text-success">Ksh {{number_format($interest)}}</h6>
                    </div>
                    <div class="col-md-4">
                        <label for="">Disbursement</label>
                        <h6 for="" class="text-success">Ksh {{number_format($disbursed)}}</h6>
                    </div>
                    <div class=" d-flex justify-content-end pt-3">
                        <button wire:click="applyLoan" class="btn btn-primary col-md-4" type="button">
                            <div wire:loading wire:target="applyLoan">
                                <span class="spinner-border me-1" role="status" aria-hidden="true"></span>
                            </div>
                            Apply Loan
                          </button>
                       
                           
                        
                    </div>

                    @endif

                  
                </div>
               </form>
            </div>
           
        </div>
    </div>
</div>
