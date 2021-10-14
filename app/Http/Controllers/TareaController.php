<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTareaRequest;
use App\Http\Requests\UpdateTareaRequest;
use App\Repositories\TareaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TareaController extends AppBaseController
{
    /** @var  TareaRepository */
    private $tareaRepository;

    public function __construct(TareaRepository $tareaRepo)
    {
        $this->tareaRepository = $tareaRepo;
    }

    /**
     * Display a listing of the Tarea.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tareas = $this->tareaRepository->all();

        return view('tareas.index')
            ->with('tareas', $tareas);
    }

    /**
     * Show the form for creating a new Tarea.
     *
     * @return Response
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Store a newly created Tarea in storage.
     *
     * @param CreateTareaRequest $request
     *
     * @return Response
     */
    public function store(CreateTareaRequest $request)
    {

        
        $input = $request->all();

        $formato_cadena = explode(':',$input['tarea']);
        if(count($formato_cadena)>1) {
            $input['item'] = $formato_cadena[0];
            $input['descripcion'] = $formato_cadena[1];
        }else{
            $input['item'] = "secondary";
            $input['descripcion'] = $formato_cadena[0];
        }
        
       


        $tarea = $this->tareaRepository->create($input);

        Flash::success('Tarea saved successfully.');

        return redirect(route('tareas.index'));
    }

    /**
     * Display the specified Tarea.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tarea = $this->tareaRepository->find($id);

        if (empty($tarea)) {
            Flash::error('Tarea not found');

            return redirect(route('tareas.index'));
        }

        return view('tareas.show')->with('tarea', $tarea);
    }

    /**
     * Show the form for editing the specified Tarea.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tarea = $this->tareaRepository->find($id);

        if (empty($tarea)) {
            Flash::error('Tarea not found');

            return redirect(route('tareas.index'));
        }

        return view('tareas.edit')->with('tarea', $tarea);
    }

    /**
     * Update the specified Tarea in storage.
     *
     * @param int $id
     * @param UpdateTareaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTareaRequest $request)
    {
        $tarea = $this->tareaRepository->find($id);

        if (empty($tarea)) {
            Flash::error('Tarea not found');

            return redirect(route('tareas.index'));
        }

        $tarea = $this->tareaRepository->update($request->all(), $id);

        Flash::success('Tarea updated successfully.');

        return redirect(route('tareas.index'));
    }

    /**
     * Remove the specified Tarea from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tarea = $this->tareaRepository->find($id);

        if (empty($tarea)) {
            Flash::error('Tarea not found');

            return redirect(route('tareas.index'));
        }

        $this->tareaRepository->delete($id);

        Flash::success('Tarea deleted successfully.');

        return redirect(route('tareas.index'));
    }
}
