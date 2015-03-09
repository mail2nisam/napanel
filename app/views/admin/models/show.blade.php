@extends('layouts.scaffold')

@section('main')

<h1>Show Model</h1>

<p>{{ link_to_route('models.index', 'Return to All models', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
				<th>Category</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
