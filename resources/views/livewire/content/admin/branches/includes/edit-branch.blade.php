<div wire:ignore.self class="modal fade" id="editModal{{$branch->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form >
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
                        @error('location') <small style="font-size: 10px" class="text-danger">{{ $message
                        }}</small> @enderror
                    </div>
                   
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="store" class="btn btn-primary" type="button">
                    <div wire:loading wire:target="store">
                        <span class="spinner-border me-1" role="status" aria-hidden="true"></span>
                    </div>
                    Save Changes
                  </button>
                <button type="submit" class="btn btn-primary">Update changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
