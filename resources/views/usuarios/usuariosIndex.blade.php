@extends('usuarios.usuariosTheme')

@section('content')

	
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Listado de empleados</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Listado de empleados</li>              
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
                <h3 class="card-title">Empleados</h3>
                <div class="card-tools">
                  <a href="{{action([\App\Http\Controllers\UsuariosController::class, 'create'])}}" class="text-success mr-1 btn btn-tool btn-sm">
                    <i class="fas fa-plus"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Empleado</th>                    
                    <th>Correo</th>
                    <th>Más</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($usuarios as $u)
					<tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      {{$u->nombre}} {{$u->apellido}}
                      @if($u->administrador==1)
                        <small class="badge badge-primary"><i class="fas fa-check"></i> Admin</small>
                      @endif 
                    </td>                    
                    <td>{{$u->correo}}</td>
                    <td>
                      <a href="/usuarios/{{$u->id}}" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
				  @endforeach
                  </tbody>
                </table>
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