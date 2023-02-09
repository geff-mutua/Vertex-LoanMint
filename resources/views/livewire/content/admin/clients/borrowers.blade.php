<div>

    @section('title', 'Clients')

    {{-- <h5 class="fw-bold py-2 mb-4">
<span class="text-muted fw-light">Admin /</span> Clients
</h5> --}}
    <div class="d-flex justify-content-between mb-2">
        <div>
            <h5 class="card-header">Registered Clients </h5>
        </div>
        <div class="">
            <a href="{{ route('clients-new', ['domain' => auth()->user()->domain->name]) }}" class="btn btn-primary ">New
                Client</a>
        </div>
    </div>

    <!-- Fixed Header -->
    <div class="card">

        <div class="card-datatable table-responsive">
            <table class="table" id="dataTable1">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-white" style="font-size: 10px">#</th>
                        <th class="text-white" style="font-size: 10px">Name</th>
                        <th class="text-white" style="font-size: 10px">Mobile</th>
                        <th class="text-white" style="font-size: 10px">Address</th>
                        <th class="text-white" style="font-size: 10px">Zip Code</th>
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

                                <small
                                    class="text-xs {{ $borrower->status == 1 ? 'text-success' : 'text-warning' }}">{{ $borrower->status == 1 ? 'Active' : 'Pending' }}</small>

                            </td>

                            <td>
                                {{-- <i style="font-size: 12px;cursor-pointer" class="fa fa-eye text-info"></i>
                      <i style="font-size: 12px;cursor-pointer" class="fa fa-edit text-warning"></i> --}}
                                <a href="javascript:void(0)" data-toggle="modal"
                                    data-target="#viewDetails{{ $borrower->id }}">
                                    <small class="text-xs text-info">edit</small>
                                </a>
                                <a href="{{route('borrower-profile',['domain'=>auth()->user()->domain->name,'id'=>$borrower->id])}}">
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
