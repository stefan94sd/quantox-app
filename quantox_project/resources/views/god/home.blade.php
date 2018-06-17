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
                        <li><a href="">Home</a></li>
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
                            <strong>God's</strong> Info
                        </div>
                        <div class="card-body card-block">
                            <form id="godsInfoForm" class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label">Name</label>
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <input type="text" id="name" name="name" placeholder="Name" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="faith" class=" form-control-label">Faith</label>
                                    </div>
                                    <div class="col-4 col-md-4">
                                        <input type="text" id="faith" name="faith" placeholder="Faith" class="form-control" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <!--<button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            function display() {
                var name = "{{session("name")}}";
                var faith = "{{session("faith")}}";

                $("#name").val(name);
                $("#faith").val(faith);
            }

            display();
        });
    </script>
@endsection