<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Success</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body class="d-flex justify-content-center p-4 pt-4">

	<div class="card">
		<div class="card-header bg-success text-white">Registration Completed!</div>
		<div class="card-body">
			<h2>Hi {{ request()->first_name ?? 'no_name' }}!</h2>
			<p>Thank you for registering with us.</p>
			<a href="{{ route('register') }}">Click here</a> to go back.
		</div>
	</div>

</body>
</html>