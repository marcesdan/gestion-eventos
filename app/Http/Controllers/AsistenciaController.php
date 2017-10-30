<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Asistente;
use App\Evento;

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
        $asistencias = DB::table('asistente')
                ->join('asistente_evento','asistente.id','=','asistente_id')
                ->join('evento','evento_id','=','evento.id')
                ->join('sede','sede_id','=','sede.id')
                ->orderBy('evento.fecha', 'desc')
                ->select('asistente.id as', 'asistente.nombre','asistente.apellido',
                        'evento.id', 'evento.nombre', 'evento.fecha', 'sede.nombre')
                ->get()->paginate(20);
                
        // load the view and pass the asistencias
        return view('asistencias/index')
                        ->with('asistencias', $asistencias);
    }
    
    public function indexEvento($evento_id)
    {
        $evento = Evento::find($evento_id);
        // get all the asistencias     
        $asistencias = $evento->asistentes()->paginate(20);
        // load the view and pass the asistencias
        return view('asistencias/index')
                        ->with('asistencias', $asistencias)
                        ->with('evento', $evento);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($evento)
    {
        // load the create form (app/views/asistencias/create.blade.php)
        return view('asistencias/create')
                        ->with('evento', $evento);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, $evento_id)
    {
        // validate
        $rules = array(
            'documento' => 'required|numeric|digits_between:7,8'
        );

        $validator = Validator::make($request->all(), $rules);

        // process the store
        if ($validator->fails()) {
            return redirect('asistencias/create')
                            ->withErrors($validator)
                            ->with('event', $evento_id);
        } else {
            $asistente = Asistente
                    ::where('documento', '=', $request->input('documento'))
                    ->first();
            $asistente->eventos()->attach($evento_id);
            
            // redirect
            Session::flash('success', 'Successfully created asistencia!');
            return redirect('events');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($asistente_id, $evento_id)
    {
        $asistente = Asistente::find($asistente_id);
        $asistente->eventos()->detach($evento_id);
        
        // DB::table('asistente_evento')->where("$asistente_id", '=', "$evento_id")->delete();
        
        // redirect
        Session::flash('message', 'Successfully deleted the asistencia!');
        return redirect("asistencias/$evento_id");
    }

}
