<?php

namespace App\Http\Controllers;

use App\Asistente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AsistentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the asistentes
        $asistentes = Asistente::orderBy('apellido')->orderBy('nombre')->paginate(20);

        // load the view and pass the asistentes
        return View::make('asistentes/index')
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
        return View::make('asistentes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nombre'    => 'required',
            'apellido'  => 'required',
            'documento' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
       
        // process the login
        if ($validator->fails()) {
            return Redirect::to('asistentes/create')
                ->withErrors($validator);
                //->withInput(Input::except('password'));
        } else {
            // store
            $asistente = new Asistente;
            $asistente->nombre      = Input::get('nombre');
            $asistente->apellido 	= Input::get('apellido');
            $asistente->documento 	= Input::get('documento');
            $asistente->save();

            // redirect
            Session::flash('message', 'Successfully created asistente!');
            return Redirect::to('asistentes');
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
        return View::make('asistentes.show')
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
        $asistente = Asistente::find($id);

        // show the edit form and pass the asistente
        return View::make('asistentes.edit')->with('asistente', $asistente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nombre'    => 'required',
            'apellido'	=> 'required',
            'documento' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('asistentes/create')
                ->withErrors($validator);
                //->withInput(Input::except('password'));
        } else {
            // store
            $asistente = Asistente::find($id);
            $asistente->nombre      = Input::get('nombre');
            $asistente->apellido = Input::get('apellido');
            $asistente->documento       = Input::get('documento');
            $asistente->save();

            // redirect
            Session::flash('message', 'Successfully updated asistente!');
            return Redirect::to('asistentes');
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
        return Redirect::to('asistentes');
    }
}