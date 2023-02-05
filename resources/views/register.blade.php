<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	@livewireStyles
</head>
<body>

	<div class="container">
		<div class="row" style="margin-top: 50px;">
			<div class="col-md-6 offset-md-3">
				<h1>Multi Step Form</h1><hr>
				@livewire('multistep-form')
			</div>
		</div>
	</div>


	@livewireScripts
</body>
</html>