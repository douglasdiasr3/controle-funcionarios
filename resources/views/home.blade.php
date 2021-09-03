@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Olá {{ Auth::user()->name }}, bem vindo ao controle de funcionários.</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


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

                        <button type="button" onclick="javascript:location.href='{{route('empresa.index')}}'" class="btn btn-primary">
                            <i class="fa fa-arrow-left"></i>
                            <span class="label-botao"> Gerir Empresas</span>
                        </button>
                        <button type="button" onclick="javascript:location.href='{{route('funcionario.index')}}'" class="btn btn-success">
                            <i class="fa fa-arrow-left"></i>
                            <span class="label-botao"> Gerir Funcionários</span>
                        </button>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection