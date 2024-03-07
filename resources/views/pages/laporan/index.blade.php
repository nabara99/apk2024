@extends('layouts.app')

@section('title', '')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Laporan Perbendaharaan</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card card-primary">
                        <form action="{{route('laporan.bendahara')}}" method="POST" target="blank">
                            @csrf
                            <div class="card-header">
                                <h4>Laporan Bendahara</h4>
                                <div class="card-header-action">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Awal</label>
                                            <input type="text" id="start_date" name="start_date" class="form-control datepicker" value="{{ $startDate ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Akhir</label>
                                            <input type="text" id="end_date" name="end_date" class="form-control datepicker" value="{{ $endDate ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Button Group</h4>
                            <div class="card-header-action">
                                <div class="btn-group">
                                    <a href="#"
                                        class="btn btn-primary">Home</a>
                                    <a href="#"
                                        class="btn btn-primary">Profile</a>
                                    <a href="#"
                                        class="btn btn-primary">Setting</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Write something here</p>
                        </div>
                    </div>
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>Input Text</h4>
                            <form class="card-header-form">
                                <input type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="Search">
                            </form>
                        </div>
                        <div class="card-body">
                            <p>Write something here</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card card-secondary">
                        <form action="{{route('laporan.realisasi')}}" method="GET" target="blank">
                            @csrf
                            <div class="card-header">
                                <h4>Laporan Renja</h4>
                                <div class="card-header-action">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                Laporan Realisasi Renja update
                            </div>
                        </form>
                    </div>
                    <div class="card card-danger">
                        <div class="card-header">
                            <h4>Dropdown Button</h4>
                            <div class="card-header-action">
                                <a href="#"
                                    class="btn btn-primary">View All</a>
                                <div class="dropdown">
                                    <a href="#"
                                        data-toggle="dropdown"
                                        class="btn btn-warning dropdown-toggle">Options</a>
                                    <div class="dropdown-menu">
                                        <a href="#"
                                            class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                        <a href="#"
                                            class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#"
                                            class="dropdown-item has-icon text-danger"><i
                                                class="far fa-trash-alt"></i> Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Write something here</p>
                        </div>
                    </div>
                    <div class="card card-warning">
                        <div class="card-header">
                            <h4>Input Button</h4>
                            <form class="card-header-form">
                                <div class="input-group">
                                    <input type="text"
                                        name="search"
                                        class="form-control"
                                        placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-icon"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <p>Write something here</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
