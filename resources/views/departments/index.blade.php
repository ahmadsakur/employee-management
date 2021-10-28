@extends('layouts.main')
@section('content')
    <div class="container">
        <h4 class="card-title ">Department Data Management</h4>
        <div class="card">
            <div class="card-header">Add Department</div>
            <div class="card-body">
                <form method="POST" action="{{ route('departments.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Department Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                required autocomplete="new-name">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add Department') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
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
                <div class="row">
                    <div class="col">
                        <form method="GET" action="{{ route('departments.index') }}" class="float float-right">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="keyword" placeholder="Search" class="form-control mb-2"
                                        id="inlineFormInput">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Department Name</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $departments as $key => $item )
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="justify-content-center">
                                        <a href="{{ route('departments.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning float-left mr-2">Edit</a>
                                        <form method="POST" action="{{ route('departments.destroy', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center"> Data not found </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
