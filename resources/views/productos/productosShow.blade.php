@extends('adminLTETheme')

@section('content')
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Información de producto</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/producto">Listado de productos</a></li>
              <li class="breadcrumb-item active">Información de producto</li>
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
                <h3 class="card-title">Producto</h3>
                <div class="card-tools">
                                  
                  <a href="{{route('producto.edit', [$producto->id])}}" style="color: var(--blue);" class="btn btn-tool btn-sm">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">

              	<div class="card-body row justify-content-center align-items-center">
                  <!--<img class="img-circle elevation-1" style="height: 250px; width: 250px;" src="{{asset('dist/img/user2-160x160.jpg')}}" alt="User Image">-->
                  <img class="img-circle elevation-1" style="height: 250px; width: 250px;" src="{{asset('dist/img/noimage.jpg')}}" alt="User Image">
				        </div>

                @if($producto->receta==1)                       
                <div class="card-body row justify-content-center align-items-center">
                  <button style="width: 130px;" type="button" class="btn btn-block btn-warning" disabled="">Requiere receta</button>
                </div>
                @endif 

                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nombre" value="{{$producto->nombre}}" disabled="">
                    </div>
                 </div>

                 <div class="form-group row">
                    <label for="existencias" class="col-sm-2 col-form-label">Existencias</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="existencias" value="{{$producto->existencias}}" disabled="">
                    </div>
                 </div>

                 <div class="form-group row">
                    <label for="precio" class="col-sm-2 col-form-label">Precio</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="precio" value="{{$producto->precio}}" disabled="">
                    </div>
                 </div>

                <form action="{{route('producto.destroy', [$producto])}}" method="POST">
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