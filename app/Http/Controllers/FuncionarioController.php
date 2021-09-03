<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioRequest;
use App\Models\Empresas;
use App\Models\Funcionarios;
use Illuminate\Http\Request;
use Session;

class FuncionarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $objFuncionarios = new Funcionarios();
        $funcionarios = $objFuncionarios->filtro($request->nome);

        return view('funcionario.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresas::all();
        return view('funcionario.create',compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioRequest $request)
    {

      
        $funcionario = new Funcionarios();
        $funcionario->fill($request->all());        
        $funcionario->save();



        Session::flash('status', 'Funcionário criada com sucesso');
        return redirect()->route('funcionario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = Funcionarios::find($id);
        $empresas = Empresas::all();

        return view('funcionario.edit', compact('funcionario','empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FuncionarioRequest $request, $id)
    {
       

        $funcionario = Funcionarios::find($id);
        $funcionario->fill($request->all());      
        $funcionario->save();

        Session::flash('status', 'Funcionario(a) editado com sucesso');
        return redirect()->route('funcionario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Funcionarios::find($id);
        $empresa->delete();
    }
}
