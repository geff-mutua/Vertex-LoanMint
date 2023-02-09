<div wire:ignore.self class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Create New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="store">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="nameBasic" class="form-label">Product Name</label>
                        <input type="text" wire:model="product_name" class="form-control" placeholder="Enter Name">
                        @error('product_name') <small style="font-size: 10px" class="text-danger">{{ $message
                        }}</small> @enderror
                    </div>
                      <div class="col-md-6 mb-3">
                        <label for="nameBasic" class="form-label">Interest Rate </label>
                        <input type="text" wire:model="interest_rate" class="form-control" placeholder="Interest Rate">
                        @error('interest_rate') <small style="font-size: 10px" class="text-danger">{{ $message
                        }}</small> @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="nameBasic" class="form-label">Minimum Amount </label>
                        <input type="text" wire:model="min_loan" class="form-control" placeholder="Minimum Amount">
                        @error('min_loan') <small style="font-size: 10px" class="text-danger">{{ $message
                        }}</small> @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="nameBasic" class="form-label">Miximum Amount </label>
                        <input type="text" wire:model="max_loan" class="form-control" placeholder="Maximum Amount">
                        @error('min_loan') <small style="font-size: 10px" class="text-danger">{{ $message
                        }}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nameBasic" class="form-label">Repayment Period </label>
                        <select class="form-control" wire:model="duration" id="">
                            <option value="">--Select--</option>
                            <option value="7">7 Days</option>
                            <option value="14">14 Weeks</option>
                            <option value="21">21 Days</option>
                            <option value="30">30 Days</option>
                            <option value="60">60 Days</option>
                            <option value="90">90 Days</option>
                        </select>
                        @error('duration') <small style="font-size: 10px" class="text-danger">{{ $message
                        }}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nameBasic" class="form-label">Product Branch </label>
                        <select class="form-control" wire:model="branch" id="">
                            <option value="">--Select--</option>
                            @forelse ($branches as $item)
                                <option value="{{ $item->id }}">{{ $item->name  }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                        @error('branch') <small style="font-size: 10px" class="text-danger">{{ $message
                        }}</small> @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Interest Type </label>
                        <select class="form-control" wire:model="interest_type" id="">
                            <option value="">--Select--</option>
                          <option value="Before">Before</option>
                          <option value="After">After</option>
                        </select>
                        @error('interest_type') <small style="font-size: 10px" class="text-danger">{{ $message
                        }}</small> @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Processing Fee Rate </label>
                        <select class="form-control" wire:model="procesing_fee_rate" id="">
                            <option value="">--Select--</option>
                            <option value="1.5">1.5 %</option>
                            <option value="2">2 %</option>
                            <option value="2.5">2.5 %</option>
                            <option value="3">3 %</option>
                            <option value="3.5">3.5 %</option>
                            <option value="4">4 %</option>
                        </select>
                        @error('procesing_fee_rate') <small style="font-size: 10px" class="text-danger">{{ $message
                        }}</small> @enderror
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
