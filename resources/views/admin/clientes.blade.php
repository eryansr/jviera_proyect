@if(Auth::user()->hasRole('admin'))
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'clientes'
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