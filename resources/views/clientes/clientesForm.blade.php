@extends('adminLTETheme')

@section('content')
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          	
			  <h1 class="m-0 text-dark">Crear nuevo cliente</h1>         
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">              		    
		  	      <li class="breadcrumb-item"><a href="/cliente">Listado de clientes</a></li>
              <li class="breadcrumb-item active">Crear nuevo cliente</li>       
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
                <h3 class="card-title">Cliente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              @include('partials.form-error')

              {!! Form::open(['route' => 'cliente.store', 'role' => 'form']) !!}
                <div class="card-body">
                  
                  <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del cliente']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('correo', 'Correo') !!}
                    {!! Form::email('correo', null, ['class' => 'form-control', 'placeholder' => 'Correo del cliente']) !!}
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                </div>
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