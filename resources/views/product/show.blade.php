@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Product {{ $product->id }}
        <a href="{{ url('product/' . $product->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Product"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['product', $product->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Product',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $product->id }}</td>
                </tr>
                <tr><th> Name </th><td> {{ $product->name }} </td></tr><tr><th> Price </th><td> {{ $product->price }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
