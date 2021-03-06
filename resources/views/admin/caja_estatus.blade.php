@if(Auth::user()->hasRole('admin'))
@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'admin'
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
								<h6 class="text-left m-0">Caja: {{ Auth::user()->name }}</h6>
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
						            <table class="table table-bordered">
									  <thead>
									    <tr>
									      <th scope="col">Total Productos</th>
									      <th scope="col">{{$productos}}</th>
									    </tr>
									  </thead>
									  <tbody>
									    <tr>
									      <td>Total Facturas</td>
									      <td>{{$factura}}</td>
									    </tr>
									    <tr>
									      <td>Ingresos Caja</td>
									      <td>$ {{$total}}</td>
									    </tr>
									  </tbody>
									</table>
						            <div style="display: block; text-align: center;" class="modal-footer">
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