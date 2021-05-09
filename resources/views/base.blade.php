<html lang="en">
    <head>
        <title>App Name - @yield('title')</title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" type="text/css" href="{{asset("css/style.css")}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>

    <body>
    <div class="container">
        <div class="row">
            <div class="col">
                <header>
                    <h1>Laravel framework</h1>
                    <nav>
                        <a href="<?= url("/") ?>">Home</a> |
                        <a href="<?= url("/diceGame") ?>">Dice 21</a> |
                        <a href="<?= url("/highscore") ?>">Highscore</a> |
                        <a href="<?= url("/books") ?>">Books</a> |
                        <a href="<?= url("/session") ?>">Restart session</a>
                    </nav>
                </header>

                @yield('content')
            </div>
        </div>
    </div>
    </body>
</html>
