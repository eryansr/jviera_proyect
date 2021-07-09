@if(Auth::user()->hasRole('caja'))
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'caja'
])

@section('head')
@push('scripts')
	<script>
	$(document).ready(function(){
		$('.loader').fadeOut(2000);
		$('.hide').fadeOut(2000);
		$('#show').hide();
		  $("#boton").click(function(){ 
		    $("#show").toggle(400);
		  });
		});
	</script>
@endpush
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  border-bottom: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
@endsection

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
		<div class="hide" style="height: 100%;width: 100%;overflow: hidden;padding-bottom: 100%;" >
			<div style="margin: auto; margin-top: auto; padding: 100px; margin-top: 200px;" class="loader"></div>
		</div>

		<div id="hidecont">
		<div class="row">
			<div class="col-md-4 text-center">
				<div class="card demo-icons">
					<div class="card-header">
						<div class="row align-items-center p-3">
							<div class="col-8">
								<h6 class="text-left m-0">Caja: {{ Auth::user()->id }}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 text-center">
				<div class="card demo-icons">
					<div class="card-header">
						<div class="row align-items-center p-3">
							<div class="col-6">
								<button id="boton" type="button" style="margin:1px; width: 100%; background: #29600a;" class="btn btn-danger">
								Lista de Clientes 
								</button>
							</div>
							<div class="col-6">
								<button type="button" style="margin:1px; width: 100%; background: #1c4168;" class="btn btn-info" data-toggle="modal" data-target="#newc">
								Facturar Nuevo Cliente
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="show" class="row">
			<div class="col-md-10 text-center">
				<div class="card demo-icons">
					<div class="card-header">
						<div class="row align-items-center p-3">
							<div class="col-4">
								<h4 class="text-left m-0">Lista de Clientes</h4>
							</div>
						</div>
					</div>
					<div class="card-body p-0">
						<table class="table table-bordered table-hover">
							<thead class="thead-dark">
								<tr class="dark">
									<th>#</th>
									<th>nombre</th>
									<th>apellido</th>
									<th>cedula</th>
									<th>telefono</th>
									<th>Email</th>
									<th>Creado</th>
									<th>Acciones</th>  
								</tr>
							</thead>
							<tbody>
					            @forelse ($clientes as $data)
									<tr>
										<td>{{ ++$i }}</td>
										<td>{{ $data->nombre }}</td>
										<td>{{ $data->apellido }}</td>
										<td>{{ $data->cedula }}</td>
										<td>{{ $data->telefono }}</td>
										<td>{{ $data->email }}</td>
										<td>{{ $data->created_at }}</td>
										<td class="d-flex justify-content-center btn-group">
											<form action="{{ route('factura', $data->id) }}">
												<input style="color:black;" type="submit" style="width: 91px;" value="Procesar Factura" class="glyphicon glyphicon-zoom-in btn btn-info btn-sm">
											</form>
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
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="card demo-icons">
					<div class="card-header">
						<div class="row align-items-center p-3">
							<div class="col-4">
								<h4 class="text-left m-0">Movimientos del dia</h4>
							</div>
						</div>
					</div>
					<div class="card-body p-0">
						<table class="table table-bordered table-hover">
							<thead class="thead-dark">
								<tr class="dark">
									<th>#</th>
									<th>Nº Factura</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Cedula</th>
									<th>Fecha</th>
									<th>Acciones</th> 
								</tr>
							</thead>
							<tbody>
							@forelse ($facturas_hoy as $data)
									<tr>
										<td>{{ ++$i }}</td>
										<td>{{ $data->numero_factura }}</td>
										<td>{{ $data->nombre }}</td>
										<td>{{ $data->apellido }}</td>
										<td>{{ $data->cedula }}</td>
										<td>{{ $data->created_at }}</td>
										<td class="d-flex justify-content-center btn-group">
											<form action="{{ route('factura.recibo', $data->id) }}">
												<input style="color:black;" type="submit" style="width: 91px;" value="Ver" class="glyphicon glyphicon-zoom-in btn btn-info btn-sm">
											</form>
										</td>
									</tr>
								@empty
									<tr>
										<td colspan="12">No se han realizado facturaciones hoy</td>
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

		<!--Modal nueva factura-->
		<div class="modal fade bd-example-modal-lg" id="newc" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div style="background: #1c4168; color: white;" class="text-center modal-header">
						<h4 class="modal-title">Nueva Facturacion</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="card-body p-0" style="background:#f4f3ef;">
						<div class="container" style="width: 85%;">
						    <div class="row">
						        <div class="col-md-12 order-md-1" style="background:white; padding:20px;">
						            <h6 class="m-2">Datos del cliente</h6>
						            <form class="needs-validation" method="POST" action="{{ route('clientes.store') }}">
						            {{csrf_field()}}
						                <div class="row">
						                	<div class="col-md-6 mb-3">
						                        <label for="firstName">Numero de Factura</label>
						                        <input type="text" class="form-control" name="numero_factura" placeholder="" value="" required="">
						                        <div class="invalid-feedback"> Campo Requerido</div>
						                    </div>
						                    <div class="col-md-6 mb-3">
						                        <label for="firstName">Nombre</label>
						                        <input type="text" class="form-control" id="firstName" name="nombre" placeholder="" value="" required="">
						                        <div class="invalid-feedback"> Campo Requerido</div>
						                    </div>
						                    <div class="col-md-6 mb-3">
						                        <label for="lastName">Apellido</label>
						                        <input type="text" class="form-control" id="lastName" name="apellido" placeholder="" value="" required="">
						                        <div class="invalid-feedback"> Campo Requerido</div>
						                    </div>
						                </div>
						              	<div class="row">
						                    <div class="col-md-6 mb-3">
						                        <label for="firstName">Cedula o Rif</label>
						                        <input type="number" class="form-control" id="" name="cedula" placeholder="" value="" required="">
						                        <div class="invalid-feedback"> Campo Requerido</div>
						                    </div>
						                    <div class="col-md-6 mb-3">
						                        <label for="lastName">Telefono</label>
						                        <input type="number" class="form-control" id="" name="telefono" placeholder="" value="" required="">
						                        <div class="invalid-feedback"> Campo Requerido</div>
						                    </div>
						                </div>
						                <div class="row">
							                <div class="mb-3 col-md-6 ">
							                    <label for="email">Email <span class="text-muted"></span></label>
							                    <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com">
							                    <div class="invalid-feedback"> Campo Requerido </div>
							                </div>
							                <div class="col-md-4 mb-3">
						                        <label for="lastName">Red Social</label>
						                        <input type="text" class="form-control" id="" name="redsocial" placeholder="" value="" required="">
						                        <div class="invalid-feedback"> Campo Requerido</div>
						                    </div>
					                    </div>
						                <hr class="mb-4">						       
						                <button class="btn btn-primary btn-lg btn-block" type="submit">Registrar Factura</button>
						            </form>
						        </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Modal nueva factura-->
		</div>

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