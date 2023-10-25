@extends('layouts.master')
@section('content')

    <div class="container" id="orderlist">

        @if ($orders->count())
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th style="vertical-align: middle;">Номер заказа:</th>
                    <th style="vertical-align: middle;">Имя клиента:</th>
                    <th style="vertical-align: middle;">Телефон клиента:</th>
                    <th style="vertical-align: middle;">Создана:</th>
                    <th style="vertical-align: middle;">Обновлена:</th>
                    <th style="vertical-align: middle;">Менеджер:</th>
                    <th style="width:10%; text-align: center;">Тип заказа</th>
                    <th style="width:10%; text-align: center;">Статус</th>
                    <th colspan="3" style="text-align: center;"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr class="order-row">

                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->updated_at }}</td>
                        <td>
                            @foreach($users as $user)
                                @if($order->user_id === $user->id)
                                    {{ $user->name  }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $order->type }}</td>
                        <td>{{ $order->status }}</td>

                        <!-- кнопка для просмотра заказа -->
                        <td style="text-align: center; vertical-align: middle;">
                            <button type="button" class="btn btn-outline-info btn-view-order mr-2" data-toggle="modal"
                                    data-target="#exampleModal{{ $order->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                            </button>
                        </td>
                        @include('orders.showOrder', ['orders' => $order])

                        <!-- кнопка для изменения заказа -->
                        <td style="text-align: center; vertical-align: middle;">
                            <button type="button" class="btn btn-outline-warning btn-edit-order" data-toggle="modal"
                                    data-target="#editOrderModal{{ $order->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </button>
                        </td>
                        @include('orders.editOrder', ['order' => $order])

                        <!-- кнопка для удаления заказа -->
                        <td style="text-align: center; vertical-align: middle;">
                            <form action="{{ route('orders.delete', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger " style="display: block;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <!-- Пагинация -->
            @if ($orders->lastPage() > 1)
                <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                    <!-- Pagination Code  -->
                    <div class="pagination-container">
                        {{ $orders->links() }}
                    </div>
                </nav>
            @endif

        @else
            <div class="text-center my-5">
                <h1>Заказы отсутствуют</h1>
            </div>
        @endif

        <!-- кнопка создания задачи -->
        <a class="btn btn-success" href="{{ route('orders.add') }}">Создать заказ</a>


@endsection




