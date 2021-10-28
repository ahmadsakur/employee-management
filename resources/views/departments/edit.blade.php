@extends('layouts.main')
@section('content')
    <div class="container">
      <h4 class="card-title ">Departments</h4>
        <div class="card">
            <div class="card-header">Edit Department</div>
            <div class="card-body">
                <form method="POST" action="{{ route('departments.update', $department->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Department Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name', $department->name) }}" required>
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
                                {{ __('Update Department') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection