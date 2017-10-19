<?php

namespace App\Http\Controllers;

use App\Event;
use App\Sede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the events
        $events = Event::orderBy('fecha', 'desc')->paginate(20);

        // load the view and pass the events
        return View::make('events/index')
            ->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $sedes = Sede::all();
        // load the create form (app/views/events/create.blade.php)
        return View::make('events/create')->with('sedes', $sedes);
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
            'nombre'       => 'required',
            'descripcion'  => 'required',
            'fecha'        => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
       
        // process the login
        if ($validator->fails()) {
            return Redirect::to('events/create')
                ->withErrors($validator);
                //->withInput(Input::except('password'));
        } else {
            // store
            $event = new Event;
            $event->nombre      = Input::get('nombre');
            $event->descripcion = Input::get('descripcion');
            $event->fecha       = Input::get('fecha');
            $event->save();

            // redirect
            Session::flash('message', 'Successfully created event!');
            return Redirect::to('events');
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
        // get the event
        $event = Event::findOrFail($id);

        // show the view and pass the event to it
        return View::make('events.show')
            ->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the event
        $event = Event::find($id);
        $sedes = Sede::all();

        // show the edit form and pass the event
        return View::make('events.edit')
            ->with('event', $event)
            ->with('sedes', $sedes);
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
            'nombre'       => 'required',
            'descripcion'  => 'required',
            'fecha'        => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('events/create')
                ->withErrors($validator);
                //->withInput(Input::except('password'));
        } else {
            // store
            $event = Event::find($id);
            $event->nombre      = Input::get('nombre');
            $event->descripcion = Input::get('descripcion');
            $event->fecha       = Input::get('fecha');
            $event->save();

            // redirect
            Session::flash('message', 'Successfully updated event!');
            return Redirect::to('events');
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
        $event = Event::findOrFail($id);
        $event->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the event!');
        return Redirect::to('events');
    }
}
