<div class="col-xs-12 col-lg-4">
	<div class="form-group row" id="tipo">
		<div class="col-md-12">
			<label for="" class="form-label">Empresa</label>
			<select name="empresa_id" class="form-control" id="empresa_id">
				<option value="">Selecione</option>
				@if(count($empresas)>0)
				@foreach($empresas as $empresa)
				<option @if(isset($funcionario) && $funcionario->empresa_id==$empresa->id) ) selected  @endif value="{{$empresa->id}}">{{$empresa->nome}}</option>
				@endforeach
				@endif
			</select>
			@error('empresa_id')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
</div>

<div class="col-xs-6 col-lg-4">
	<div class="form-group row" id="tipo">
		<div class="col-md-12">
			<label for="" class="form-label">Nome</label>
			<input value="{{ isset($funcionario) ? $funcionario->nome : old('nome') }}" type="text" class="form-control" name="nome" id="nome">
			@error('nome')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>

	</div>
</div>

<div class="col-xs-6 col-lg-4">
	<div class="form-group row" id="tipo">
		<div class="col-md-12">
			<label for="" class="form-label">Sobrenome</label>
			<input value="{{ isset($funcionario) ? $funcionario->sobrenome : old('sobrenome') }}" type="sobrenome" class="form-control" name="sobrenome" id="sobrenome">
			@error('sobrenome')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>
	</div>
</div>



<div class="col-xs-6 col-lg-6">
	<div class="form-group row" id="tipo">
		<div class="col-md-12">
			<label for="" class="form-label">E-mail</label>
			<input value="{{ isset($funcionario) ? $funcionario->email : old('email') }}" type="text" class="form-control" name="email" id="email">
		</div>
	</div>
</div>

<div class="col-xs-6 col-lg-6">
	<div class="form-group row" id="tipo">
		<div class="col-md-12">
			<label for="" class="form-label">Telefone</label>
			<input value="{{ isset($funcionario) ? $funcionario->telefone : old('telefone') }}" type="text" class="form-control" name="telefone" id="telefone">
		</div>
	</div>
</div>
</div>