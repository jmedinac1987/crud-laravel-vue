<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        $tasks = Task::orderBy('id', 'DESC')->paginate(5);               
        $paginate = ['total' => $tasks->total(),
                     'current_page'  => $tasks->currentPage(),
                     'per_page'      => $tasks->perPage(),
                     'last_page'     => $tasks->lastPage(),
                     'from'          => $tasks->firstItem(),
                     'to'            => $tasks->lastItem()];

        return compact('tasks', 'paginate');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //Verifica si el campo keep cumplo que no este vacio
        $this->validate($request, 
        [
            'keep' => 'required'
        ]);

        Task::create($request->all());//crea la tarea en la base de datos

        return;//se puede retornar un mensaje desde aquí pero el mensaje lo creamos de vue para este ejemplo
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //Verifica si el campo keep cumplo que no este vacio
         $this->validate($request, 
         [   
            'keep' => 'required'
         ]);
 
         Task::find($id)->update($request->all()); 
         return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }
}
