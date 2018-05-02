<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link href="{{ mix(Spark::usesRightToLeftTheme() ? 'css/app-rtl.css' : 'css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @yield('scripts', '')

    <!-- Global Spark Object -->
    <script>
        window.Spark = <?php 
            
            /* Default Phone Info */
            $phone_info = [ "completed" => false, "company" => null, "number" => null ];
            
            /* Check if user has phone */
            if(Auth::user() && !is_null(Auth::user()->phone()))
                $phone = Auth::user()->phone()->get()->first();
            
            /* Check if phone exists and make sure its not null */
            if(isset($phone) && !is_null($phone))
                $phone_info = ["completed" => $phone->completed, "company" => $phone->company, "number" => $phone->number];
            
            /* store the user phone information in the global spark variable as phone */
            echo json_encode(array_merge(
            Spark::scriptVariables(), [
                "providers" => Config::get('phone.companies'),
                "phone" => $phone_info
            ]
        )); ?>;
    </script>
</head>
<body>
    <div id="spark-app" v-cloak>
        <!-- Navigation -->
        @if (Auth::check())
            @include('spark::nav.user')
        @else
            @include('spark::nav.guest')
        @endif

        <!-- Main Content -->
        <main class="py-4">
            @yield('content')
        </main>

        <!-- Application Level Modals -->
        @if (Auth::check())
            @include('spark::modals.notifications')
            @include('spark::modals.support')
            @include('spark::modals.session-expired')
        @endif
    </div>

    <!-- JavaScript -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="/js/sweetalert.min.js"></script>
</body>
</html>
