@extends('layouts.app')

@section('title', '')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daftar Pajak Daerah</h4>
                                {{-- <a href="{{ route('penerima.create') }}" class="btn btn-primary">Tambah Rekanan</a> --}}
                            </div>
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <form action="{{ route('pajakdaerah.generatePajakDaerah') }}" method="POST">
                    @csrf
                    <button type="submit">Generate Pajak Daerah</button>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
