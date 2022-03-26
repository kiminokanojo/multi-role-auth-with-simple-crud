@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit domain</h2>
                    <a class="btn btn-primary" href="{{ route('domain.index') }}"> Kembali</a>
                </div>
                
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Edit Gagal</strong> Maaf ada kesalahan saat input data<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('domain.update', $domain->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama:</strong>
                                    <input type="text" name="nama_domain" value="{{ $domain->nama_domain }}" class="form-control" placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">EDIT</button>
                            </div>
                        </div>
                    </form>
                </div>
                
                
            </div>
        </div>
    </div>
</div>

@endsection