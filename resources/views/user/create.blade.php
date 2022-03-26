@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah domain</h2>
                    <a class="btn btn-primary" href="{{ route('user.index') }}"> Kembali</a>
                </div>
                
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Maaf</strong> Data yang anda inputkan bermasalah.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                    
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama Domain:</strong>
                                    <input type="text" name="nama_domain" class="form-control" placeholder="Nama">
                                    {{-- @foreach ($domain as $d) --}}
                                        {{-- <input type="text" name="user_id" class="form-control" value="{{ $domain }}" placeholder="{{ $domain }}"> --}}
                                    {{-- @endforeach --}}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    
                    </form>
                </div>
                
                
            </div>
        </div>
    </div>
</div>
@endsection