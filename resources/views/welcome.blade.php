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
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .material-icons {
            font-family: 'Material Icons';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;  /* Preferred icon size */
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;

            /* Support for all WebKit browsers. */
            -webkit-font-smoothing: antialiased;
            /* Support for Safari and Chrome. */
            text-rendering: optimizeLegibility;

            /* Support for Firefox. */
            -moz-osx-font-smoothing: grayscale;

            /* Support for IE. */
            font-feature-settings: 'liga';
        }
        body, html {
            background: url('/img/spark-bg.png');
            background-repeat: repeat;
            background-size: 300px 200px;
            height: 100%;
            margin: 0;
        }

        .flex-column {
            display: flex;
            flex-direction: column;
        }

        .flex-fill {
            flex: 1;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }


        .text-center {
            text-align: center;
        }

        .links {
            padding: 1em;
            text-align: right;
        }

        .links a {
            text-decoration: none;
        }

        .links button {
            background-color: #3097D1;
            border: 0;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-family: 'Open Sans';
            font-size: 14px;
            font-weight: 600;
            padding: 15px;
            text-transform: uppercase;
            width: 100px;
        }
        a {
            color :#3097D1;
            text-decoration:none;
        }
        .title {
            color: #333;
            font-size:52px;
            font-family: Open Sans Light;
        }
    </style>
</head>
<body>
    <div class="full-height flex-column">
        <nav class="links">
            <a href="/login" style="margin-right: 15px;">
                <button>
                    {{__('Login')}}
                </button>
            </a>

            <a href="/register">
                <button>
                    {{__('Register')}}
                </button>
            </a>
        </nav>
        <style>
            .title { color: #808080; }
            .header {
                background-color: #f5f5f5;
                padding: 15px;
                border: 1px solid #d5d5d5;
                border-radius: 4px;
            }
            .steps {
                color: #629f43; 
                font-size:54px; 
            }
            .arrow {
                color: #808080;
            }
            .count-step
            {
                color: #808080;
                border-radius: 100%;
                border: 1px solid #d5d5d5;
                width: 75px;
                height: 75px;
                background-color: #fff;
                margin:auto;
            }
            .step-container
            {
                background-color:#f5f5f5;
                border: 1px solid #d5d5d5;
                padding: 10px;
                margin: 0px 0px 100px 0px;
                border-radius: 4px;
            }
            .step-text
            {
                font-size:16px;
            }
        </style>
        <div class="container header">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center title">ICO Notifier</h1>
                    <p class="text-center">
                        Developed By <a href="https://zaktechtips.com">Zachary Horton</a>
                    </p>
                </div>
            </div>
        </div>
        <img src="/img/ico-cover.jpg">
    </div>
    <div class="container">
        <div class="text-center row">
            <div class="col-md-3 step-container">
                <div class="count-step">
                    <h1>1</h1>
                </div>
                <h2>Set Up Notifiers</h2>
                <i class="material-icons steps">notifications</i>
                <p class="step-text">Set up a notifier in less than a minute! You can set up notifications for email and text!</p>
            </div>
            <div class="col-md-1"><i class="material-icons steps arrow">forward</i></div>
            <div class="col-md-3 step-container">
                <div class="count-step">
                    <h1>2</h1>
                </div>
                <h2>Coin Goes Public</h2>
                <i class="material-icons steps">public</i>
                <p class="step-text">Similar to a stock - once a Cryptocurrency goes public you can invest!</p>
            </div>
            <div class="col-md-1">
                <i class="material-icons steps arrow">forward</i>
            </div>
            <div class="col-md-3 step-container">
                <div class="count-step">
                    <h1>3</h1>
                </div>
                <h2>Get Notified</h2>
                <i class="material-icons steps">phonelink_ring</i>
                <p class="step-text">The ICO Notifier checks the exchanges against your notifiers every 5 minutes!</p>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div>
</body>
</html>
