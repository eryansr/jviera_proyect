@if(Auth::user()->hasRole('admin'))
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'ventas'
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
							<div class="col-12">
								<h6 class="text-left m-0">Administrador: {{auth()->user()->name}}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6 text-center">
			@foreach ($cajas as $data)
				<div class="card demo-icons">
					<div class="card-header">
						<div class="row align-items-center p-3">
							<div class="col-8">
								<h6 class="text-left m-0">Caja: {{$data->id}}</h6>
								<h6 style="font-weight:500;" class="text-left m-0">Creada: {{$data->created_at}}</h6>
							</div>
							<div class="col-4">
								<form action="{{ route('factura', $data->id) }}">
									<input style="color:black;" type="submit" style="width: 91px;" value="Ver Estatus" class="glyphicon glyphicon-zoom-in btn btn-info btn-sm">
								</form>
							</div>
						</div>
					</div>
				</div>
			@endforeach
			
			</div>
			<div class="col-md-6 text-center">
				<div class="card demo-icons">
					<div class="card-header">
						<div class="row align-items-center p-3">
							<div class="col-6">
								<h4 class="text-left m-0">Lista de Facturas</h4>
							</div>
						</div>
					</div>
					<div class="card-body p-0">

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