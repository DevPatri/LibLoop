<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap');
        @import url(https://fonts.bunny.net/css?family=abril-fatface:400);

        * {
            {{--  font-family: 'Merriweather', serif;  --}}
            font-family: 'Merriweather', display;
            font-weight: 400;
            text-align: center;
            box-sizing: border-box;
        }

        body {
            max-width: 1200px;
            padding: 0;
            margin: 0 auto;
        }

        @media (max-width: 1200px) {
            body {
                margin: 0 50px;
            }
        }
    </style>
</head>
<body>
    @include('layouts.partials.navbar')
    @yield('content')
</body>

</html>
