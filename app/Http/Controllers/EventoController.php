<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Sede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EventoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $events = Evento::orderBy('fecha', 'desc')
                ->paginate(20);
        return view('events/index')
                ->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // Deberá escogerse una sede como lugar del evento.
        return view('events/create')
                        ->with('sedes', Sede::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //https://laravel.com/docs/validation
        $rules = array(
            'nombre' => 'required',
            'sede_id' => 'required',
            'fecha' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('events/create')
                            ->withErrors($validator)
                            ->withInput($request->all());
        } else {
            // store
            $event = new Evento;
            $event->nombre = $request->input('nombre');
            $event->descripcion = $request->input('descripcion');
            $event->fecha = $request->input('fecha');
            $event->sede_id = $request->input('sede_id');
            $event->save();

            // redirect
            Session::flash('success', 'El evento se ha creado con éxito!');
            return redirect('events');
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
        // input the event
        $event = Evento::findOrFail($id);

        // show the view and pass the event to it
        return view('events.show')
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
        // input the event
        $event = Evento::findOrFail($id);
        $sedes = Sede::all();

        // show the edit form and pass the event
        return view('events.edit')
                        ->with('event', $event)
                        ->with('sedes', $sedes)
                        ->with('selectedSede', $event->sede);
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
            'fecha' => 'required',
            'sede_id' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        /* Si falla, se redirecciona al usuario a la vista de edicion,
          con los datos originales (no los que ha intentado editar) */
        if ($validator->fails()) {
            return redirect("events/edit/$id")
                            ->withErrors($validator)
                            ->withInput($request->all());
        } else {
            // store
            $event = Evento::find($id);
            $event->nombre = $request->input('nombre');
            $event->descripcion = $request->input('descripcion');
            $event->fecha = $request->input('fecha');
            $event->sede_id = $request->input('sede_id');
            $event->save();

            // redirect
            Session::flash('success', 'Evento editado con éxito!');
            return redirect('events');
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
        $event = Evento::findOrFail($id);
        $event->delete();

        // redirect
        Session::flash('success', 'Evento eliminado con éxito!');
        return redirect('events');
    }

}
