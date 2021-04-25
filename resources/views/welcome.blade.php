<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @livewireStyles
    <link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/sweetalert/sweetalert2.min.css')}}">
    <title>Sweetalert with Alpine inside a Livewire component</title>
</head>
<body>
<div class="container">
    <h1>User List</h1>
    <livewire:user-list />
</div>


@livewireScripts
<script src="{{asset('js/alpine/alpine.min.js')}}" defer></script>
<script src="{{asset('js/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
@stack('scripts')
</body>
</html>
