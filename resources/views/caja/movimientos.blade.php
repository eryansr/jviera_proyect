@if(Auth::user()->hasRole('caja'))
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'reportes'
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
			<div class="col-md-5 text-center">
				<div class="card demo-icons">
					<div class="card-header">
						<div class="row align-items-center p-3">
							<div class="col-8">
								<h6 class="text-left m-0">Caja: {{ auth()->user()->id }}</h6>
								<h6 style="font-weight:500;" class="text-left m-0">creada: {{ auth()->user()->created_at }}</h6>
							</div>
						</div>
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
								<h4 class="text-left m-0">Facturas de la caja</h4>
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