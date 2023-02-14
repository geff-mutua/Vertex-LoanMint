<div>

    @section('title', 'Clients')
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Active Borrowers</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{$borrowerStats['active']}}/{{count($borrowers)}}</h4>
                                <span class="text-success">{{$borrowerStats['active']}}/{{count($borrowers)}}</span>
                            </div>
                            <span>Total Active</span>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="ti ti-user ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Pending Approval</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{$borrowerStats['pending']}}</h4>
                                <span class="text-success text-xs">(+{{$borrowerStats['pending']}})</span>
                            </div>
                            <span>Pending Approvals </span>
                        </div>
                        <span class="badge bg-label-danger rounded p-2">
                            <i class="ti ti-user-plus ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Rejected Profiles</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{$borrowerStats['rejected']}}</h4>
                                <span class="text-danger"></span>
                            </div>
                            <span>Rejected Clients</span>
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                            <i class="ti ti-user-check ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Inactive Clients</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{$borrowerStats['inactive']}}</h4>
                                <span class="text-success"></span>
                            </div>
                            <span>Last 3 Months</span>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                            <i class="ti ti-user-exclamation ti-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fixed Header -->
    <div class="card">
        <div class="card-header border-bottom">
            <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                <h5 class="card-title mb-3">Filter Borrowers</h5>
                <div class="col-md-4 user_role">
                    <select id="UserRole" class="form-select text-capitalize" >
                        <option value=""> Filter By Branch </option>
                      @forelse ($branches as $branch)
                          <option value="{{$branch->id}}">{{strtoupper($branch->name)}}</option>
                      @empty
                          
                      @endforelse
                    </select>
                </div>
                <div class="col-md-4 user_plan">
                    <select id="UserPlan" class="form-select text-capitalize">
                        <option value=""> Filter By Loan Officer </option>
                      @forelse ($officers as $officer)
                          <option value=""></option>
                      @empty
                          
                      @endforelse
                    </select>
                </div>
                <div class="col-md-4 user_status">
                    <select id="FilterTransaction" class="form-select text-capitalize">
                        <option value=""> Filter By Status</option>
                        <option value="Pending" class="text-capitalize">Pending</option>
                        <option value="Active" class="text-capitalize">Active</option>
                        <option value="Inactive" class="text-capitalize">Inactive</option>
                        <option value="Inactive" class="text-capitalize">Rejected</option>
                    </select></div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="table" id="dataTable1">
                <thead>
                    <tr>
                        <th class="text-white" style="font-size: 10px">#</th>
                        <th class="text-white" style="font-size: 10px">Name</th>
                        <th class="text-white" style="font-size: 10px">Mobile</th>
                        <th class="text-white" style="font-size: 10px">Address</th>
                        <th class="text-white" style="font-size: 10px">Code</th>
                        <th class="text-white" style="font-size: 10px">Town</th>
                        <th class="text-white" style="font-size: 10px">National Id</th>
                        <th class="text-white" style="font-size: 10px">Status</th>
                        <th class="text-white" style="font-size: 10px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($borrowers as $key => $borrower)
                        <tr>
                            <td><small class="text-xs">{{ $loop->iteration }}</small></td>
                            <td><small data-toggle="modal" data-target="#viewDetails{{ $borrower->id }}"
                                    class="text-xs">{{ $borrower->fullname() }}</small></td>
                            <td><small class="text-xs">{{ $borrower->mobile }}</small></td>
                            <td><small class="text-xs">{{ $borrower->address }}</small></td>
                            <td><small class="text-xs">{{ $borrower->code }}</small></td>
                            <td><small class="text-xs">{{ $borrower->town }}</small></td>
                            <td><small class="text-xs">{{ $borrower->id_number }}</small></td>
                            <td>
                                @if($borrower->status == 1)
                                <small class="text-xs text-success">Active</small>
                                @elseif ($borrower->status == 0)
                                <small class="text-xs text-warning">Pending</small>
                                @else
                                <small class="text-xs text-danger">Rejected</small>
                                @endif

                            </td>

                            <td>
                                {{-- <i style="font-size: 12px;cursor-pointer" class="fa fa-eye text-info"></i>
                      <i style="font-size: 12px;cursor-pointer" class="fa fa-edit text-warning"></i> --}}
                                <a href="javascript:void(0)" data-toggle="modal"
                                    data-target="#viewDetails{{ $borrower->id }}">
                                    <small class="text-xs text-info">edit</small>
                                </a>
                                <a
                                    href="{{ route('borrower-profile', ['domain' => auth()->user()->domain->name, 'id' => $borrower->id]) }}">
                                    <small class="text-xs text-warning">profile</small>
                                </a>
                            </td>


                            @include('livewire.content.admin.clients.includes.details')
                        </tr>
                    @empty
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
    <!--/ Fixed Header -->



</div>
