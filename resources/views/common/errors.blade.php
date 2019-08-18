<!-- resources/views/common/errors.blade.php -->

@if (count($errors) > 0)
  <!-- Список ошибок формы -->
  <div class="alert alert-danger mt-3">
    <h5>{{__('Some_errors_title')}}</h5>
    <ul class="list-group">
      @foreach ($errors->all() as $error)
        <li class="list-group-item">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif