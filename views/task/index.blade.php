@extends('todo::layouts.base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="container">

                @if(Session::get('success'))  
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif 
                
                
                <div class="card">
                    <div class="card-header">
                        Pending Tasks
                    </div>
                    <div class="card-body">
                        @if($tasks->count()>0)
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="75%">Task</th>
                                    <th>Deadline</th>
                                    <th>Done?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task) 
                                <tr>
                                    <td>{{$task->task}}</td>
                                    <td>{{date('d M Y', strtotime($task->deadline))}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#task-{{$task->id}}">
                                            Yes
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="task-{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Task Completed?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure to mark the task as completed?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{url('todo/'.$task->id.'/completed')}}" method="post">
                                                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success btn-sm">Yes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                        @else 
                        <div class="alert alert-warning">No task pending!</div>
                        @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
