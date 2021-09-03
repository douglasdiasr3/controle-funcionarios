@extends("layout.padrao")
@section('content')
<!-- page content -->
@include('layout.navbar1')
Cargo
@include('layout.navbar2')	
	<div class="content">
		<form name="cadastroEmpresa" id="cadastroEmpresa" method="post" action="{{route('cargo.edit', $cargo->id)}}" class="form-horizontal">
			@csrf
		    <div class="header-pagina">
		    	<div class="row">
		    		<div class="col-xs-12 col-lg-12">
						<button type="button" onclick="javascript:location.href='{{route('cargo.edit', $cargo->id)}}'"class="btn btn-primary">
							<i class="fa fa-pencil"></i>
							<span class="label-botao"> Editar</span>
						</button>
						<button type="button" onclick="javascript:location.href='{{route('cargo.create')}}'" class="btn btn-info">
							<i class="fa fa-plus"></i>
							<span class="label-botao"> Novo</span>
						</button>
						<button type="button" onclick="excluiRegistro('o cargo {{$cargo->nome}}','{{route('cargo.delete', $cargo->id)}}')" class="btn btn-danger" >
							<i class="fa fa-trash"></i>
							<span class="label-botao"> Excluir</span>
						</button>
						<!--
						<button type="button" onclick="javascript:location.href='{{route('cargo.delete', $cargo->id)}}'" class="btn btn-danger" >
							<i class="fa fa-trash"></i>
							<span class="label-botao"> Excluir</span>
						</button>
						-->
						<button type="button" onclick="javascript:location.href='{{route('cargo.index')}}'" class="btn btn-warning">
							<i class="fa fa-arrow-left"></i>
							<span class="label-botao"> Voltar</span>
						</button>
		    		</div>
		    		<div class="col-xs-6">
		    			<!-- atalhos -->
		    		</div>
		    	</div>
		    </div>
			<div class="conteudo-pagina">
		        <div class="card">
		            <div class="card-body">
		                <div class="toolbar">
		                  <!--        Here you can write extra buttons/actions for the toolbar              -->
		                </div>
						@include("cadastros.estrutura.cargo.partials.campos")
		            </div>
	            </div>
	        </div>
		</form>
    </div>





@stop
@section('scripts')
@stop
