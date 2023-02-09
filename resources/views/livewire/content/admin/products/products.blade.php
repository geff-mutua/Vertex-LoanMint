<div>

    @section('title', 'Products')

    @section('vendor-style')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
        <link rel="stylesheet"
            href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    @endsection

    @section('page-style')
        <!-- Page -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}">
    @endsection

    @section('vendor-script')
        <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    @endsection

    @section('page-script')

    @endsection


    <div class="d-flex justify-content-between mb-2">
        <div>
            <h5 class="card-header">@yield('title') </h5>
        </div>
        <div class="">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                New Product
              </button>
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
                        <th class="text-white" style="font-size: 10px">Interest Rate</th>
                        <th class="text-white" style="font-size: 10px">Min Amount</th>
                        <th class="text-white" style="font-size: 10px">Max Amount</th>
                        <th class="text-white" style="font-size: 10px">Branch</th>
                        <th class="text-white" style="font-size: 10px">Repayment </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td><small class="text-xs">{{$loop->iteration}}</small></td>
                            <td><small class="text-xs">{{$product->product_name}}</small></td>
                            <td><small class="text-xs">{{$product->interest_rate}}% of Principal</small></td>
                            <td><small class="text-xs">{{number_format($product->min_loan)}}</small></td>
                            <td><small class="text-xs">{{number_format($product->max_loan)}}</small></td>
                            <td><small class="text-xs">{{$product->branch->name}}</small></td>
                           <td>
                            <button wire:click="editProduct({{$product}})" class="text-warning btn btn-xs text-xs" data-bs-toggle="modal" data-bs-target="#editProduct{{$product->id}}">
                                Edit
                                </button>

                           </td>
                           @include('livewire.content.admin.products.includes.edit-product')
                        </tr>
                    @empty
                        
                    @endforelse

                </tbody>

            </table>
        </div>
    </div>

    @include('livewire.content.admin.products.includes.new-product')

</div>
