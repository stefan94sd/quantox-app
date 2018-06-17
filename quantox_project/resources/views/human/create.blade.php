@extends("layouts.left-sidebar-menu")
@section("content")
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="">Create Humans</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Create</strong> Human
                        </div>
                        <div class="card-body card-block">
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
                            <form id="createHumanForm" class="form-horizontal">

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="faith" class=" form-control-label">Faith</label>
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <select name="faith" id="faith" class="form-control">
                                            <option value="{{config("constants.CHRISTIANITY")}}">{{config("constants.CHRISTIANITY")}}</option>
                                            <option value="{{config("constants.ISLAM")}}">{{config("constants.ISLAM")}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="first_name" class=" form-control-label">First Name</label>
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="last_name" class=" form-control-label">Last Name</label>
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="gender" class=" form-control-label">Gender</label>
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="{{config("constants.MALE")}}">{{config("constants.MALE")}}</option>
                                            <option value="{{config("constants.FEMALE")}}">{{config("constants.FEMALE")}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="age" class=" form-control-label">Age</label>
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <input type="number" id="age" name="age" placeholder="Age" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="skin_color" class=" form-control-label">Skin Color</label>
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <select name="skin_color" id="skin_color" class="form-control">
                                            <option value="{{config("constants.BLACK")}}">{{config("constants.BLACK")}}</option>
                                            <option value="{{config("constants.WHITE")}}">{{config("constants.WHITE")}}</option>
                                            <option value="{{config("constants.YELLOW")}}">{{config("constants.YELLOW")}}</option>
                                            <option value="{{config("constants.PURPLE")}}">{{config("constants.PURPLE")}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="nationality" class=" form-control-label">Nationality</label>
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <input type="text" id="nationality" name="nationality" placeholder="Nationality" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="body_type" class=" form-control-label">Body Type</label>
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <select name="body_type" id="body_type" class="form-control">
                                            <option value="{{config("constants.MESOMORPH")}}">{{config("constants.MESOMORPH")}}</option>
                                            <option value="{{config("constants.ECTOMORPH")}}">{{config("constants.ECTOMORPH")}}</option>
                                            <option value="{{config("constants.ENDOMORPH")}}">{{config("constants.ENDOMORPH")}}</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button id="create" type="button" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Create
                            </button>
                            <button id="reset" type="button" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            var gender;
            var age;
            var body_type;
            var nationality;
            var skin_color;
            var first_name;
            var last_name;
            var faith;

            $("#reset").on("click", function(){
                $('#createHumanForm').find('input, select, textarea').not("#faith,#body_type,#skin_color,#gender").val('');
            });

            $("#create").on("click", function(){
                createHuman();
            });
            $("#age, #nationality, #first_name, #last_name").on("keypress",function(e) {
                if(e.which == 13){
                    $("#create").trigger("click");
                }
            });

            function createHuman(){
                gender = $("#gender").val();
                age = $("#age").val();
                body_type = $("#body_type").val();
                nationality = $("#nationality").val();
                skin_color = $("#skin_color").val();
                first_name = $("#first_name").val();
                last_name = $("#last_name").val();
                faith = $("#faith").val();

                $.ajax({
                    url: "{{url("/crateHumanAjax")}}",
                    data:{
                        gender: gender,
                        age: age,
                        body_type: body_type,
                        nationality: nationality,
                        skin_color: skin_color,
                        first_name: first_name,
                        last_name: last_name,
                        faith: faith
                    },
                    success: function(data){
                        if(data.status == "{{config('constants.OK')}}"){
                            $("#failDiv").hide();
                            var successMessagesDiv = $("#successMessages");
                            successMessagesDiv.empty();
                            successMessagesDiv.append(data.message+"<br>");
                            $("#successDiv").show();
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
            function setDefaults(){
                var god = "{{session("id")}}";

                if(god == "{{config('constants.ALAH')}}"){
                    $("#faith").val("{{config('constants.ISLAM')}}");
                    $( "#faith" ).prop( "disabled", true );
                }else if(god == "{{config('constants.CHRIST')}}"){
                    $("#faith").val("{{config('constants.CHRISTIANITY')}}");
                    $( "#faith" ).prop( "disabled", true );
                }
            };
            setDefaults();
        });
    </script>
@endsection