<!-- Изменения задачи -->
<div class="modal fade" id="editOrderModal{{ $order->id }}" tabindex="-1" role="dialog"
     aria-labelledby="editOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editOrderModalLabel">Изменение заказа "{{ $order->id }}"</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('orders.update', $order->id) }}" method="POST" id="editOrderForm"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="form-group">
                        <label for="customer" class="col-form-label">Имя клиента:</label>
                        <input type="text" class="form-control" id="customer" name="customer" value="{{ $order->customer }}"required>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-form-label">Телефон клиента:</label>
                        <textarea class="form-control" id="phone" name="phone" rows="3"
                                  required>{{ $order->phone }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-form-label">Тип заказа:</label>
                        <select class="form-control" id="status" name="type" required>
                            <option value="online" {{ $order->type == 'online' ? 'selected' : '' }}>online
                            </option>
                            <option value="offline" {{ $order->type == 'offline' ? 'selected' : '' }}>offline
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-form-label">Статус:</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="active" {{ $order->status == 'active' ? 'selected' : '' }}>active
                            </option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>completed
                            </option>
                            <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>canceled
                            </option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
