<?php

namespace App\Http\Controllers;

use App\Asistente;
use App\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // get all the asistentes
        $asistentes = Asistente::
                orderBy('apellido')
                ->orderBy('nombre')
                ->paginate(20);

        // load the view and pass the asistentes
        return view('asistentes/index')
                        ->with('asistentes', $asistentes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/asistentes/create.blade.php)
        return view('asistentes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // validate
        $rules = array(
            'nombre' => 'required',
            'apellido' => 'required',
            'documento' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        // process the store
        if ($validator->fails()) {
            return redirect('asistentes/create')
                            ->withErrors($validator);
        } else {
            // store
            $asistente = new Asistente;
            $contacto = new Contacto;
            $asistente->nombre = $request->input('nombre');
            $asistente->apellido = $request->input('apellido');
            $asistente->documento = $request->input('documento');
            $contacto->email = $request->input('email');
            $contacto->telefono = $request->input('telefono');

            DB::beginTransaction();
            try {
                $contacto->save();
                $asistente->contacto()
                        ->associate($contacto)
                        ->save();
            } catch (\Exception $e) {
                DB::rollback();
                Session::flash('message', 'Inesperadamente, la transaccion fallo');
                throw $e;
            }
            DB::commit();

            // redirect
            Session::flash('success', 'Successfully created asistente!');
            return redirect('asistentes'); //->with('message', 'Successfully created asistente!');
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
        // get the asistente
        $asistente = Asistente::findOrFail($id);

        // show the view and pass the asistente to it
        return view('asistentes.show')
                        ->with('asistente', $asistente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the asistente
        $asistente = Asistente::findOrFail($id);

        // show the edit form and pass the asistente
        return view('asistentes.edit')
                        ->with('asistente', $asistente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nombre' => 'required',
            'apellido' => 'required',
            'documento' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect("asistentes/edit/{id}")
                            ->withErrors($validator)
                            ->withInput($request);
        } else {
            // store
            $asistente = Asistente::find($id);
            $asistente->nombre = $request->input('nombre');
            $asistente->apellido = $request->input('apellido');
            $asistente->documento = $request->input('documento');
            $asistente->contacto->email = $request->input('email');
            $asistente->contacto->telefono = $request->input('telefono');

            DB::beginTransaction();
            try {
                $asistente->contacto->save();
                $asistente->save();
            } catch (\Exception $e) {
                DB::rollback();
                Session::flash('message', 'Inesperadamente, la transaccion fallo');
                throw $e;
            }
            DB::commit();

            // redirect
            Session::flash('message', 'Successfully updated asistente!');
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
        Session::flash('message', 'Successfully deleted the asistente!');
        return redirect('asistentes');
    }

}
