@extends('layouts/layoutMaster')

@section('title', 'Theme Settings')

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

        <div class="card-body justify-content-center mt-1">

            <form action="{{ route('theme-update', ['domain' => auth()->user()->domain->name]) }}" method="post"
                >
                @csrf

                <input type="hidden" name="id" value="{{$theme?$theme->id:''}}" id="">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h4 class="card-header">@yield('title')</h4>
                        <div class="card-body">

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Choose Theme Style </label>
                                    <select name="myStyle" class="form-control">
                                        <option value="{{$theme?strtoupper($theme->myStyle):''}}">{{$theme?$theme->myStyle:''}}</option>
                                        <option value="light">Light</option>
                                        <option value="dark">Dark</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Choose Theme Version </label>
                                    <select name="myTheme" class="form-control">
                                        <option value="{{$theme?$theme->myTheme:''}}">{{$theme?strtoupper($theme->myTheme):''}}</option>
                                        <option value="theme-semi-dark">Semi Dark</option>
                                        <option value="theme-default">Default Version</option>
                                        <option value="theme-bordered">Bordered</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Choose Theme Layout </label>
                                    <select name="myLayout" class="form-control">
                                        <option value="{{$theme?$theme->myLayout:''}}">{{$theme?strtoupper($theme->myLayout):''}}</option>
                                        <option value="vertical">Vertical</option>
                                        <option value="horizontal">Horizontal</option>
                                        <option value="blank">Blank</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Choose Menu Option </label>
                                    <select name="menuFixed" class="form-control">
                                 
                                        <option value="1">Fixed</option>
                                        <option value="0">Scrollable</option>
                                        
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Navbar Type </label>
                                    <select name="navbarFixed" class="form-control">
                                        <option value="1">Fixed</option>
                                        <option value="0">Scrollable</option>
                                        
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Choose Footer </label>
                                    <select name="footerFixed" class="form-control">
                                        <option value="1">Show Footer</option>
                                        <option value="0">Hide Footer</option>
                                        
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Menu Type </label>
                                    <select name="menuCollapsed" class="form-control">
                                        <option value="0">Expanded Menu</option>
                                        <option value="1">Collapsed Menu</option>
                                        
                                    </select>
                                </div>
                               

                            </div>


                        </div>
                    </div>
                </div>


                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </div>
            </form>

        </div>
    </div>

@endsection
