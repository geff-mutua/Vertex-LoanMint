<div class="modal-onboarding modal fade animate__animated" id="viewDetails{{$borrower->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content text-center">
        <div class="modal-header border-0">
          <a class="text-muted close-label" href="javascript:void(0);" data-bs-dismiss="modal">Skip Intro</a>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body p-0">

          <div class="onboarding-content mb-0">
            <h4 class="onboarding-title text-body">Example Request Information</h4>
            <div class="onboarding-info">In this example you can see a form where you can request some additional
              information from the customer when they land on the app page.</div>
            <form>
              <div class="row">
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label for="nameEx3" class="form-label">Your Full Name</label>
                    <input class="form-control" placeholder="Enter your full name..." type="text" value="" tabindex="0" id="nameEx3">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="mb-3">
                    <label for="roleEx3" class="form-label">Your Role</label>
                    <select class="form-select" tabindex="0" id="roleEx3">
                      <option>Web Developer</option>
                      <option>Business Owner</option>
                      <option>Other</option>
                    </select>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>