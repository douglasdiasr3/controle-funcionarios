@extends('layouts.app')
@section('content')


<div class="container">
	<form enctype="multipart/form-data" name="cadastroempresa" id="cadastroempresa" method="POST" action="{{route('funcionario.update', $funcionario->id)}}" class="form-horizontal formularios">
		@csrf
		@method('PUT')
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">Editar funcionário</div>

					<div class="card-body">
						@if (session('status'))
						<div class="alert alert-success alert-dismissible" role="alert">
							<span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
							{{ session('status') }}.
						</div>
						@endif
						@if (session('erro'))
						<div class="alert alert-danger alert-dismissible" role="alert">
							<span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
							<strong>Erro!</strong> {{ session('erro') }}.
						</div>
						@endif


						<div class="row">
							<div class="col-xs-12 col-lg-12">
								<button type="submit" class="btn btn-login botaoSalvarEditar">
									<i class="fa fa-floppy-o"></i>
									<span class="label-botao"> Salvar</span>
								</button>
								<button style="display: none;" class="btn btn-login botaoCarregando" type="button" disabled>
									<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
									Salvando...
								</button>
								<button id="mensagem" type="button" onclick="excluirRegistro(' funcionário(a) {{$funcionario->nome}}','funcionario/delete/{{$funcionario->id}}','funcionario')" class="btn btn-danger">
									<i class="fa fa-arrow-left"></i>
									<span class="label-botao"> Excluir</span>
								</button>
								<button type="button" onclick="javascript:location.href='{{route('funcionario.index')}}'" class="btn btn-warning">
									<i class="fa fa-arrow-left"></i>
									<span class="label-botao"> Cancelar</span>
								</button>
							</div>
							<div class="col-xs-6">
								<!-- atalhos -->
							</div>
						</div>
						<div class="row grupoCampos">
							@include("funcionario.partials.campos")
						</div>

					</div>
				</div>
			</div>
		</div>
</div>




@endsection




@section('scripts')
@stop