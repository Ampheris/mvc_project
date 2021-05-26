<html lang="en" class="h-100">
<head>
    <title>App Name - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset("css/style.css")}}">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body class="d-flex h-100 text-center text-white bg-dark">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <h3 class="float-md-start mb-0">MVC Project</h3>
            <nav class="navbar navbar-expand-lg bg-dark nav-masthead justify-content-center float-md-end">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= url("/") ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url("/diceGame") ?>">Dice 21 </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url("/highscore") ?>">Highscore </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url("/books") ?>">Books </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= url("/session") ?>">Restart session </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="px-3">
        @yield('content')
    </main>

    <footer class="mt-auto text-white-50">
        <p>© Copyright 2020, Mathilda Holmström</p>
    </footer>
</div>
</body>
</html>
