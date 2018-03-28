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
                    <table class="table table-hover table-bordered">
					    <tr>
					        <th>Name</th>
					        <th>Role</th>
					        <th>Email</th>
					        <th>Details</th>
					        <th>Edit</th>
					        <th>Delete</th>
					    </tr>
					    <tbody id="myTable">
					        @foreach ($users as $user)
					            <tr>
					                <td>
					                    {{ $user->name }}
					                </td>
					                <td>
					                    {{ $user->role }}
					                </td>
					                <td>
					                    {{ $user->email }}
					                </td>
					                <td>
					                    <a href="/admin/user/details/{{ $user->id }}">Details</a>
					                </td>
					                <td>
					                    <a href="/admin/user/edit/{{ $user->id }}">Edit</a>
					                </td>
					                <td>
					                    <a href="/admin/user/delete/{{ $user->id }}">Delete</a>
					                </td>
					            </tr>
					        @endforeach
					    </tbody>
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