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
                        <li><a href="">List Humans</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <table id="humans" class="table table-striped table-bordered dataTable" style="width:1000px">
                        <thead>
                        <tr>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Faith</td>
                            <td>Gender</td>
                            <td>Age</td>
                            <td>Nationality</td>
                            <td>Body Type</td>
                            <td>Skin Color</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            var table = $('#humans').DataTable({
                ordering: true,
                searching: true,
                autoWith: true,
                "scrollY":"50vh",
                "scrollX": true,
                "scrollCollapse": true,
                paging: true,
                fixedColumns: true,
                "iDisplayLength": 10,
                "pagingType": "full_numbers",
                ajax: {
                    "url": "{{url("listFollowersAjax")}}",
                    "type": "GET",
                    "dataSrc": "result"
                },
                columns:[
                    {
                        data: "first_name",
                        width: 100,
                        searchable: true,
                        sortable: true
                    },
                    {
                        data: "last_name",
                        width: 100,
                        searchable: true,
                        sortable: true
                    },
                    {
                        data: "faith",
                        width: 100,
                        searchable: true,
                        sortable: true
                    },
                    {
                        data: "gender",
                        width: 100,
                        searchable: true,
                        sortable: true
                    },
                    {
                        data: "age",
                        width: 100,
                        searchable: true,
                        sortable: true
                    },
                    {
                        data: "nationality",
                        width: 100,
                        searchable: true,
                        sortable: true
                    },
                    {
                        data: "body_type",
                        width: 100,
                        searchable: true,
                        sortable: true
                    },
                    {
                        data: "skin_color",
                        width: 100,
                        searchable: true,
                        sortable: true
                    },
                    {
                        data: function(row){
                            var id = row.id;
                            return '<button class="btn btn-danger btn-sm" onclick="endLife('+ id +')"><span class="fa fa-close">&nbsp;</span>End Life</button>';
                        },
                        width: 100,
                        searchable: false,
                        sortable: false
                    }
                ]
            });
            window.endLife = function(id){
                $.ajax({
                    url: "{{url("/endLifeAjax")}}",
                    data:{
                        id: id,
                    },
                    success: function(data){
                        table.ajax.reload();
                    },
                    fail: function (data) {
                        table.ajax.reload();
                    },
                    complete: function (data) {
                    }
                });
            };
        });
    </script>
@endsection