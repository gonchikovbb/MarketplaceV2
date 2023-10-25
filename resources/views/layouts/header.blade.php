<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #9fc5e8;">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="active"><a href="/">Главная страница</a></li>
        </ul>

            @auth
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-success" href="{{ route('orders.showOrders') }}">Заказы</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li class="nav-item">
                    <span class="nav-link">{{ auth()->user()->name }}</span>
                </li>
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('signOut') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Выйти</button>
                    </form>
                </li>
            </ul>

            @endauth
    </div>
</nav>
