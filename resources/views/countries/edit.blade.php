@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Edit Country') }}
                        <a href="{{ route('countries.index') }}" class="float-right">Back</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('countries.update', $country->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                              <label for="country_code"
                                  class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>
                              <div class="col-md-6">
                                  <input id="country_code" type="text"
                                      class="form-control @error('country_code') is-invalid @enderror" name="country_code"
                                      value="{{ old('country_code', $country->country_code) }}" required autofocus>
                                  @error('country_code')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="name"
                                  class="col-md-4 col-form-label text-md-right">{{ __('Country Name') }}</label>
                              <div class="col-md-6">
                                  <input id="name" type="text"
                                      class="form-control @error('name') is-invalid @enderror" name="name"
                                      value="{{ old('name', $country->name) }}" required autofocus>
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
                                        {{ __('Update Country') }}
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
