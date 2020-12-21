<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    @include('layouts.navbar')
    <div class="container">
        <br>
        <h1>
            @yield('body-title')
        </h1>
        <br>
        @yield('content')
    </div><br class="mb-5">
    <br class="mb-5">
    <br class="mb-5">
    <br class="mb-5">
    <footer class="footer fixed-bottom mt-auto py-3 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <span class="text-light bg-dark">© School Manager created by Modolo Thomas </span>
                </div>
                <div class="col-4">
                    <span class="text-light">Ynov Toulouse Campus</span>
                </div>
            </div>
        </div>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>