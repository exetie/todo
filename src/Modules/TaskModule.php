<?php

namespace Tareque\Todo\Modules;

use Tareque\Todo\Models\Task;

/**
 * Description of TodoModule
 *
 * @author hasan
 */
class TaskModule {

    //put your code here

    public function pending() {
        return Task::where('status', 1)->orderBy('deadline', 'desc')->get();
    }

    public function store($request) {

        $task = array(
            'task' => $request->get('task'),
            'deadline' => ''
        );

        return Task::create($task);
    }

    public function markCompleted($task_id) {
        return Task::where('id', $task_id)->update(array('status' => 2));
    }

}
