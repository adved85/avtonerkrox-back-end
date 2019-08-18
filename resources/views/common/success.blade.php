<!-- resources/views/common/success.blade.php -->

@if (session('success')) 
  <div class="alert alert-success mt-3">    
    <ul class="list-group">      
        <li class="list-group-item">{{ session('success')}}</li>      
    </ul>
  </div>
@endif