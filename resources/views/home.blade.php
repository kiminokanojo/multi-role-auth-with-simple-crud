@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary mb-3" href="#" role="button">Tambah Data</a>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">nama domain</th>
                            <th scope="col">aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($domain as $d )
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->nama_domain }}</td>
                                <td>
                                    <a class="btn btn-danger mb-3" href="#" role="button">Hapus</a>
                                    <a class="btn btn-warning mb-3" href="#" role="button">Edit</a>
                                    {{-- <button type="button" class="btn btn-danger">Hapus</button>
                                    <button type="button" class="btn btn-warning">Edit</button> --}}
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
