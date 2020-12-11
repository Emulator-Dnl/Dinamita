@extends('adminLTETheme')

@section('content')
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Información de factura</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/factura">Listado de facturas</a></li>
              <li class="breadcrumb-item active">Información de factura</li>
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
                <h3 class="card-title">Factura</h3>
                <div class="card-tools">
                </div>
              </div>
              <div class="card-body">

                 <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Captura</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nombre" value="{{$factura->created_at->format('M d Y, h:m:s a')}}" disabled="">
                    </div>
                 </div>

                 <div class="form-group row">
                    <label for="existencias" class="col-sm-2 col-form-label">Cliente</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="existencias" value="{{$factura->user->name}}" disabled="">
                    </div>
                 </div>

                 <div class="form-group row">
                    <label for="precio" class="col-sm-2 col-form-label">Atendido por</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="precio" value="{{$factura->usuario->user->name}}" disabled="">
                    </div>
                 </div>

                <div class="card">
                  <div class="card-header border-0">
                    <h3 class="card-title">Productos</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                      </button>
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-bars"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <table class="table table-striped table-valign-middle">
                      <thead>
                        <tr>
                          <th>Producto comprado</th>                    
                          <th>Pago</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach ($factura->productos as $p)
                        <tr>
                          <td>
                            {{$p->nombre}}
                            @if($p->receta==1)
                              <small class="badge badge-warning"><i class="fas fa-file-medical-alt"></i> R. Receta</small>
                            @endif 
                          </td>                    
                          <td>{{$p->precio}} MXN</td>
                          
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
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