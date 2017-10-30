<?php

namespace App\Http\Controllers;

use App\Asistente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AsistenteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $asistentes = Asistente::orderBy('apellido')
                ->orderBy('nombre')
                ->paginate(20);
        
        return view('asistentes/index')->with('asistentes', $asistentes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('asistentes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = validar($request, true);
        if ($validator->fails()) {
            // falla
            return redirect('asistentes/create')
                            ->withErrors($validator)
                            ->withInput($request->all());
        } else {
            $this->guardarAsistente($request, new Asistente);
            // éxito
            Session::flash('success', 'Asistente creado con éxito!');
            return redirect('asistentes');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $asistente = Asistente::findOrFail($id);
        return view('asistentes.show')->with('asistente', $asistente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $asistente = Asistente::findOrFail($id);
        return view('asistentes.edit')->with('asistente', $asistente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validar($request, false, $id);
        if ($validator->fails()) {
            // falla
            return redirect("asistentes/edit/$id")
                            ->withErrors($validator)
                            ->withInput($request->all());
        } else {
            // búsqueda y actualización
            $asistente = Asistente::find($id);
            $this->guardarAsistente($request, $asistente);
            // éxito
            Session::flash('success', 'Asistente editado con éxito!');
            return redirect('asistentes');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $asistente = Asistente::findOrFail($id);
        $asistente->delete();

        // redirect
        Session::flash('success', 'Asistente eliminado con éxito!');
        return redirect('asistentes');
    }

    /**
     * Valida los inputs de $request, tanto en un create ($isCreate &&  $id == null)
     * como en un update ($id == $asistente->id && (!$isCreate)). 
     * Es decir, es reutilizable.
     * 
     * @param Request $request : con los campos a validar. 
     * @param boolean $isCreate : indica si es un store o un update.
     * @param int $id : el id del asistente (en caso de ser update).
     * @return Validator Validator, con el resultado de las reglas aplicadas a $request.
     */
    private function validar(Request $request, $isCreate, $id = null)
    {
        $rules = array(
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'documento' => 'required|numeric|digits_between:7,8',
        );
        if ($isCreate) {
            // Si es un create, el documento no debe encontrarse en la DB
            array_push($rules, 
                    ['documento' => Rule::unique('asistente')]);
        } else {
            // Idem para un update, pero hay que ignorar el $id del asistente 
            array_push($rules, 
                    ['documento' => Rule::unique('asistente')->ignore($id)]);
        }
        return Validator::make($request->all(), $rules);
    }
    
    /**
     * Setea los campos del asistente. Es reutilizable (store y update).
     * @param Request $request : con los campos a persistir
     * @param Asistente $asistente : el asistente a guardar (o actualizar)
     */
    private function guardarAsistente(Request $request, $asistente)
    { 
        $asistente->nombre = $request->input('nombre');
        $asistente->apellido = $request->input('apellido');
        $asistente->documento = $request->input('documento');
        $asistente->email = $request->input('email');
        $asistente->save();
    }

}
