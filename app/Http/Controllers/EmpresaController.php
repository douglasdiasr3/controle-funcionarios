<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Models\Empresas;
use Illuminate\Http\Request;
use Session;


class EmpresaController extends Controller
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

        $objEmpresas = new Empresas;
        $empresas = $objEmpresas->filtro($request->nome);


        return view('empresa.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {

       if (isset($request->logotipo)) {
            $nomeImagem = 'logotipo_' . time() . '.' . $request->logotipo->extension();
            $request->logotipo->move(public_path('logotipos'), $nomeImagem);
        }
        $empresa = new Empresas;

        $empresa->fill($request->all());
        if (isset($request->logotipo)) {
            $empresa->logotipo = $nomeImagem;
        }
        $empresa->save();



        Session::flash('status', 'Empresa criada com sucesso');
        return redirect()->route('empresa.index');
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
        $empresa = Empresas::find($id);

        return view('empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, $id)
    {

        if (isset($request->logotipo)) {
            $nomeImagem = 'logotipo_' . time() . '.' . $request->logotipo->extension();
            $request->logotipo->move(public_path('logotipos'), $nomeImagem);
        }


        $empresa = Empresas::find($id);
        $empresa->fill($request->all());
        if (isset($request->logotipo)) {
            $empresa->logotipo = $nomeImagem;
        }
        $empresa->save();

        Session::flash('status', 'Empresa editada com sucesso');
        return redirect()->route('empresa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresas::find($id);
        $empresa->delete();
    }
}
