@extends('layouts.app')

@section('title', '')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Buat Pengguna</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('user.index') }}" class="btn btn-primary btn-icon"><i
                                            class="fa-solid fa-arrow-rotate-left" title="kembali"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror" name="name">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror" name="email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-lock"></i>
                                                </div>
                                            </div>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password">
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label">Status</div>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="admin"
                                                    class="selectgroup-input" checked="">
                                                <span class="selectgroup-button">Admin</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="pps"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">PPS</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="kpps"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">KPPS</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="viewer"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">Viewer</span>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Dropdown TPS (Disembunyikan secara default) -->
                                    <div class="form-group d-none" id="tps-select-group">
                                        <label for="">Pilih TPS</label>
                                        <select
                                            class="form-control select2 select2-hidden-accessible @error('tps')
                                                    is-invalid
                                                @enderror"
                                            style="width: 100%;" tabindex="-1" aria-hidden="true" name="tps_id">
                                            <option value="" selected disabled>--Pilih TPS--</option>
                                            @foreach ($tps_list as $tps)
                                                <option value="{{ $tps->id }}"
                                                    {{ old('tps_id') == $tps->id ? 'selected' : '' }}>
                                                    {{ $tps->desa->kecamatan->nama_kec }} | {{ $tps->desa->nama_desa }} |
                                                    {{ $tps->no_tps }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tps_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group d-none" id="desa-select-group">
                                        <label>Pilih Desa</label>
                                        <select
                                            class="form-control select2 select2-hidden-accessible @error('desa_id') is-invalid @enderror"
                                            style="width: 100%;" tabindex="-1" aria-hidden="true" name="desa_id">
                                            <option value="" selected disabled>--Pilih Desa--</option>
                                            @foreach ($desa_list as $desa)
                                                <option value="{{ $desa->id }}"
                                                    {{ old('desa_id') == $desa->id ? 'selected' : '' }}>
                                                    {{ $desa->nama_desa }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('desa_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>

    <!-- Custom Script untuk Dropdown TPS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleRadios = document.querySelectorAll('input[name="roles"]');
            const tpsSelectGroup = document.getElementById('tps-select-group');
            const desaSelectGroup = document.getElementById('desa-select-group');

            roleRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    // Reset tampilan dropdown
                    tpsSelectGroup.classList.add('d-none');
                    desaSelectGroup.classList.add('d-none');

                    if (this.value === 'kpps') {
                        tpsSelectGroup.classList.remove('d-none');
                    } else if (this.value === 'pps') {
                        desaSelectGroup.classList.remove('d-none');
                    }
                });
            });
        });
        $(document).ready(function() {
            $('.select2').select2({
                closeOnSelect: false
            });
        });
    </script>
@endpush
