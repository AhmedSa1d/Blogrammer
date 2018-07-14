 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Blogrammer @yield('title') </title> <!-- change this title for every page -->

    <!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon-16x16.png')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/loadingbar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
 <link rel="stylesheet" type="text/css" href="{{asset('css/parsley.css')}}">
 <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">



  @yield('stylesheets')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>