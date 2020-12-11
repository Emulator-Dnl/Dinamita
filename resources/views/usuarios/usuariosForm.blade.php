@extends('adminLTETheme')

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

              @include('partials.form-error')

              @if(isset($usuario))
                {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->id], 'method' => 'PATCH', 'role' => 'form']) !!}
      				  <!--<form role="form" action="{{route('usuarios.update', [$usuario])}}" method="POST">
      				  @method('patch')-->
      			  @else
                <!--<form role="form" action="{{route('usuarios.store')}}" method="POST">-->
                {!! Form::open(['route' => 'usuarios.store', 'role' => 'form']) !!}
      			  @endif
              
                <div class="card-body">
                  @if(isset($usuario))
                  @else
                  <div class="form-group">
                    <label>Invitado</label>
                    <select class="form-control" name="user_id">
                      @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  @endif

                  <div class="form-group">
                    {!! Form::label('curp', 'CURP') !!}
                    {!! Form::text('curp', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la CURP']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('sucursal_id', 'Sucursal') !!}
                    {!! Form::select('sucursal_id', $sucursals, null, ['class' => 'form-control']); !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('certificado', 'Certificado') !!}
                    {!! Form::text('certificado', null, ['class' => 'form-control', 'placeholder' => 'Ingrese link del certificado']) !!}
                  </div>

                  @if(isset($usuario))					
        				  @else
        					<div class="form-group custom-control custom-checkbox">
                    {!! Form::checkbox('administrador', '1', false, ['class' => 'form-control  custom-control-input', 'id' => 'administrador']) !!}
                    {!! Form::label('administrador', 'Administrador', ['class' => 'custom-control-label']) !!}                  
	                  <!--<input class="form-control  custom-control-input" type="checkbox" id="administrador" name="administrador" value="1">
	                  <label for="administrador" class="custom-control-label">Administrador</label>-->                 
	                </div>
        				  @endif
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}  
                  <!--<button type="submit" class="btn btn-primary">Enviar</button> -->
                </div>
              <!--</form>-->
              {!! Form::close() !!}
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