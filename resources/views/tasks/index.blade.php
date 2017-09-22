{{-- <!DOCTYPE html>
<html>
	<head>
		<title>SPA</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="description" content="Demo project">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<style type="{{ asset('sass/app.scss') }}"></style>
	</head>
	<body>

		<div id="app" class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h1>Tasks</h1>
						</div>
					</div>

					@forelse ( $tasks as $task )

						<div class="panel panel-default">
							<div class="panel-body">
								@if ( !empty($task->users->first()['name']) )
									<span class="badge">{{ $task->users->first()['name'] }} task is: </span>
								@else
									<span class="badge">Assign this task to someone</span>
								@endif
								{{ $task->body }}
							</div>
						</div>

					@empty

						<h2>No posts created</h2>

					@endforelse
				</div>
			</div>
		</div>

		<script type="{{ asset('js/app.js') }}"></script>
	</body>
</html> --}}