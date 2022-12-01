<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E-Voting System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
       @yield('css')

    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        @yield('content')
        @yield('js')
    </body>
</html>
