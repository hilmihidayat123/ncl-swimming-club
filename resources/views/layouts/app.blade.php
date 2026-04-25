 

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>NCL Swimming Club</title>

    <!-- Google Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Navbar -->
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">


   
    {{-- CSS tambahan per halaman --}}
    @stack('css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

   {{-- NAVBAR --}}
    @include('partials.navbar')
    {{-- CONTENT --}}
    @yield('content')

    

    

    

</body>

</html>
