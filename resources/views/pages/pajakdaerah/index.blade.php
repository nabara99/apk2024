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

                <form id="generatePajakForm" action="{{ route('kwitansi.generatePajakDaerah') }}" method="POST">
                    @csrf
                    <button type="button" id="generatePajakButton">Generate Pajak Daerah</button>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('generatePajakButton').addEventListener('click', function() {
                var form = document.getElementById('generatePajakForm');
                var formData = new FormData(form);

                var xhr = new XMLHttpRequest();
                xhr.open('POST', form.action);
                xhr.setRequestHeader('X-CSRF-Token', '{{ csrf_token() }}');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Sukses, lakukan sesuatu jika diperlukan
                            alert('Pajak Daerah berhasil di-generate');
                        } else {
                            // Gagal, tampilkan pesan kesalahan jika diperlukan
                            alert('Terjadi kesalahan saat meng-generate Pajak Daerah');
                        }
                    }
                };
                xhr.send(formData);
            });
        });
    </script>
@endpush
