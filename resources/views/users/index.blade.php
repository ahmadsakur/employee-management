@extends('layouts.main')
@section('content')
    <div class="container">
        <h4 class="card-title ">User Data Management</h4>
        <div class="card mb-3">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                @endif
                @if (session()->has('validate'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('validate') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif
            </div>
            <div class="card-header">
                <a href="{{ route('users.create') }}" class="btn btn-primary float-right">
                    <span><i class="fas fa-plus"></i></span>
                    Create</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <div class="justify-content-center">
                                        <a href="{{ route('users.edit', $item->id) }}" class="btn btn-sm btn-warning float-left mr-2">Edit</a>
                                        <form method="POST" action="{{ route('users.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
