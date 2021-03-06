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
								<h6 class="text-left m-0">Cliente: {{$cliente->nombre}} {{$cliente->apellido}}</h6>
								<h6 style="font-weight:500;" class="text-left m-0">Fecha de registro: {{$cliente->created_at}}</h6>
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
						            <h6 class="m-2">Procesar Factura</h6>
						            <form id="guardarModal" method="POST" action="{{ route('factura.store') }}">
									{{csrf_field()}}
										<div style="padding-top:30px;" class="modal-body">
											<div class="form-group">
												<div class="form-row">
													<div class="form-group col-md-4">
														<label>Numero de factura</label>
														<input type="text" class="form-control" value="{{$cliente->numero_factura}}" readonly="" name="numero_factura">
													</div>
													<div class="form-group col-md-4">
														<label>Nombre Cliente</label>
														<input type="text" class="form-control" readonly="" value="{{$cliente->nombre}}" name="nombre_cliente">
													</div>
													<div class="form-group col-md-4">
														<label>Cedula Cliente</label>
														<input type="text" class="form-control" readonly="" value="{{$cliente->cedula}}" name="cedula_cliente">
													</div>
													<div class="form-group col-md-4">
														<input type="text" class="form-control" value="{{$cliente->id}}" hidden="" name="cliente_id">
													</div>
												</div>
												<div class="form-row">
													<div style="border-top: 1px solid #e9ecef;"></div>
													<br>
													<div class="field_wrapper" style="width:100%;">
													<div class="form-elements">
														<div class="form-group">
															<a style="color:white; padding: 5px;background: #25c40e;border-radius: 10px;" href="javascript:void(0);" class="add_button" title="Add field">Agregar +</a>
														</div>
														<div class="form-group col-md-8">
															<label>Lista de Productos:</label>
															<select required="" class="form-control" id="product_name" name="producto[]" required="">
																<option value="">Seleccionar Producto..</option>
																@forelse ($productos as $data)
																	<option value="{{$data->descripcion}}">{{$data->descripcion}}</option>
																@endforeach
															</select>
														</div>
														<div class="form-group col-md-6">
															
														</div>
														<div class="form-group col-md-5">
															<label>Precio:</label>
															<input type="number" class="form-control" id="amount" name="monto[]" required="">
														</div>
														<div class="form-group col-md-5">
															<label>Cantidad:</label>
															<input type="number" class="form-control" id="cantidad" name="cantidad[]" required="">
														</div>
													</div>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<a href="javascript:history.go(-1)"><input value="Atras" class="form-control btn-danger"></a>
											<input name="boton_guardar" style="background: #1c4168; color: white;" id="boton_guardar" type="submit" value="Registrar" class="form-control btn-primary">
										</div>
									</form>
						        </div>
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

	<script type="text/javascript">

		$(document).ready(function () {

			var maxField = 5; // Total 5 product fields we add

			var addButton = $('.add_button'); // Add more button selector

			var wrapper = $('.field_wrapper'); // Input fields wrapper

			var fieldHTML = `<div class="form-elements">
						<div class="form-group col-md-8">
							<label>Factura Drogueria:</label>
							<select class="form-control" id="product_name" name="producto[]" required="">
								<option value="">Seleccionar proveedor..</option>
								@forelse ($productos as $data)
									<option value="{{$data->descripcion}}">{{$data->descripcion}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-md-6">
							
						</div>
						<div class="form-group col-md-5">
							<label>Precio:</label>
							<input type="number" class="form-control" id="amount" name="monto[]" required="">
						</div>
						<div class="form-group col-md-5">
							<label>Cantidad:</label>
							<input type="number" class="form-control" id="cantidad" name="cantidad[]" required="">
						</div>
					<div class="form-group">
					<a style="color:white; padding: 5px;background:red;border-radius: 10px;"  href="javascript:void(0);" class="remove_button" title="Add field">Remover</a>
					</div>
				</div>`; //New input field html 

			var x = 1; //Initial field counter is 1

			$(addButton).click(function () {
				//Check maximum number of input fields
				if (x < maxField) {
					x++; //Increment field counter
					$(wrapper).append(fieldHTML);
				}
			});

			//Once remove button is clicked
			$(wrapper).on('click', '.remove_button', function (e) {
				e.preventDefault();
				$(this).parent().closest(".form-elements").remove();
				x--; //Decrement field counter
			});
		});
</script>

@endpush

@endif