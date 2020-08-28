<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> title</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script type='text/javascript'>
        window.Laravel = <?php echo json_encode([
                                'csrfToken' => csrf_token(),
                            ]); ?>
    </script>
</head>

<body>
    aaaaa
    <div id="app">
        <router-view></router-view>
    </div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>

</html>