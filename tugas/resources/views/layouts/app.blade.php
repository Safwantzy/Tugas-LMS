<!DOCTYPE html>
<html lang="en">

<head>
    <title>LMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @include('layouts.navigation')


    <main>
        {{ $slot }}
    </main>


</body>

</html>