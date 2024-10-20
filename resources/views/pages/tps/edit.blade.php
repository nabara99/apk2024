@extends('layouts.app')

@section('title', 'Upload Absen')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Upload Absen TPS : {{$tps->no_tps}} Desa/Kel : {{$tps->desa->nama_desa}} Kec : {{$tps->desa->kecamatan->nama_kec}}</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('tps.update', $tps->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="absen">File Absen *(harus format pdf)</label>
                                        <div class="col-9">
                                            <input type="file" class="form-control" name="absen" accept=".pdf"
                                            @error('absen') is-invalid @enderror>
                                        </div>
                                        @error('absen')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Upload</button>
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
