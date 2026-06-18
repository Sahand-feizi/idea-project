<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idea</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-foreground">
    <div class="p-5">
        <div class="grid grid-cols-[5rem_1fr] md:grid-cols-[15rem_4fr] gap-6 items-start">
            <x-dashboard.sidebar />
            <div class="bg-card p-4 md:p-8 rounded-lg border-[1.5px] min-h-[calc(100vh-3rem)] border-muted-foreground">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
