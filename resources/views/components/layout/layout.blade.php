<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idea</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-background text-foreground">
    <x-layout.nav />
    <div class="max-w-6xl mx-auto py-8">
        {{ $slot }}
    </div>
</body>

</html>