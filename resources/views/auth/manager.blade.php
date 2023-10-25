@extends('layouts.master')

@section('content')
    <ul class="nav navbar-nav navbar-left">
        @guest()
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Вход') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('manager') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Имя') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Войти') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endguest
    </ul>

    <ul class="nav navbar-nav navbar-left">
        @auth()

        @endauth
    </ul>
@endsection
