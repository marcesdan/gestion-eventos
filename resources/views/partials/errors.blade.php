@if (! $errors->isEmpty())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<p>Oops! Han surgido algunos errores...</p>
	@foreach ($errors->all() as $error)
		<li>
			<strong>{{ $error }}</strong>
		</li>
	@endforeach
</div>
@endif