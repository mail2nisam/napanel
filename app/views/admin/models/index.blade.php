
@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

@section('keywords')Blogs administration @stop
@section('author')Laravel 4 Bootstrap Starter SIte @stop
@section('description')Blogs administration index @stop

{{-- Content --}}
@section('content')
<div class="page-header">
    <h3>
        {{{ $title }}}

        <div class="pull-right">
            {{ link_to_route('admin.models.create', 'Add New Model', null, array('class' => 'btn btn-lg btn-success')) }}
        </div>
    </h3>
</div>

<table id="blogs" class="table table-striped table-hover">
    <thead>
        <tr>
            <th class="col-md-4">Name</th>
            <th class="col-md-2">category</th>

            <th class="col-md-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($models as $model)
        <tr>
            <td>{{{ $model->name }}}</td>
            <td>{{{ $model->category }}}</td>
            <td>
                {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('models.destroy', $model->id))) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
                {{ link_to_route('models.edit', 'Edit', array($model->id), array('class' => 'btn btn-info')) }}
            </td>
        </tr>
        @endforeach
    </tbody>
   

</table>
<div class="row">
    
    <div class="col-md-12">
        <div class="dataTables_paginate paging_bootstrap">
<?php echo $models->links(); ?>
        </div>
    </div>
</div>
@stop



