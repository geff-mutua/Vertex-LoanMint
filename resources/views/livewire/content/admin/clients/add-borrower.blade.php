<div>

    @section('title', 'Register Client')

    @section('vendor-style')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />

    @endsection

    @section('vendor-script')
        <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>


    @endsection


    <div class="row">

        <!-- Default Wizard -->
        <div class="col-12 mb-4">

            <div class="bs-stepper wizard-numbered mt-2">
                <div class="bs-stepper-header">
                    <div class="step {{ $stage == ' 0' ? 'active' : '' }}" data-target="#account">
                        <button type="button" class="step-trigger {{ $stage == ' 0' ? 'active' : 'disabled' }}">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title">Personal Details</span>
                                <span class="bs-stepper-subtitle">Setup Personal Details</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step {{ $stage == ' 1' ? 'active' : '' }}" data-target="#business">
                        <button type="button" class="step-trigger {{ $stage == ' 1' ? 'active' : 'disabled' }}">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title">Business|Employment Details</span>
                                <span class="bs-stepper-subtitle">Add Business|Employment Details</span>
                            </span>

                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step {{ $stage == ' 2' ? 'active' : '' }}" data-target="#guarantor">
                        <button type="button" class="step-trigger {{ $stage == ' 2' ? 'active' : 'disabled' }}">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title">Guarantor Details</span>
                                <span class="bs-stepper-subtitle">Add Guarantor Details</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step {{ $stage == ' 3' ? 'active' : '' }}" data-target="#finalize">
                        <button type="button" class="step-trigger {{ $stage == ' 3' ? 'active' : 'disabled' }}">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title">Finalize</span>
                              
                            </span>
                        </button>
                    </div>

                </div>
                <div class="bs-stepper-content">

                    <!-- Account Details -->
                    <div id="account" class="content {{ $stage == ' 0' ? 'active dstepper-block' : '' }} ">

                        <div class="row g-3">
                            <form wire:submit.prevent="stageOne">
                                <h6>SECTION A</h6>

                                <div class="row">


                                    <div class="col-md-4">
                                        <label class="form-label" for="">First Name</label>
                                        <input placeholder="First Name" type="text"
                                            class="form-control @error('first_name') is-invalid @enderror"
                                            wire:model="first_name" value="">
                                        @error('first_name')
                                            <small style="font-size: 10px" class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>



                                    <div class="col-md-4">
                                        <label class="form-label" for="">Middle Name</label>
                                        <input type="text" placeholder="Middle Name" class="form-control"
                                            wire:model="middle_name" value="">
                                        @error('middle_name')
                                            <small style="font-size: 10px" class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>



                                    <div class="col-md-4">
                                        <label class="form-label" for="">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name"
                                            wire:model="last_name" value="">
                                        @error('last_name')
                                            <small style="font-size: 10px" class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-md-4">
                                        <label class="form-label" for="">I.D Number</label>
                                        <input placeholder="National Id Number" type="text" class="form-control"
                                            wire:model="id_number" value="">
                                        @error('id_number')
                                            <small style="font-size: 10px" class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <label class="form-label" for="">Date of Birth</label>
                                        <input type="date" class="form-control" wire:model="date_of_birth"
                                            value="">
                                        @error('date_of_birth')
                                            <small style="font-size: 10px" class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <label class="form-label" for="">Marital Status
                                            {{ $marital_status }}</label>
                                        <select class="form-control" wire:model="marital_status" id="">
                                            <option value="">--Select--</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Windowed">Widowed</option>
                                        </select>
                                        @error('marital_status')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                                @if ($marital_status == 'Married')
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label class="form-label" for="">Name of Spouse</label>
                                            <input placeholder="Name Of Spouse" type="text" class="form-control"
                                                wire:model="spouse" value="">
                                        </div>


                                        <div class="col-md-4">
                                            <label class="form-label" for="">I.D Number</label>
                                            <input type="text" placeholder="Spouse National Id"
                                                class="form-control" wire:model="spouse_naid" value="">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" for="">Spouse Mobile</label>
                                            <input placeholder="Spouse Mobile Number" type="text"
                                                class="form-control" wire:model="spouse_phone" value="">
                                        </div>
                                    </div>
                                @endif

                                <hr>
                                <h6>SECTION B</h6>
                                <hr>

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <div>
                                            <label class="form-label" for="">Tel (Mobile)</label>
                                            <input placeholder="Mobile Number" type="number" class="form-control"
                                                wire:model="mobile" value="">
                                        </div>
                                        @error('mobile')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div>
                                            <label class="form-label" for="">Postal Address</label>
                                            <input type="text" placeholder="Address" class="form-control"
                                                wire:model="address" value="">
                                        </div>
                                        @error('address')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div>
                                            <label class="form-label" for="">Code</label>
                                            <input type="text" placeholder="code" class="form-control"
                                                wire:model="code" value="">
                                        </div>
                                        @error('code')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div>
                                            <label class="form-label" for="">Town</label>
                                            <input type="text" placeholder="town" class="form-control"
                                                wire:model="town" value="">
                                        </div>
                                        @error('town')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div>
                                            <label class="form-label" for="">Present residence
                                                addres</label>
                                            <input
                                                placeholder="please give full details – plot no., Street Name, area etc"
                                                wire:model="residence_address" class="form-control">
                                        </div>
                                        @error('residence_address')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3 ">
                                        <div>
                                            <label class="form-label" for="">Education Level</label>
                                            <select class="form-control" wire:model="education_level" id="">
                                                <option value="">--Select--</option>
                                                <option value="Primary">Primary</option>
                                                <option value="Secondary">Secondary</option>
                                                <option value="Tertiary">Tertiary</option>
                                            </select>
                                        </div>
                                        @error('education_level')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3 ">
                                        <div>
                                            <label class="form-label" for="">Resident Type</label>
                                            <select class="form-control" wire:model="residence_type" id="">
                                                <option value="">--Select--</option>
                                                <option value="Rented">Rented</option>
                                                <option value="Owned">Owned</option>
                                                <option value="Morgage">Morgage</option>
                                            </select>
                                        </div>
                                        @error('residence_type')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                </div>

                                <hr>
                                <h6>SECTION C</h6>
                                <hr>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <div>
                                            <label class="form-label" for="">Attach a copy of ID of the
                                                borrower</label>
                                            <input type="file" class="form-control"
                                                wire:model="borrower_id_photo">
                                        </div>
                                        @error('borrower_id_photo')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div>
                                            <label class="form-label" for="">Attach a copy of passport of
                                                the borrower</label>
                                            <input type="file" class="form-control"
                                                wire:model="borrower_passport">
                                        </div>
                                        @error('borrower_passport')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                @if ($marital_status == 'Married')
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <div>
                                                <label class="form-label" for="">Attach a copy of ID of
                                                    the borrower's spouse</label>
                                                <input type="file" class="form-control"
                                                    wire:model="borrower_spouse_id_photo">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div>
                                                <label class="form-label" for="">Attach a copy of passport
                                                    of the borrower"s spouse</label>
                                                <input type="file" class="form-control"
                                                    wire:model="borrower_spouse_passport">
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <br>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Save & Next</button>
                                </div>
                            </form>



                        </div>
                    </div>
                    <!-- Personal Info -->
                    <div id="business" class="content  {{ $stage == ' 1' ? 'active dstepper-block' : '' }}">
                        <div class="row g-3">
                            <form wire:submit.prevent="stageTwo">
                                <div class="row">
                                    <div class="form-group col-md-4 mb-3">

                                        <label for="" class="form-label">Business type Status</label>
                                        <select class="form-control" wire:model="business_type" id="">
                                            <option value="">--Select--</option>
                                            <option value="Agriculture">Agriculture</option>
                                            <option value="Trade">Trade</option>
                                            <option value="Services">Services</option>
                                            <option value="Other">Other</option>
                                        </select>

                                        @error('business_type')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-8 mb-3">

                                        <label class="form-label">Business location</label>
                                        <input placeholder="Business Location" type="text" class="form-control"
                                            wire:model="business_location" value="">

                                        @error('business_location')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    @if ($business_type == 'Trade')
                                        <div class="row">

                                            <div class="mb-3">
                                                <label class="form-label">What type of Trade Business</label>
                                                <textarea class="form-control" wire:model="business_type_trade" rows="3" cols="140"></textarea>
                                            </div>

                                        </div>
                                    @endif
                                    @if ($business_type == 'Other')
                                        <div class="row">


                                            <label class="form-label">provide More details of the Business</label>
                                            <textarea class="form-control" wire:model="business_type_others" rows="3" cols="140"></textarea>


                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="form-group col-md-3">

                                            <label class="form-label">Monthly Income</label>
                                            <input type="number" class="form-control" wire:model="monthly_income"
                                                value="">

                                            @error('monthly_income')
                                                <small style="font-size: 10px"
                                                    class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">

                                            <label class="form-label">Net Income</label>
                                            <input type="number" class="form-control" placeholder=""
                                                wire:model="net_income" value="">

                                            @error('net_income')
                                                <small style="font-size: 10px"
                                                    class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">

                                            <label class="form-label">Monthly Expenses(B)</label>
                                            <input type="number" class="form-control" wire:model="monthly_expenses"
                                                value="">

                                            @error('monthly_expenses')
                                                <small style="font-size: 10px"
                                                    class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">

                                            <label class="form-label"> Household Expenses(H)</label>
                                            <input type="number" class="form-control"
                                                wire:model="monthly_household_expenses" value="">

                                            @error('monthly_household_expenses')
                                                <small style="font-size: 10px"
                                                    class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Save & Next</button>
                            </form>
                        </div>


                    </div>
                    <!-- Social Links -->
                    <div id="guarantor" class="content {{ $stage == ' 2' ? 'active dstepper-block' : '' }} "
                        >
                        <div class="row g-3">
                            <form wire:submit.prevent="stageThree">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="form-label">Name(As Per I.D.)</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" wire:model="full_name"
                                                value="">
                                        </div>
                                        @error('full_name')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label">Occupation</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" wire:model="occupation"
                                                value="">
                                        </div>
                                        @error('occupation')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label">Tel / Mobile</label>
                                        <div class="mb-3">
                                            <input type="number" class="form-control" wire:model="phone"
                                                value="">
                                        </div>
                                        @error('phone')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label">I.D Number</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" wire:model="naid"
                                                value="">
                                        </div>
                                        @error('naid')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="form-label">Relationship</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" wire:model="relationship"
                                                value="">
                                        </div>
                                        @error('relationship')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label">Residence Location</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control"
                                                wire:model="residence_location" value="">
                                        </div>
                                        @error('residence_location')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label">Business Location</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control"
                                                wire:model="gbusiness_location" value="">
                                        </div>
                                        @error('gbusiness_location')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label">Years known</label>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" wire:model="years_known"
                                                value="">
                                        </div>
                                        @error('years_known')
                                            <small style="font-size: 10px"
                                                class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label" for="">Addition Information</label>
                                        <div class="mb-3">
                                            <textarea wire:model="description" class="form-control" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Save & Next</button>
                            </form>
                        </div>
                    </div>

                    <div id="finalize" class="content {{ $stage == ' 3' ? 'active dstepper-block' : '' }} "
                    >
                    <div class="row g-3">
                        <div class="col-md-12">
                            <p>You are the current loan officer of this borrower.You can also assign this to another
                                loan officer.</p>
                          </div>

                           <div class="col-md-6">
                            <label for="">Re-assign Officer Officer</label>
                            <form wire:submit.prevent="stageFour">
                                <div class="form-group">
                                    <div class="input-group input-group-outline">
                                      
                                        <select class="form-control " wire:model="loan_officer" id="">
                                            <option value="">--select--</option>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <button type="submit" class="btn btn-primary">Save & Finish</button>
                                </div>
                            </form>

                           </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
        <!-- /Default Wizard -->


    </div>
</div>
