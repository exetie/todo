@extends('todo::layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-8">

            <div class="container">
                <form action="{{url('todo')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="card">
                        <div class="card-header">
                            Create New Task
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="task" class="col-sm-2 col-form-label">Task</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control {{($errors->has('task'))? 'is-invalid' :'' }}" id="date" name="task"></textarea>
                                @if($errors->has('task'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('task')}}
                                    </div>
                                @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deadline" class="col-sm-2 col-form-label">Deadline</label>
                                <div class="col-sm-10">
                                    <input type="text" name="deadline" class="form-control {{($errors->has('deadline'))? 'is-invalid' :'' }}" id="date" placeholder="Date">
                                    @if($errors->has('deadline'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('deadline')}}
                                    </div>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
