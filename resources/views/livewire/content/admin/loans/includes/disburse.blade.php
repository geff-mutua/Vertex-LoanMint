<div wire:ignore.self class="modal fade" id="updateDisbursment" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel4">Loan Disbursement Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateDisbursement">
                    <div class="col-md-12">
                        <label>Select Status</label>
                        <div class="input-group input-group-outline">
                            <select class="form-control" wire:model="disburse_status" id="">
                                <option value="">--Select--</option>
                                <option value="1">Success</option>
                                <option value="2">Failed</option>

                            </select>
                        </div>
                        @error('disburse_status')
                            <small style="font-size: 10px" class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                  
                    <div class="d-flex justify-content-end">
                        <button  class="btn btn-primary mt-3" type="submit">
                            <div wire:loading wire:target="updateDisbursement">
                                <span class="spinner-border me-1" role="status" aria-hidden="true"></span>
                            </div>
                            Update
                          </button>
                    </div>
                    
                </form>
            </div>

        </div>
    </div>
</div>
