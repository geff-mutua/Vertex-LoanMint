<div wire:ignore.self class="modal fade" id="deleteLoan{{ $value->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel4">Delete Loan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                 <p class="text-danger">This is Irreversable action. Kindly be sure of the action. Click delete to continue </p>
                      <button wire:click="deleteLoan" class="btn btn-danger" type="button">
                        <div wire:loading wire:target="deleteLoan">
                            <span class="spinner-border me-1" role="status" aria-hidden="true"></span>
                        </div>
                        Delete
                      </button>
                    
                </div>
            </div>

        </div>
    </div>
</div>
