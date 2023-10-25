<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Marketplace')</title>

    <!-- подключение библиотек -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <!-- Кнопка создать заказ -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <!-- CSS-файлы Bootstrap 4 -->
    <link rel="stylesheet" href="/path/to/bootstrap.min.css">

</head>
<body style="background-color: #f3f6f4;">
{{View::make('layouts.header')}}
@yield('content')
{{View::make('layouts.footer')}}

</body>

<style>
    .container{
        margin: 30px;
    }
    .col-sm-6{
        width: 350px;
        min-height: 150px;
        box-shadow: 1px 2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column; /* Размещаем элементы в колонку */
        border-radius: 4px;
        transition: 0.2s;
        position: relative;
    }
    /* При наведении на карточку - меняем цвет тени */
    .col-sm-6:hover {
        box-shadow: 4px 8px 16px rgba(255, 102, 51, 0.2);
    }
    .col-sm-6__top {
        flex: 0 0 220px; /* Задаем высоту 220px, запрещаем расширение и сужение по высоте */
        position: relative;
        overflow: hidden; /* Скрываем, что выходит за пределы */
    }
    .col-sm-6__bottom {
        display: flex;
        flex-direction: column;
        flex: 1 0 auto; /* Занимаем всю оставшуюся высоту карточки */
        padding: 10px;
    }
</style>
</html>
