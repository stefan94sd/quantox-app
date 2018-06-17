@extends("layouts.layout")
@section("content")
    <body>
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                    <div id="failDiv" class="sufee-alert alert with-close alert-danger alert-dismissible fade show" style="display: none;">
                        <span class="badge badge-pill badge-danger">Fail</span>
                        <div id="failMessages">

                        </div>
                    </div>
                    <div id="successDiv" class="sufee-alert alert with-close alert-success alert-dismissible fade show" style="display: none;">
                        <span class="badge badge-pill badge-success">Success</span>
                        <div id="successMessages">

                        </div>
                    </div>
                    <form>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Faith</label>
                            <input type="text" id="faith" class="form-control" placeholder="Faith">
                        </div>
                        <button id="loginBtn" type="button" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script>
        $(document).ready(function(){
            var name;
            var faith;

            $("#name, #faith").on("keypress",function(e) {
                if(e.which == 13){
                    $("#loginBtn").trigger("click");
                }
            });

            function loginUser(){
                name = $("#name").val();
                faith = $("#faith").val();

                $.ajax({
                    url: "{{url("/loginGodAjax")}}",
                    data:{
                        name: name,
                        faith: faith,
                    },
                    success: function(data){
                        if(data.status == "{{config('constants.OK')}}"){
                            $("#failDiv").hide();

                            window.location = "{{url("/home")}}";
                        }else{
                            $("#successDiv").hide();
                            var errorMessagesDiv = $("#failMessages");
                            errorMessagesDiv.empty();
                            $.each(data.message, function(key, value){
                                errorMessagesDiv.append(value+"<br>");
                            });
                            $("#failDiv").show();
                        }
                        $("html, body").animate({ scrollTop: 0 }, "fast");
                    },
                    fail: function (data) {
                        console.log(data);
                    },
                    complete: function (data) {

                    }
                });
            }

            $("#loginBtn").on("click", function(){
                loginUser();
            });
        });
    </script>
@endsection