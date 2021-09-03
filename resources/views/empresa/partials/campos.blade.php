<div class="col-xs-6 col-lg-6">
	<div class="form-group row" id="tipo">
		<div class="col-md-12">
			<label for="" class="form-label">Nome</label>
			<input value="{{ isset($empresa) ? $empresa->nome : old('nome') }}" type="text" class="form-control" name="nome" id="nome" >
			@error('nome')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>

	</div>
</div>

<div class="col-xs-6 col-lg-6">
	<div class="form-group row" id="tipo">
		<div class="col-md-12">
			<label for="" class="form-label">E-mail</label>
			<input value="{{ isset($empresa) ? $empresa->email : old('email') }}"    type="email" class="form-control" name="email" id="email" >
		</div>
	</div>
</div>

<div class="col-xs-6 col-lg-6">
	<div class="form-group row" id="tipo">
		<div class="col-md-12">
			<label for="" class="form-label">Logotipo</label>
			<input value="{{ isset($empresa) ? $empresa->logotipo : old('logotipo') }}"   type="file" class="form-control" name="logotipo" id="logotipo" >
			@error('logotipo')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
			@if(isset($empresa->logotipo))
			<div id="divImagem"><img id="imagemLogotipo" src="{{url('/logotipos')}}/{{$empresa->logotipo}}"></div>
			@endif
		</div>

	</div>
</div>

<div class="col-xs-6 col-lg-6">
	<div class="form-group row" id="tipo">
		<div class="col-md-12">
			<label for="" class="form-label">Site</label>
			<input value="{{ isset($empresa) ? $empresa->site : old('site') }}"  type="text" class="form-control" name="site" id="site" >
		</div>
	</div>
</div>
</div>