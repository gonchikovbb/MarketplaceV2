@extends('layouts.master')
@section("content")
    <div class="custom-product">
        <div class="trending-wrapper">
            <h3 align="center">Товары</h3>
            <div class="row">
                @foreach($products as $item)
                    <div class="col-sm-6">
                        <div class="card text-center" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$item['name']}}</h5>
                                <p class="card-text">{{$item['price']}} ₽</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>

    <link rel="stylesheet" href="../css/styleProducts.css" />

@endsection
