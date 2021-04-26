<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Sweetalert with Alpine inside a Livewire component</title>
</head>
<body>
<div class="container">
    <h1>User List</h1>
    <livewire:user-list />
</div>


@livewireScripts
<script src="{{ mix('js/app.js') }}" defer></script>
@stack('scripts')
</body>
</html>
