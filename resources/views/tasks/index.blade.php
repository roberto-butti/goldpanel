@extends('layouts.admin_template')

@section('content')
    <div class="container">
        <div class=" col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="/task" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- Task Status -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-6">
                                @foreach (App\Task::$vStatus as $key => $stat)
                                <label class="radio-inline">
                                  {{ Form::radio('status', $key, $key==App\Task::STATUS_TODO) }} {{ $stat }}
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Task Deadline -->
                        <div class="form-group">
                            <label for="task-deadline" class="col-sm-3 control-label">Deadline</label>

                            <div class=" col-sm-6" id="datepickerz">
                            <input type="datetime" name="deadline" class="form-control">

                            </div>
                            <!--
                            <div id="date-deadline" class="col-sm-6">
                                <input type="text" name="deadline" id="task-deadline" class="form-control" value="{{ old('task') }}">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            -->
                        </div>
                        <script type="text/javascript">


                        </script>

                        <!-- Task Note -->
                        <div class="form-group">
                            <label for="task-note" class="col-sm-3 control-label">Note</label>
                            <div class="col-sm-6">
                                <textarea name="note" id="task-note" class="form-control" rows="3">{{ old('task') }}</textarea>
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-hover task-table">
                            <thead>
                                <th>Task</th>
                                <th>Deadline</th>
                                <th>Status</th>

                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    @if ($task->status == "done")
                                    <tr class="success">
                                    @elseif ($task->status == "doing")
                                    <tr class="info">
                                    @else
                                    <tr>
                                    @endif
                                        <td class="table-text"><div>{{ $task->name }}</div></td>
                                        <td class="table-text"><div>{{ $task->deadline }}</div></td>
                                        <td class="table-text"><div>{{ $task->status }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="/task/{{ $task->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
