@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Domain') }}</div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- <a class="btn btn-success mb-3" href="{{ route('domain.create') }}"> Input Data</a> --}}
                    <a class="btn btn-primary mb-3" href="{{ route('domain.create') }}" role="button">Tambah Data</a>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">no</th>
                            <th scope="col">Nama Domain</th>
                            <th scope="col">Tgl dibuat</th>
                            <th scope="col">User Id</th>
                            <th scope="col">aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($domain as $bio )
                            <tr>
                                <td>{{ $bio->id }}</td>
                                <td>{{ $bio->nama_domain }}</td>
                                <td>{{ $bio->created_at }}</td>
                                <td>{{ $bio->user_id }}</td>
                                <td>
                                    <form action="{{ route('domain.destroy',$bio->id) }}" method="POST">
                                    <a class="btn btn-info mb-3" href="{{ route('domain.show',$bio->id) }}">Tampil</a>
                                    <a class="btn btn-warning mb-3" href="{{ route('domain.edit',$bio->id) }}" role="button">Edit</a>
                                    {{-- <button type="button" class="btn btn-danger">Hapus</button>
                                    <button type="button" class="btn btn-warning">Edit</button> --}}
                                    @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger mb-3">Hapus</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection