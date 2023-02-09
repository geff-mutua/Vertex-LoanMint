<div wire:ignore.self class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Create New Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Name</label>
                        <input type="text" wire:model="name" class="form-control" placeholder="Enter Name">
                        @error('name') <small style="font-size: 10px" class="text-danger">{{ $message
                        }}</small> @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-0">
                        <label for="emailBasic" class="form-label">Branch Location</label>
                        <select class="form-control" wire:model="location" id="">
                            @include('components.counties')
                        </select>
                    </div>
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button  class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
