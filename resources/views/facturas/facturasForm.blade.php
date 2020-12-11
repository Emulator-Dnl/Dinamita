@extends('adminLTETheme')

@section('content')
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">          	
			     <h1 class="m-0 text-dark">Crear nueva factura</h1>         
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">              		    
		  	      <li class="breadcrumb-item"><a href="/factura">Listado de facturas</a></li>
              <li class="breadcrumb-item active">Crear nueva factura</li>       
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
                <h3 class="card-title">Factura</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              @include('partials.form-error')
              
        			<form role="form" action="{{route('factura.store')}}" method="POST">
                <div class="card-body">
                  
                  <div class="form-group">
                    @csrf
                  </div>

                  <div class="form-group">
                    <select class="form-control" name="usuario_id" hidden="">
                      @foreach($empleados as $empleado)
                        @if( Auth::user()->id == $empleado->user_id )                      
                          <option value="{{ $empleado->id }}"></option>
                        @endif  
                      @endforeach                 
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Cliente</label>
                    <select class="form-control" name="user_id">
                      @foreach($invitados as $invitado)
                        <option value="{{$invitado->id}}">{{$invitado->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Productos</label>
                    <select class="form-control" name="producto_id[]" multiple>
                      @foreach($productos as $producto)
                        <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                      @endforeach
                    </select>
                  </div>  
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