@extends('app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">

        <!-- New Task Form -->
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <div class='container'>
              <div class='row'>
                <label for="task" class="col-sm-5 control-label">Task</label>

                <div class="col-sm-2">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>

                <div class="col-sm-5">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
              </div>
            </div>
        </form>
    </div>

    <div class=" container text-center">
        <div class="row">
          <div class="col-md-6">
            <h4>Pending Tasks</h4>

          <ul class="list-group" id="undoneList">


            @foreach ($tasks['undonetasks'] as $task)

 <li class="list-group-item"> {{$task->name}} <button type="button" class="btn btn-default"  id='{{$task->id}}' onclick="done({{ $task->id }})" ><span class="glyphicon glyphicon-ok"></span></button> </li>

            @endforeach
        </ul>
      </div>
    <div class="col-md-6">
      <h4>Done Tasks</h4>
        <ul class="list-group" id='doneList'>

          @foreach ($tasks['donetasks'] as $task)
              <li class="list-group-item"> {{$task->name}} <button type="button" class="btn btn-danger" id='{{$task->id}}' onclick="undone({{ $task->id }})"><span class="glyphicon glyphicon-arrow-left"></span></button> </li>
          @endforeach
      </ul>
    </div>
  </div>
</div>


@endsection
