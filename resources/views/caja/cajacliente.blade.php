@if(Auth::user()->hasRole('caja'))
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'caja'
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
			<div class="col-md-8 text-center">
				<div class="card demo-icons">
					<div class="card-header">
						<div class="row align-items-center p-3">
							<div class="col-8">
								<h6 class="text-left m-0">Proveedor:</h6>
								<h6 style="font-weight:500;" class="text-left m-0">Ubicacion: </h6>
								<h6 style="font-weight:500;" class="text-left m-0">Fecha de registro:</h6>
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
								<h4 class="text-left m-0">Lista de Facturas</h4>
							</div>
							<div class="col-6">
								<button type="button" style="margin:1px; width: 100%; background: #1c4168;" class="btn btn-danger" data-toggle="modal" data-target="#newc">
								Registrar Nuevo Cliente
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 text-center">
				<div class="card">
					<div class="card-body p-0">
						<div class="container">
						    <div class="row">
						        <div class="col-md-12 mb-12">
						            <h4 class="d-flex justify-content-between align-items-center">
						                <span class="text-muted">Your cart</span>
						                <span class="badge badge-secondary badge-pill">3</span>
						            </h4>
						            <ul class="list-group mb-3 sticky-top">
						                <li class="list-group-item d-flex justify-content-between lh-condensed">
						                    <div>
						                        <h6 class="my-0">Product name</h6>
						                        <small class="text-muted">Brief description</small>
						                    </div>
						                    <span class="text-muted">$12</span>
						                </li>
						                <li class="list-group-item d-flex justify-content-between lh-condensed">
						                    <div>
						                        <h6 class="my-0">Second product</h6>
						                        <small class="text-muted">Brief description</small>
						                    </div>
						                    <span class="text-muted">$8</span>
						                </li>
						                <li class="list-group-item d-flex justify-content-between lh-condensed">
						                    <div>
						                        <h6 class="my-0">Third item</h6>
						                        <small class="text-muted">Brief description</small>
						                    </div>
						                    <span class="text-muted">$5</span>
						                </li>
						                <li class="list-group-item d-flex justify-content-between bg-light">
						                    <div class="text-success">
						                        <h6 class="my-0">Promo code</h6>
						                        <small>EXAMPLECODE</small>
						                    </div>
						                    <span class="text-success">-$5</span>
						                </li>
						                <li class="list-group-item d-flex justify-content-between">
						                    <span>Total (USD)</span>
						                    <strong>$20</strong>
						                </li>
						            </ul>
						        </div>
						    </div>						   
						</div>
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
						<h4 class="modal-title">Registro de Cliente</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="card-body p-0" style="background:#f4f3ef;">
						<div class="container" style="width: 85%;">
						    <div class="row">
						        <div class="col-md-12 order-md-1" style="background:white; padding:20px;">
						            <h6 class="m-2">Datos del cliente</h6>
						            <form class="needs-validation" novalidate="" >
						                <div class="row">
						                    <div class="col-md-6 mb-3">
						                        <label for="firstName">Nombre</label>
						                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
						                        <div class="invalid-feedback"> Campo Requerido</div>
						                    </div>
						                    <div class="col-md-6 mb-3">
						                        <label for="lastName">Apellido</label>
						                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
						                        <div class="invalid-feedback"> Campo Requerido</div>
						                    </div>
						                </div>
						              	<div class="row">
						                    <div class="col-md-6 mb-3">
						                        <label for="firstName">Cedula o Rif</label>
						                        <input type="number" class="form-control" id="" placeholder="" value="" required="">
						                        <div class="invalid-feedback"> Campo Requerido</div>
						                    </div>
						                    <div class="col-md-6 mb-3">
						                        <label for="lastName">Telefono</label>
						                        <input type="number" class="form-control" id="" placeholder="" value="" required="">
						                        <div class="invalid-feedback"> Campo Requerido</div>
						                    </div>
						                </div>
						                <div class="row">
							                <div class="mb-3 col-md-6 ">
							                    <label for="email">Email <span class="text-muted"></span></label>
							                    <input type="email" class="form-control" id="email" placeholder="email@email.com">
							                    <div class="invalid-feedback"> Campo Requerido </div>
							                </div>
							                <div class="col-md-4 mb-3">
						                        <label for="lastName">Red Social</label>
						                        <input type="text" class="form-control" id="" placeholder="" value="" required="">
						                        <div class="invalid-feedback"> Campo Requerido</div>
						                    </div>
					                    </div>
						                <hr class="mb-4">						       
						                <button class="btn btn-primary btn-lg btn-block" type="submit">Registrar Cliente</button>
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