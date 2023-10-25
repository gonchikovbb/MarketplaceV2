<!-- Просмотр задачи -->
<div class="modal fade" id="exampleModal{{ $order->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Заказы</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Номер заказа:</strong> {{ $order->id }}</p>
                <p><strong>Имя клиента:</strong> {{ $order->customer }}</p>
                <p><strong>Телефон клиента:</strong> {{ $order->phone }}</p>
                <p><strong>Создана:</strong> {{ $order->created_at }}</p>
                <p><strong>Обновлена:</strong> {{ $order->updated_at }}</p>
                <p><strong>Менеджер:</strong>
                    @foreach($users as $user)
                        @if($order->user_id === $user->id)
                            {{ $user->name  }}
                        @endif
                    @endforeach
                </p>
                <p><strong>Тип заказа:</strong> {{ $order->type }}</p>
                <p><strong>Статус:</strong> {{ $order->status }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
