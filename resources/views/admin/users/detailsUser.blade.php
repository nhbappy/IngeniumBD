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
                
                <center>
                	<h1>Details User</h1>
	                <hr />
	                <table>
	                	<tr>
	                		<th><lable><font size="4">ID</font></lable></th>
	                		<td>: &nbsp;<font size="4">{{ $data->id}}</font></td>
	                	</tr>
	                	<tr>
	                		<th><lable><font size="4">Name</font></lable></th>
	                		<td>: &nbsp;<font size="4">{{ $data->name}}</font></td>
	                	</tr>
	                	<tr>
	                		<th><lable><font size="4">Role</font></lable></th>
	                		<td>: &nbsp;<font size="4">{{ $data->role}}</font></td>
	                	</tr>
	                	<tr>
	                		<th><lable><font size="4">Email</font></lable></th>
	                		<td>: &nbsp;<font size="4">{{ $data->email}}</font></td>
	                	</tr>
	                	<tr>
	                		<th><lable><font size="4">Password</font></lable></th>
	                		<td>: &nbsp;<font size="4">{{ $data->password}}</font></td>
	                	</tr>
	                	<tr>
	                		<th><lable><font size="4">Created at</font></lable></th>
	                		<td>: &nbsp;<font size="4">{{ $data->created_at}}</font></td>
	                	</tr>
	                	<tr>
	                		<th><lable><font size="4">Updated at</font></lable></th>
	                		<td>: &nbsp;<font size="4">{{ $data->updated_at}}</font></td>
	                	</tr>
	                </table>
                </center>

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