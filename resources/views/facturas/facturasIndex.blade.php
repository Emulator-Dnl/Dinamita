@extends('adminLTETheme')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Listado de facturas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Listado de facturas</li>              
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
                <h3 class="card-title">Facturas</h3>
                <div class="card-tools">
                  <a href="{{action([\App\Http\Controllers\FacturaController::class, 'create'])}}" class="text-success mr-1 btn btn-tool btn-sm">
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
                    <th>Fecha y hora</th>                    
                    <th>Cliente</th>
                    <th>Más</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($facturas as $factura)
					        <tr>
                    <td>
                      {{$factura->created_at->format('M d Y, h:m:s a')}}
                    </td>                    
                    <td>{{$factura->user->name}}</td>
                    <td>
                      <a href="/factura/{{$factura->id}}" class="text-muted">
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