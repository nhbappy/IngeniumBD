<html>
	<head><title>Upload</title></head>
	<body>
		<form enctype="multipart/form-data" method="post" action="{{ url('/upload') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			
			<input type="file" name="file" />
			<input type="submit" />
		</form>
	</body>
</html>