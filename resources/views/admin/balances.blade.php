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
			<div class="col-md-8 text-center">
				<div class="card demo-icons">
					<div class="card-header">
						<div class="row align-items-center p-3">
							<div class="col-8">
								<h6 class="text-left m-0">Total Facturas: </h6>
								<h6 style="font-weight:500;" class="text-left m-0">Total Droguerias: </h6>
								<h6 style="font-weight:500;" class="text-left m-0">Total Productos: </h6>
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
							<div class="col-6">
								<h4 class="text-left m-0">Lista de Facturas</h4>
							</div>
							<div class="col-6">
								<button type="button" style="margin:1px; width: 100%; background: #1c4168;" class="btn btn-danger" data-toggle="modal" data-target="#newc">
								Agregar Nuevo Producto
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
									<th>Existencia</th>
									<th>Linea</th>
									<th>Acciones</th>  
								</tr>
							</thead>
							<tbody>
								@forelse ($productos as $data)
									<tr>
										<td>{{ ++$i }}</td>
										<td>{{ $data->codigo }}</td>
										<td>{{ $data->descripcion }}</td>
										<td>{{ $data->existencia }}</td>
										<td>{{ $data->linea }}</td>
										<td class="d-flex justify-content-center btn-group">
											<form action="{{ route('productos.edit', $data->id) }}">
												<input style="color:black;" type="submit" style="width: 91px;" value="Editar" class="glyphicon glyphicon-zoom-in btn btn-info btn-sm">
											</form>
											<form method="POST" action="{{ route('productos.delete', $data->id )}}">
												{{csrf_field()}}
												<input type="hidden" name="_method" value="DELETE">
												<input style="color:black;" type="submit" style="width: 91px;" name="eliminar" value="Eliminar" class="glyphicon glyphicon-zoom-in btn btn-danger btn-sm">
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