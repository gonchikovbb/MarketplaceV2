@extends('layouts.master')
@section('content')

    <div class="container" id="orderlist" >
        <form class="row g-3"  action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('POST')

            <div class="col-auto">
                <label for="customer" class="visually-hidden">Имя клиента</label>
                <input type="text" class="form-control" id="customer" placeholder="Имя клиента">
            </div>

            <div class="col-auto">
                <label for="phone" class="visually-hidden">Телефон клиента</label>
                <input type="text" class="form-control" id="phone" placeholder="Телефон клиента">
            </div>

            <div class="col-auto">
                <label for="type" class="visually-hidden">Выберите тип</label>
                <select class="form-control" id="type" name="type" required>
                    <option
                        value="Выберите тип" {{ old('type') == 'Выберите тип' ? 'selected' : '' }}>Выберите тип
                    </option>
                    <option value="online" {{ old('type') == 'online' ? 'selected' : '' }}>online
                    </option>
                    <option value="offline" {{ old('type') == 'offline' ? 'selected' : '' }}>offline
                    </option>
                </select>
            </div>

            <div class="col-auto">
                <label for="status" class="visually-hidden">Статус</label>
                <select class="form-control" id="status" name="status" required>
                    <option
                        value="Выберите статус" {{ old('status') == 'Выберите статус' ? 'selected' : '' }}>Выберите
                        статус
                    </option>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>active
                    </option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>completed
                    </option>
                    <option value="canceled" {{ old('status') == 'canceled' ? 'selected' : '' }}>canceled
                    </option>
                </select>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($products as $item)
                    <div class="col-sm-6">
                        <div class="card text-center" style="width: 22rem;">
                            <div class="card-body">
                                <input type="hidden" name="product_id" value={{$item['id']}}>
                                <div class="input-group">
                                    <span class="input-group-text">{{$item['name']}}</span>
                                    <span class="input-group-text">{{$item['price']}}</span>
                                    <span class="input-group-text">₽</span>
                                </div>

                                <div class="form-outline" style="width: 5rem;">
                                    <label class="form-label" for="discount">Скидка,%</label>
                                    <input min="0" max="100" type="number" id="discount" class="form-control" />
                                </div>

                                <div class="form-outline" style="width: 5rem;">
                                    <label class="form-label" for="count">Количество,шт</label>
                                        <input min="0" max={{$item->stock}} type="number" id="count" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="modal-footer">
                <a class="btn btn-secondary" href="{{ route('orders.showOrders') }}">Отмена</a>
                <button type="submit" class="btn btn-primary" id="createOrderSubmitBtn">Создать задачу</button>
            </div>
        </form>
    </div>

    <!-- подключаю js Кнопку добавить товары  -->
    <script src="{{ asset('js/modal.js') }}"></script>
@endsection

