@extends('layouts/layoutMaster')

@section('title', 'Company Information')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
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

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">@yield('title')</h4>
        </div>

        <div class="card-body justify-content-center mt-1">

            <form action="{{ route('company-update', ['domain' => auth()->user()->domain->name]) }}" method="post" enctype="multipart/form-data"
                >
                @csrf
                <div class="row">
                    @if(!is_null($settings))
                    @if(!is_null($settings->logo))
                    <div>
                        <img src="{{asset('logo/'.$settings->logo)}}" width="200" height="150" alt="">
                    </div>
                    @endif
                    @endif
                    <div class="form-group">
                        <label for="">Company Logo</label>
                        <input type="file" name="logo" class="form-control col-md-8 @error('logo')is-valid @enderror">
                        @error('logo') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                    </div>
                  
                    <input type="hidden" name="id" value="{{$settings?$settings->id:''}}" id="">
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label">Company Name</label>
                        <input placeholder="Company Name" type="text" class="form-control"
                                name="name" value="{{$settings? $settings->name:''}}">
                        @error('name')
                            <small style="font-size: 10px"
                                class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                   
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label">Official Email</label>
                        <input type="text" placeholder="Official Email"
                        class="form-control" name="email" value="{{$settings? $settings->email:''}}">
                       
                        @error('email')
                            <small style="font-size: 10px"
                                class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label">Official Address</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" placeholder="Location Address"
                                name="address" value="{{$settings? $settings->address:''}}">
                        </div>
                        @error('address')
                            <small style="font-size: 10px"
                                class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
             
                    <div class="form-group col-md-6 mb-3 ">
                        <label class="form-label">Zip Code</label>
                        <input type="text" class="form-control" name="zipcode"
                                placeholder="Zip Code" value="{{$settings? $settings->zipcode:''}}">
                        
                        @error('zipcode')
                            <small style="font-size: 10px"
                                class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3 ">
                        <label class="form-label">Mobile Number</label>
                        <input type="number" name="mobile" class="form-control" value="{{$settings? $settings->mobile:''}}"
                        placeholder="Mobile Number">
                        @error('mobile')
                            <small style="font-size: 10px"
                                class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label">Town / City</label>
                        <div class="input-group input-group-outline">
                            <input type="text" class="form-control" name="town"
                                placeholder="Town / City" value="{{$settings? $settings->town:''}}">
                        </div>
                        @error('town')
                            <small style="font-size: 10px"
                                class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label">Domain Name</label>
                        <select name="country" class="form-control" id="">
                            <option value="{{$settings?$settings->country:''}}">{{$settings?$settings->country:''}}</option>
                            @include('components.countries')
                        </select>
                        @error('country')
                            <small style="font-size: 10px"
                                class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Domain Name</label>
                        <input type="text" readonly disabled class="form-control" value="{{auth()->user()->domain->name}}.loan-mint.com" 
                        placeholder="Company Domain">
                   
                    </div>

                   

                   
                </div>
                
                <hr>
               <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update</button>
               </div>
            </form>

        </div>
    </div>

@endsection
