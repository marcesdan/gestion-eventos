<?php

namespace App\Http\Controllers;

use App\Asistencia;
use App\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AsistenciaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the asistencias
        $asistencias = Asistencia::
                orderBy('apellido')
                ->orderBy('nombre')
                ->paginate(20);

        // load the view and pass the asistencias
        return view('asistencias/index')
                        ->with('asistencias', $asistencias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/asistencias/create.blade.php)
        return view('asistencias/create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request  $request
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
            return redirect('asistencias/create')
                            ->withErrors($validator);
        } else {
            // store
            $asistencia = new Asistencia;
            $contacto = new Contacto;
            $asistencia->nombre = $request->input('nombre');
            $asistencia->apellido = $request->input('apellido');
            $asistencia->documento = $request->input('documento');
            $contacto->email = $request->input('email');
            $contacto->telefono = $request->input('telefono');

            DB::beginTransaction();
            try {
                $contacto = $contacto->save();
                $asistencia->contacto()->associate($contacto);
                $asistencia = $asistencia->save();
            } catch (\Exception $e) {
                DB::rollback();
                Session::flash('message', 'Inesperadamente, la transaccion fallo');
                throw $e;
            }
            DB::commit();

            // redirect
            Session::flash('success', 'Successfully created asistencia!');
            return redirect('asistencias'); //->with('message', 'Successfully created asistencia!');
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
        // get the asistencia
        $asistencia = Asistencia::findOrFail($id);

        // show the view and pass the asistencia to it
        return view('asistencias.show')
                        ->with('asistencia', $asistencia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the asistencia
        $asistencia = Asistencia::findOrFail($id);

        // show the edit form and pass the asistencia
        return view('asistencias.edit')
                        ->with('asistencia', $asistencia);
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
            return redirect("asistencias/edit/{id}")
                            ->withErrors($validator)
                            ->withInput($request);
        } else {
            // store
            $asistencia = Asistencia::find($id);
            $asistencia->nombre = $request->input('nombre');
            $asistencia->apellido = $request->input('apellido');
            $asistencia->documento = $request->input('documento');
            $asistencia->contacto->email = $request->input('email');
            $asistencia->contacto->telefono = $request->input('telefono');

            DB::beginTransaction();
            try {
                $asistencia->contacto->save();
                $asistencia->save();
            } catch (\Exception $e) {
                DB::rollback();
                Session::flash('message', 'Inesperadamente, la transaccion fallo');
                throw $e;
            }
            DB::commit();

            // redirect
            Session::flash('message', 'Successfully updated asistencia!');
            return redirect('asistencias');
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
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the asistencia!');
        return redirect('asistencias');
    }

}
