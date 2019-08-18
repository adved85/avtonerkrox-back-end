<!-- resources/views/common/success.blade.php -->

@if (session('error')) 
  <div class="alert alert-danger">    
    <ul class="list-group">      
        <li class="list-group-item">{{ session('error')}}</li>      
    </ul>
  </div>
@endif