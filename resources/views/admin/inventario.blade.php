@if(Auth::user()->hasRole('admin'))
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'admin_users'
])

@section('content')
    <div class="content">
        @if (session('status'))
            <div id="hide" class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('password_status'))
            <div class="alert alert-success" role="alert">
                {{ session('password_status') }}
            </div>
		@endif
		
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="card demo-icons">
					<div class="card-header">
						<div class="row align-items-center p-3">
							<div class="col-4">
								<h4 class="text-left m-0">Stock de Productos</h4>
							</div>
							<div class="col-8">
								<button type="button" style="margin:1px; width: 100%; background: #1c4168;" class="btn btn-danger" data-toggle="modal" data-target="#newc">
									Agregar nuevo producto
								</button>
							</div>
						</div>
					</div>
					<div class="card-body p-0">
						<table class="table table-bordered table-hover">
							<thead class="thead-dark">
								<tr class="dark">
									<th>#</th>
									<th>Codigo</th>
									<th>Descripcion</th>
									<th>Precio compra</th>
									<th>Precio venta</th>
									<th>Existencia</th>
									<th>Factura proveedor</th>
									<th>Ubicacion</th> 
								</tr>
							</thead>
							<tbody>
								@forelse ($productos as $data)
									<tr>
										<td>{{ ++$i }}</td>
										<td>{{ $data->codigo }}</td>
										<td>{{ $data->descripcion }}</td>
										<td>{{ $data->precio_compra }}</td>
										<td>{{ $data->precio_venta }}</td>
										<td>{{ $data->existencia }}</td>
										<td>{{ $data->factura_proveedor }}</td>
										<td>{{ $data->ubicacion }}</td>
										<td class="p-2">
											
										</td>
									</tr>
								@empty
									<tr>
										<td colspan="12">No hay Registros Disponibles</td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
					<div class="card-footer">
						
					</div>
				</div>
			</div>
		</div>	

		<!--Modal nuevos productos-->
		<div class="modal fade bd-example-modal-lg" id="newc" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div style="background:#f4f3ef;" class="text-center modal-header">
						<h4 class="modal-title">Nuevo Usuario</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form id="guardarModal" method="POST" action="">
					{{csrf_field()}}
						<div style="padding-top:30px;" class="modal-body">
							<div class="form-group">
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>Nombre:</label>
										<input type="text" class="form-control" placeholder="" name="cod" required="">
									</div>
									<div class="form-group col-md-4">
										<label>Correo:</label>
										<input type="text" class="form-control" placeholder="" name="cod" required="">
									</div>
									<div class="form-group col-md-4">
										<label>Clave:</label>
										<input type="text" class="form-control" placeholder="" name="cod" required="">
									</div>
									<div class="form-group col-md-4">
										<p><strong>Configurar usuario</strong></p>
										<div class="row">
											<div class="col-12">
											<label>Tipo de Usuario:</label>
												<select class="form-control" name="name" required="">
												<option value="">Seleccionar..</option>
												
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
							<input name="boton_guardar" style="background: #1c4168; color: white;" id="boton_guardar" type="submit" value="Registrar" class="form-control btn-primary">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--Modal nuevos productos-->
    </div>

@endsection
@push('scripts')
	<script type="text/javascript">
	$("document").ready(function(){
	    setTimeout(function(){
	       $("#hide").fadeOut();
	    }, 5000 ); // 5 secs
	});
	</script>
@endpush

@endif