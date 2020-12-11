@extends('adminLTETheme')

@section('content')	
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Listado de productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Listado de productos</li>              
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
                <h3 class="card-title">Productos</h3>
                <div class="card-tools">
                  @can('admin')
                  <a href="{{action([\App\Http\Controllers\ProductoController::class, 'create'])}}" class="text-success mr-1 btn btn-tool btn-sm">
                    <i class="fas fa-plus"></i>
                  </a>
                  @endcan
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Producto</th>                    
                    <th>Precio unitario</th>
                    @can('admin')
                    <th>Valor de mercancía</th>                    
                    <th>Más</th>
                    @endcan
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($productos as $p)
					        <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      {{$p->nombre}}
                      @if($p->receta==1)
                        <small class="badge badge-warning"><i class="fas fa-file-medical-alt"></i> R. Receta</small>
                      @endif 
                    </td>                    
                    <td>{{$p->precio}} MXN</td>
                    @can('admin')
                    <td>{{$p->precio_por_existencias}}</td>                    
                    <td>
                      <a href="/producto/{{$p->id}}" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                    @endcan
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