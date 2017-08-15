<?php $statusArr = ['raised','resolved','inactive']; ?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Merge
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('merge') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Status</label>

                            <div class="col-sm-6">
                                <select name="status" id="merge-status" class="form-control">
                                	<option value="">select one</option>
                                	<option>raised</option>
                                	<option>resolved</option>
                                	<option>inactive</option>
                                </select>
                            </div>
                    </div>

					<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Branch</label>

                            <div class="col-sm-6">
                                <select name="branch_id" id="merge-branch" class="form-control" value="{{ old('merge') }}">
                                	<option value="">select one</option>
                                	@if (count($branches) > 0)
                                		@foreach ($branches as $branch)
                                			<option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                		@endforeach
                                	@endif
                                </select>
                            </div>
                        </div>

                        <!-- Add Merge Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" name="add-merge-submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Merge
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($merges) > 0)
            <?php //dd($branches[$merge->branch_id]); ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Branch</th>
                                <th>Status</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($merges as $merge)
                                    <tr>
                                        <td class="table-text"><div>{{ $branches[$merge->branch_id]->name }}</div></td>
                                        <td class="table-text"><div>
                                        <form action="/tasks" method="GET">
                                        {{ csrf_field() }}
                                        	<select class="form-control" onchange="$(this).parent().submit()">
                                        	@foreach($statusArr as $status)
	                                        	
                                    			<option <?php if ($status==$merge->status) echo "selected"; ?>>{{ $status }}</option>
	                                        	
                                        	@endforeach

                                        	</select>
                                        	</form>
                                        </div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{url('merge/' . $merge->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $merge->id }}" class="btn btn-danger">
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
