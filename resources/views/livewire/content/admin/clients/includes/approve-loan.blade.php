<div wire:ignore.self class="modal fade" id="approveLoan{{ $value->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Approve Loan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <p>You are about to approve the selected loan. Once the action is, the loan will go to the next stage.</p>
                     <p>Click appropriate action from below.</p>
                   
                     <button wire:click="approveLoan" class="btn btn-primary" type="button">
                        <div wire:loading wire:target="approveLoan">
                            <span class="spinner-border me-1" role="status" aria-hidden="true"></span>
                        </div>
                        Approve Loan
                      </button>
                      <button wire:click="rejectLoan" class="btn btn-danger" type="button">
                        <div wire:loading wire:target="rejectLoan">
                            <span class="spinner-border me-1" role="status" aria-hidden="true"></span>
                        </div>
                        Reject Loan
                      </button>
                    
                </div>
            </div>

        </div>
    </div>
</div>
