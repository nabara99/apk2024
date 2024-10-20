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
                                <h4>Edit Pengguna</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('user.index') }}" class="btn btn-primary btn-icon"><i
                                        class="fa-solid fa-arrow-rotate-left" title="kembali"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.update', $user) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text"
                                            class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                                            name="name" value="{{ $user->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email"
                                            class="form-control @error('email')
                                        is-invalid
                                    @enderror"
                                            name="email" value="{{ $user->email }}">
                                        @error('email')
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
                                                    class="selectgroup-input"
                                                    @if ($user->roles == 'admin') checked @endif>
                                                <span class="selectgroup-button">Admin</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="pps"
                                                    class="selectgroup-input"
                                                    @if ($user->roles == 'pps') checked @endif>
                                                <span class="selectgroup-button">PPS</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="kpps"
                                                    class="selectgroup-input"
                                                    @if ($user->roles == 'kpps') checked @endif>
                                                <span class="selectgroup-button">KPPS</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="viewer"
                                                    class="selectgroup-input"
                                                    @if ($user->roles == 'viewer') checked @endif>
                                                <span class="selectgroup-button">Viewer</span>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Dropdown TPS -->
                                    <div class="form-group" id="tps-select-group" @if($user->roles != 'kpps') style="display: none;" @endif>
                                        <label>Pilih TPS</label>
                                        <select
                                            class="form-control select2 @error('tps_id') is-invalid @enderror"
                                            style="width: 100%;" name="tps_id">
                                            <option value="" disabled>--Pilih TPS--</option>
                                            @foreach ($tps_list as $tps)
                                                <option value="{{ $tps->id }}"
                                                    @if ($user->tps_id == $tps->id) selected @endif>
                                                    {{ $tps->desa->kecamatan->nama_kec }} | {{ $tps->desa->nama_desa }} | {{ $tps->no_tps }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tps_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Dropdown Desa -->
                                    <div class="form-group" id="desa-select-group" @if($user->roles != 'pps') style="display: none;" @endif>
                                        <label>Pilih Desa</label>
                                        <select
                                            class="form-control select2 @error('desa_id') is-invalid @enderror"
                                            style="width: 100%;" name="desa_id">
                                            <option value="" disabled>--Pilih Desa--</option>
                                            @foreach ($desa_list as $desa)
                                                <option value="{{ $desa->id }}"
                                                    @if ($user->desa_id == $desa->id) selected @endif>
                                                    {{ $desa->kecamatan->nama_kec }} | {{ $desa->nama_desa }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('desa_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary">Update</button>
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

    <!-- Custom Script untuk Dropdown TPS dan Desa -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleRadios = document.querySelectorAll('input[name="roles"]');
            const tpsSelectGroup = document.getElementById('tps-select-group');
            const desaSelectGroup = document.getElementById('desa-select-group');

            roleRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'kpps') {
                        tpsSelectGroup.style.display = 'block';
                        desaSelectGroup.style.display = 'none';
                    } else if (this.value === 'pps') {
                        tpsSelectGroup.style.display = 'none';
                        desaSelectGroup.style.display = 'block';
                    } else {
                        tpsSelectGroup.style.display = 'none';
                        desaSelectGroup.style.display = 'none';
                    }
                });
            });
        });
    </script>

@endpush
