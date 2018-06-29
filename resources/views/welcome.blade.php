<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PVJ Vue Js</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script>
        function asset() {
            return "{{ asset('') }}";
        }
        function appName() {
            return "{{ config('app.name') }}";
        }
        function baseUrl() {
            return "{{ url('/') }}";
        }
        function apiUrl() {
            return "{{ url('/api/') }}";
        }
        function currentUrl() {
            return "{{ url()->current() }}";
        }
    </script>
</head>
<body>
<div id="app"></div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
