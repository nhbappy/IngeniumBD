<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Admin</title>

        @include('layouts.css')
        @include('layouts.js')
    </head>

    <body>
        <div id="wrapper" class="Index">
            @include('layouts.navbar')

            <div id="page-wrapper" class="gray-bg">
                @include('layouts.topnavbar')
                <h2>Update Employee</h2>
                <hr />
                <form class="m-t" method="post" action="{{ url('/admin/trytoupdateemployee') }}" enctype="multipart/form-data">
                	<input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
                	<input type="hidden" value="{{ $data->id}}" id="id" name="id">
                	<div class="form-horizontal">
				        <div class="form-group">
				        	<div class="col-md-10" align="left"><label>Name</label></div>
				        	<div class="col-md-10">
				            	<input class="form-control" type="text" id="name" name="name" value="{{ $data->name }}" required="" placeholder="Full Name">
				            </div>
				        </div>
				        <div class="form-group">
				        	<div class="col-md-10" align="left"><label>Position</label></div>
				        	<div class="col-md-10">
				            	<input class="form-control" type="text" id="position" name="position" value="{{ $data->position }}" required="" placeholder="Position">
				            </div>
				        </div>
				        <div class="form-group">
				        	<div class="col-md-10" align="left"><label>Email</label></div>
				            <div class="col-md-10">
				            	<input class="form-control" type="email" id="email" name="email" value="{{ $data->email }}" required="" placeholder="Email">
				            </div>
				        </div>
				        <div class="form-group">
				        	<div class="col-md-10" align="left"><label>Address</label></div>
				            <div class="col-md-10">
				            	<input class="form-control" type="text" id="address" value="{{ $data->address }}" name="address" required="" placeholder="Address"></input>
				            </div>
				        </div>
				        <div class="form-group">
				        	<div class="col-md-10" align="left"><label>NID Number</label></div>
				            <div class="col-md-10">
				            	<input class="form-control" type="number" id="nid" name="nid" value="{{ $data->nid }}" required="" placeholder="National ID">
				            </div>
				        </div>
				        <div class="form-group">
				        	<div class="col-md-10" align="left"><label>Moto</label></div>
				            <div class="col-md-10">
				            	<input class="form-control" type="textarea" id="moto" name="moto" value="{{ $data->moto }}" required="" placeholder="About"></input>
				            </div>
				        </div>
				        <div class="form-group">
				        	<div class="col-md-10" align="left"><label>Serial</label></div>
				            <div class="col-md-10">
				            	<input class="form-control" type="number" id="serial" name="serial" value="{{ $data->serial }}" required="" placeholder="Serial No">
				            </div>
				        </div>
				        <div class="form-group">
				        	<div class="col-md-10" align="left"><label>Photo</label></div>
				            <div class="col-md-10">
				            	<input type="file" name="photo" required="">
				            </div>
				        </div>
				        <div class="form-group">
				            <div class="col-md-10" align="left">
				                <input type="submit" value="Create" class="btn btn-primary block full-width m-b" />.
				            </div>
				        </div>
				    </div>
                </form>
            </div>
        </div>

        @include('layouts.footer')
    </body>
</html>

<script>
	$(document).ready(function () {
	    $("#myInput").on("keyup", function () {
	        var value = $(this).val().toLowerCase();
	        $("#myTable tr").filter(function () {
	            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	        });
	    });
	});
</script>