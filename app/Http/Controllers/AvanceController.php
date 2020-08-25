<?php

namespace App\Http\Controllers;

use App\Avance;
use App\Evidencia;
use App\Http\Requests\SaveAvanceRequest;
use App\Http\Requests\SaveEvidenciaRequest;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Http\Request;

class AvanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('avanceOperations.create', [
            'avance' => new Avance,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SaveAvanceRequest $request
     * @param SaveEvidenciaRequest $evidenciaRequest
     * @return \Illuminate\Http\Response
     */
    public function store(SaveAvanceRequest $request, SaveEvidenciaRequest $evidenciaRequest)
    {
        $avance = null;

        $avance = Avance::create([
            'nombre' => request('name'),
            'descripcion' => request('descripcion'),
            'user_id' => request('user_id'),
            'bitacora_id' => request('bita_id')
        ], $request->validated());

        if (request('archivo') !== null) {
            Evidencia::create([
                'name_evid' => request('name_evid'),
                'ubi_archivo' => request('archivo')->store('public'),
                'name_alumno' => request('name'),
                'avance_id' => $avance->id
            ], $evidenciaRequest->validated());
        }

        return view('home');
    }

    //TODO: IMPLEMENTAR LA DESCARGA DE EVIDENCIAS
    public function getDownload(Evidencia $evidencia)
    {
        //PDF file is stored under project/public/ashjaks.pdf


        $file = storage_path('app/'.$evidencia->ubi_archivo);;

        $headers = array(
            'Content-Type: .*',
        );

        return response()->download($file,'', $headers);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
