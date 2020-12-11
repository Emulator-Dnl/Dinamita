@if(session()->has('mensaje'))
<div class="alert {{session('alert-type', 'alert-info')}} alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-info"></i> {{session('mensaje')}}</h5>
  
</div>
@endif