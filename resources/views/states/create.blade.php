@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add State') }}
                        <a href="{{ route('states.index') }}" class="float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('states.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="country_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>
                                <div class="col-md-6">
                                  <select name="country_id" class="form-select form-control" aria-label="Default select example" required>
                                    <option selected value="null">Select Country</option>
                                    @foreach ($countries as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                  </select>
                                    @error('country_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('State Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                      <i class="fas fa-plus-square"></i>
                                        {{ __('Add State') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
