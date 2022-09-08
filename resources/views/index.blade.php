<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LarikAndVue</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

<div id="app">
    <div class="container">
        <v-header></v-header>
        <router-view></router-view>
    </div>
</div>


<script src=" {{ asset('assets/js/bootstrap.min.js') }} "></script>
<script src="./js/app.js"></script>
</body>
</html>
