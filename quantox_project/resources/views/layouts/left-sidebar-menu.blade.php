<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quantox Project</title>
    <meta name="description" content="Quantox Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset("assets/css/normalize.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/themify-icons.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/flag-icon.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/cs-skin-elastic.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/lib/datatable/dataTables.bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/scss/style.css")}}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <script src="{{asset("assets/js/vendor/jquery-2.1.4.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/js/popper.min.js")}}"></script>
    <script src="{{asset("assets/js/plugins.js")}}"></script>

    <script src="{{asset("assets/js/lib/data-table/datatables.min.js")}}"></script>
    <script src="{{asset("assets/js/lib/data-table/dataTables.bootstrap.min.js")}}"></script>
    <script src="{{asset("assets/js/lib/data-table/dataTables.buttons.min.js")}}"></script>
    <script src="{{asset("assets/js/lib/data-table/buttons.bootstrap.min.js")}}"></script>
    <script src="{{asset("assets/js/lib/data-table/jszip.min.js")}}"></script>
    <script src="{{asset("assets/js/lib/data-table/pdfmake.min.js")}}"></script>
    <script src="{{asset("assets/js/lib/data-table/vfs_fonts.js")}}"></script>
    <script src="{{asset("assets/js/lib/data-table/buttons.html5.min.js")}}"></script>
    <script src="{{asset("assets/js/lib/data-table/buttons.print.min.js")}}"></script>
    <script src="{{asset("assets/js/lib/data-table/buttons.colVis.min.js")}}"></script>
    <script src="{{asset("assets/js/lib/data-table/datatables-init.js")}}"></script>
</head>
<body>
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="">Quantox Project</a>
            <a class="navbar-brand hidden" href="">Quantox Project</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a id="logout"> <i class="menu-icon fa fa-sign-out"></i>Logout</a>
                </li>
                <li>
                    <a id="home" href="{{url("home")}}"> <i class="menu-icon fa fa-home"></i>Home</a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Humans</a>
                    <ul class="sub-menu children active dropdown-menu">
                        <li><i class="fa fa-edit"></i><a href="{{url("createHuman")}}">Create</a></li>
                        <li><i class="fa fa-list"></i><a href="{{url("listHumans")}}">List</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<div id="right-panel" class="right-panel">
    @yield("content")
</div><!-- /#right-panel -->
</body>
<script>
    $(document).ready(function(){
        function logoutGod(){
            $.ajax({
                url: "{{url("/logoutGodAjax")}}",
                success: function(data){
                  location.reload();
                },
                fail: function (data) {
                    location.reload();
                },
                complete: function (data) {
                    location.reload();
                }
            });
        }

        $("#logout").on("click", function(){
            logoutGod();
        });
    });
</script>
</html>