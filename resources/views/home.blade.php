@extends('layouts.master')
@section("content")
        <p align="center">Добро пожаловать</p>
        <div class="form-row">
            <div class="col-12">
                <a class="btn btn-success" href="{{ route('guestProducts') }}">Список товаров</a>
            </div>
        </div>

@endsection
