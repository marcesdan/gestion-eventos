@if (! $errors->isEmpty())
<div class="alert alert-danger">
  <p>Oops! Arreglá el siguiente error!</p>

  @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach

</div>
@endif
