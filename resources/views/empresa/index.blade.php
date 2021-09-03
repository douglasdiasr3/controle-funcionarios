@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Empresas</div>

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
                <div class="col-xs-2 col-lg-2">
                    <button type="button" onclick="javascript:location.href='{{route('empresa.create')}}'" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i>
                        <span class="label-botao"> Criar Novo</span>
                    </button>
                    <button type="button" onclick="javascript:location.href='{{route('home')}}'" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i>
                        <span class="label-botao"> Voltar</span>
                    </button>
                </div>

                <div class="col-xs-6">
                    <!-- atalhos -->
                </div>
            </div>
            <div class="row justify-content-center">

                <form method="get" action="{{ route('empresa.index') }}">
                    @csrf
                    <div class="form-group row" style="padding-left: 0px;">
                        <div class="col-md-1">
                            <strong>Filtrar</strong>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="nome" id="nome">
                        </div>
                        <div class="col-md-5">
                            <button style="margin-left: 20px;" type="submit" class="btn btn-login">
                                Pesquisar
                            </button>
                        </div>

                    </div>




            </div>
            </form>
            @if($empresas->count()>0)
            <div class="col-md-12" style="overflow-x:auto;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Site</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($empresas as $chave=>$empresa)
                        <tr>
                            <td scope="row">{{$empresa->id}}</td>
                            <td scope="row">{{$empresa->nome}}</td>
                            <td scope="row">{{$empresa->email}}</td>
                            <td scope="row">{{$empresa->site}}</td>
                            <td scope="row">
                                <button type="button" onclick="javascript:location.href='{{ route('empresa.edit', $empresa->id) }}'" class="btn btn-primary btn-sm">Editar</button>
                                <button type="button" onclick="excluirRegistro('a empresa {{$empresa->nome}}','empresa/delete/{{$empresa->id}}','empresa')" class="btn btn-danger btn-sm">Excluir</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $empresas->links() }}
            </div>
            @else
            <div class="col-md-12">
                <span>Nenhuma empresa encontrada!</span>
            </div>
            @endif
        </div>        
    </div>
</div>
</div>
@endsection