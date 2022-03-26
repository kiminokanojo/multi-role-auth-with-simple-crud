@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2> Tampilkan domain </h2>
                    <a class="btn btn-primary" href="{{ route('user.index') }}"> Kembali</a>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <strong>Nama domain:</strong>
                        {{ $domain->nama_domain }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  --}}
@endsection