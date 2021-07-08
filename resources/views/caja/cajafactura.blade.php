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
								<h6 class="text-left m-0">Caja:</h6>
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
						
					</div>
					<div class="card-body p-0">
						<div class="container" style="width: 85%;">
						    <div class="row">
						        <div class="col-md-12 order-md-1" style="padding:20px;">
						            <h6 class="m-2">Recibo {{$factura->numero_factura}}</h6>
						            <table class="table table-bordered">
									  <thead>
									    <tr>
									      <th scope="col">Nombre</th>
									      <th scope="col">Cedula</th>
									    </tr>
									  </thead>
									  <tbody>
									    <tr>
									      <td>{{$factura->nombre_cliente}}</td>
									      <td>{{$factura->cedula_cliente}}</td>
									    </tr>
									  </tbody>
									</table>
									<div class="col-md-12 mb-12">
							            <h4 class="d-flex justify-content-between align-items-center">
							                <span class="text-muted">Productos Seleccionados</span>
							                <span class="badge badge-secondary badge-pill">{{$conteo}}</span>
							            </h4>
							            <ul class="list-group mb-10 sticky-top">
							            	<table class="table table-bordered">
											  <thead>
											    <tr>
											      <th scope="col">producto</th>
											      <th scope="col">cantidad</th>
											      <th scope="col">monto</th>
											      <th scope="col">sub total</th>
											    </tr>
											  </thead>
							            	@foreach ($productos as $data)
											  <tbody>
											    <tr>
											      <td>{{$data->producto}}</td>
											      <td>{{$data->cantidad}}</td>
											      <td>$ {{$data->monto}}</td>
											      <td>$ {{$data->total}}</td>
											    </tr>
											  </tbody>
											@endforeach
											</table>		
							                <li style="width:40%;padding: 15px; background: #b2f7b0;" class="list-group-item d-flex justify-content-between">
							                    <span>Total (USD)</span>
							                    <strong>$ {{$total}}</strong>
							                </li>
							            </ul>
							        </div>
						            <div class="modal-footer">
										<a href="javascript:history.go(-1)"><input value="Atras" class="form-control btn-danger"></a>
									</div>
						        </div>
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
						        
						    </div>						   
						</div>
					</div>
				</div>
	        </div>
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