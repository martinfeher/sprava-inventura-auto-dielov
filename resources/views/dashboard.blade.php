<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Správa Inventúra auto dielov</title>
    <!-- import bootstrap CSS -->
    <link href="{{ asset('css/bootstrap@5.02/bootstrap.min.css') }}" rel="stylesheet">
    <!-- import application CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- import font-awesome CSS from CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
<body>
    <div id="app">
        <router-view />
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>