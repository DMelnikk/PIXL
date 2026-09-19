<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="color-scheme" content="dark">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>PIXL</title>
</head>
<body class="bg-pixl-dark text-pixl-light flex gap-8 xl:gap-16 px-4 sm:h-dvh sm:overflow-clip">
    {{$slot}}
</body>
</html>

