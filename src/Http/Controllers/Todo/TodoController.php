<?php

namespace Tareque\Todo\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Tareque\Todo\Http\Requests\StoreTaskRequest;
//use Tareque\Todo\Http\Requests\UpdateTaskRequest;

use Tareque\Todo\Modules\TaskModule;

class TodoController extends Controller
{
    private $task; 
    
    public function __construct(TaskModule $task) {
        $this->task = $task;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->task->pending();
        return view('todo::task.index', array('tasks' => $tasks));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo::task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $task = $this->task->store($request);
        
        if($task){
            return redirect('tasks/'.$task->id)->with('success', 'success');
        }
        
        return redirect()->back()->with('error', 'error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       echo 'id: '.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 'edit: '.$id;
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
        echo $id;
        echo '>>>>>><br/>';
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
    }
    
    /**
     * todo
     */
    public function completed($task_id){
       
        
        $completed = $this->task->markCompleted($task_id);
        
        if($completed){
            return redirect('todo')->with('success', 'success');
        }
        
        return redirect()->back()->with('error', 'error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo '>>>'.$id;
    }
}
