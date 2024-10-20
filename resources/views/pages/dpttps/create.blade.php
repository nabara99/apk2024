@extends('layouts.app')

@section('title', 'Tambah DPT - ')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah DPT</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('dpttps.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="no_kk">No. KK</label>
                                                <input type="number" name="no_kk" value="{{ old('no_kk') }}"
                                                    class="form-control @error('no_kk') is-invalid @enderror"
                                                    name="no_kk">
                                                @error('no_kk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label for="nik">NIK</label>
                                                <input type="number" name="nik" value="{{ old('nik') }}"
                                                    class="form-control @error('nik') is-invalid @enderror" name="nik">
                                                @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label for="nama">Nama</label>
                                                <input type="text" name="nama" value="{{ old('nama') }}"
                                                    class="form-control @error('nama') is-invalid @enderror" name="nama">
                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="tl">Tempat Lahir</label>
                                                <input type="text" name="tl" value="{{ old('tl') }}"
                                                    class="form-control @error('tl') is-invalid @enderror" name="tl">
                                                @error('tl')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label for="tgl_lahir">Tanggal Lahir</label>
                                                <input type="date" name="tgl_lahir"
                                                    class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                    name="tgl_lahir">
                                                @error('tgl_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label for="status">Status Perkawinan</label>
                                                <select name="status" class="form-control" required>
                                                    <option value="S">S</option>
                                                    <option value="B">B</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="jenkel">Jenis Kelamin</label>
                                                <select name="jenkel" class="form-control" required>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label for="rt">RT</label>
                                                <input type="text" name="rt"
                                                    class="form-control @error('rt') is-invalid @enderror" name="rt">
                                                @error('rt')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label for="rw">RW</label>
                                                <input type="text" name="rw"
                                                    class="form-control @error('rw') is-invalid @enderror" name="rw">
                                                @error('rw')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" rows="2" class="form-control @error('alamat') is-invalid @enderror" name="alamat"></textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="ektp">E-KTP</label>
                                                <select name="ektp" class="form-control" required>
                                                    <option value="S">Sudah</option>
                                                    <option value="B">Belum</option>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label for="disabilitas">Disabilitas</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="disabilitas"
                                                        value="1" id="disabilitas">
                                                    <label class="form-check-label" for="disabilitas">Ya</label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label for="hadir">Hadir</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="hadir"
                                                        value="1" id="hadir">
                                                    <label class="form-check-label" for="hadir">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ route('dpttps.index') }}" class="btn btn-warning">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
