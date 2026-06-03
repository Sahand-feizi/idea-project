<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idea</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-foreground">
    <x-layout.nav />
    <div class="container xl:max-w-6xl mx-auto py-8">
        {{ $slot }}
    </div>

    @session('success')
        <div
            x-data="{show: true}" 
            x-show="show" 
            x-init="setTimeout(() => show = false , 3000)"
            x-transition.opacity.duration.300ms 
            class="absolute right-5 bottom-5 py-2 px-4 rounded-xl bg-primary"
        >
            {{ $value }}
        </div>
    @endsession
</body>

</html>