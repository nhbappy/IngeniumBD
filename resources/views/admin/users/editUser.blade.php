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
                <h2>Update User</h2>
                <hr />
                <form class="m-t" method="post" action="{{ url('/admin/trytoupdateuser') }}">
                	<input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
                	<div class="form-horizontal">
                		<input type="hidden" value="{{ $data->id}}" id="id" name="id">
				        <div class="form-group">
				        	<div class="col-md-10" align="left"><label>Name</label></div>
				        	<div class="col-md-10">
				            	<input class="form-control" type="text" value="{{ $data->name}}" id="name" name="name" required="" placeholder="Full Name">
				            </div>
				        </div>
				        <div class="form-group">
				        	<div class="col-md-10" align="left"><label>Role</label></div>
				            <div class="col-md-10">
				            	<select class="form-control" id = "role" name = "role">
				            		<option>admin</option>
				            	</select>
				            </div>
				        </div>
				        <div class="form-group">
				        	<div class="col-md-10" align="left"><label>Email</label></div>
				            <div class="col-md-10">
				            	<input class="form-control" type="email" value="{{ $data->email}}" id="email" name="email" required="" placeholder="Email">
				            </div>
				        </div>
				        <div class="form-group">
				        	<div class="col-md-10" align="left"><label>Password</label></div>
				            <div class="col-md-10">
				            	<input class="form-control" type="password" id="password" name="password" required="" placeholder="Password">
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