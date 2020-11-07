@extends('usuarios.usuariosTheme')

@section('content')
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          	@if(isset($usuario))
			  <h1 class="m-0 text-dark">Actualizar usuario</h1>
			@else
			  <h1 class="m-0 text-dark">Crear nuevo usuario</h1>				
			@endif            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @if(isset($usuario))
			    <li class="breadcrumb-item"><a href="/usuarios">Listado de empleados</a></li>
			    <li class="breadcrumb-item"><a href="/usuarios/{{$usuario->id}}">Información de empleado</a></li>
                <li class="breadcrumb-item active">Actualizar usuario</li>
			  @else			    
			  	<li class="breadcrumb-item"><a href="/usuarios">Listado de empleados</a></li>
                <li class="breadcrumb-item active">Crear nuevo usuario</li>				
			  @endif              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Usuario</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              @if ($errors->any())
			    <div class="alert alert-danger">
			      <ul>
			          @foreach ($errors->all() as $error)
			            <li>{{ $error }}</li>
			          @endforeach
			      </ul>
			    </div>
			  @endif

              @if(isset($usuario))
				<form role="form" action="{{route('usuarios.update', [$usuario])}}" method="POST">
				@method('patch')
			  @else
				<form role="form" action="{{route('usuarios.store')}}" method="POST">
			  @endif
              
                <div class="card-body">
                  <div class="form-group">
                    @csrf
                  </div>
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su(s) nombre(s)" value="{{old('nombre') ?? $usuario->nombre ?? ''}}">                    
                  </div>
                  <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su(s) apellido(s)" value="{{old('apellido') ?? $usuario->apellido ?? ''}}">
                  </div>
                  <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese correo" value="{{old('correo') ?? $usuario->correo ?? ''}}">
                  </div>

                  @if(isset($usuario))
					
				  @else
					<div class="form-group custom-control custom-checkbox">                    
	                  <input class="form-control  custom-control-input" type="checkbox" id="administrador" name="administrador" value="1">
	                  <label for="administrador" class="custom-control-label">Administrador</label>                    
	                 </div>
				  @endif
                  
                  

                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->          

          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
@endsection