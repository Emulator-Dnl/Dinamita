@extends('adminLTETheme')

@section('content')
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          	@if(isset($producto))
      			  <h1 class="m-0 text-dark">Actualizar producto</h1>
      			@else
      			  <h1 class="m-0 text-dark">Crear nuevo producto</h1>				
      			@endif            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @if(isset($producto))
      			    <li class="breadcrumb-item"><a href="/producto">Listado de productos</a></li>
      			    <li class="breadcrumb-item"><a href="/producto/{{$producto->id}}">Información de producto</a></li>
                <li class="breadcrumb-item active">Actualizar producto</li>
      			  @else			    
      			  	<li class="breadcrumb-item"><a href="/producto">Listado de productos</a></li>
                <li class="breadcrumb-item active">Crear nuevo producto</li>				
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
                <h3 class="card-title">Producto</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              @include('partials.form-error')

              @if(isset($producto))
                {!! Form::model($producto, ['route' => ['producto.update', $producto->id], 'method' => 'PATCH', 'role' => 'form']) !!}
      			  @else
                {!! Form::open(['route' => 'producto.store', 'role' => 'form']) !!}
      			  @endif
              
                <div class="card-body">

                  <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre del producto']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('existencias', 'Existencias') !!}
                    {!! Form::number('existencias', null, ['class' => 'form-control', 'placeholder' => 'Ingrese las existencias']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('precio', 'Precio') !!}
                    {!! Form::text('precio', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el precio']) !!}
                  </div>

                  @if(isset($producto))					
        				  @else
        					<div class="form-group custom-control custom-checkbox">
                    {!! Form::checkbox('receta', '1', false, ['class' => 'form-control  custom-control-input', 'id' => 'receta']) !!}
                    {!! Form::label('receta', 'Receta', ['class' => 'custom-control-label']) !!}                 
	                </div>
        				  @endif
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