@extends('layouts.main')
@section('content')
    <div class="container">
        <h4 class="card-title ">States Data Management</h4>
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
                        <form method="GET" action="{{ route('states.index') }}">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="keyword" placeholder="Search" class="form-control mb-2" id="inlineFormInput">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('states.create') }}" class="btn btn-success">
                            <span><i class="fas fa-plus"></i></span>
                            Create</a>
                    </div>
                </div>
                

            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Country Code</th>
                            <th scope="col">States Name</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $states as $item )
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->country->country_code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <div class="justify-content-center">
                                    <a href="{{ route('states.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning float-left mr-2">Edit</a>
                                    <form method="POST" action="{{ route('states.destroy', $item->id) }}">
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
