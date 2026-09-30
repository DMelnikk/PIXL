<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="color-scheme" content="dark">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <x-inertia::head />
    <title>PIXL</title>
{{--    <title>{{$title}}</title>--}}
</head>
<body>

<x-inertia::app />

</body>
</html>

