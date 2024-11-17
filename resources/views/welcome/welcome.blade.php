<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Danz</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body style="height:7000px">
    <!-- navbar -->
    @include('components.navbar')
    <!-- end navbar -->
    @include('components.jumbotron')
    @include('components.facilites')
    <!-- javascript -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const navbar = document.getElementById('navbar');
        menuToggle.addEventListener('click', () => {
            navbar.classList.toggle('hidden');
        });
    </script>
    <!-- end javascript -->
</body>
</html>