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
					<div class="card-header" style="background: #1c4168; color:white;">
						<div class="row p-3">
							<div class="col-4">
								<h4 class="text-left m-0">Editar Proveedor</h4>
							</div>
						</div>
					</div>
					<div class="card-body p-0" style=" text-align: left;">
					<form id="guardarModal" method="POST" action="{{ route('proveedores.update', $proveedor->id )}}">
					{{csrf_field()}}
					<input type="hidden" name="_method" value="PUT">
						<div style="padding-top:30px;" class="modal-body">
							<div class="form-group">
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>codigo:</label>
										<input type="text" class="form-control" placeholder="" value="{{$proveedor->codigo}}"  name="codigo" required="">
									</div>
									<div class="form-group col-md-4">
										<label>proveedor:</label>
										<input type="text" class="form-control" placeholder="" value="{{$proveedor->codigo}}"  name="proveedor" required="">
									</div>
									<div class="form-group col-md-4">
										<label>factura:</label>
										<input type="text" class="form-control" placeholder="" value="{{$proveedor->codigo}}"  name="factura" required="">
									</div>
									<div class="form-group col-md-4">
										<label>ubicacion:</label>
										<input type="text" class="form-control" placeholder="" value="{{$proveedor->codigo}}"  name="ubicacion" required="">
									</div>
								</div>
							</div>
						</div>
					<div class="card-footer">
						<div class="modal-footer">
							<div class="form-group col-md-2">
								<a href="javascript:history.go(-1)"><input value="Atras" class="form-control btn-danger"></a>
							</div>
							<div class="form-group">			
				                <input style="background-color: #10a450; color:white;" name="update" id="update" type="submit" value="Actualizar Producto" class="form-control btn-primary">
							</div>
						</div>
					</div>
					</form>
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