@if(Auth::user()->hasRole('admin'))
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'report'
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
								<h4 class="text-left m-0">Reporte de Facturas</h4>
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
									<th>Registrado</th>
									<th>Acciones</th> 
								</tr>
							</thead>
							<tbody>
							@forelse ($facturas as $data)
									<tr>
										<td>{{ ++$i }}</td>
										<td>{{$data->numero_factura}}</td>
										<td>{{$data->nombre_cliente}}</td>
										<td>{{$data->created_at}}</td>
										<td class="d-flex justify-content-center btn-group">
											<form action="{{ route('admin.recibo', $data->id) }}">
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