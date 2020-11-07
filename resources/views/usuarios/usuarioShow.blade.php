@extends('usuarios.usuariosTheme')

@section('content')
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Información de empleado</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/usuarios">Listado de empleados</a></li>
              <li class="breadcrumb-item active">Información de empleado</li>
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
              <div class="card-header border-0">
                <h3 class="card-title">Datos personales</h3>
                <div class="card-tools">
                                  
                  <a href="{{route('usuarios.edit', [$usuario->id])}}" style="color: var(--blue);" class="btn btn-tool btn-sm">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">

              	<div class="card-body row justify-content-center align-items-center">
                  <img class="img-circle elevation-1" style="height: 250px; width: 250px;" src="{{asset('dist/img/user2-160x160.jpg')}}" alt="User Image">
				</div>

                @if($usuario->administrador==1)                       
                <div class="card-body row justify-content-center align-items-center">
                  <button style="width: 130px;" type="button" class="btn btn-block btn-primary" disabled="">Administrador</button>
                </div>
                @endif 

                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nombre" value="{{$usuario->nombre}}" disabled="">
                    </div>
                 </div>

                 <div class="form-group row">
                    <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="apellido" value="{{$usuario->apellido}}" disabled="">
                    </div>
                 </div>

                <div class="form-group row">
                    <label for="registro" class="col-sm-2 col-form-label">Registro</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="registro" value="{{$usuario->registro}}" disabled="">
                    </div>
                 </div>

                 <div class="form-group row">
                    <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="correo" value="{{$usuario->correo}}" disabled="">
                    </div>
                 </div>

                <form action="{{route('usuarios.destroy', [$usuario])}}" method="POST">
					@method('DELETE')
					@csrf
					<button type="submit" class="btn btn-block btn-danger">Borrar</button>
					
				  </form>
              </div>
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