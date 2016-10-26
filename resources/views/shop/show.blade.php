@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <a href="{{ url('shop') }}" class="btn btn-primary btn-xs" title="Edit Shop"><span
                    class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
        <h1>Shop {{ $shop->id }}
            <a href="{{ url('shop/' . $shop->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Shop"><span
                        class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            {!! Form::open([
                'method'=>'DELETE',
                'url' => ['shop', $shop->id],
                'style' => 'display:inline'
            ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Shop',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
            {!! Form::close() !!}
        </h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $shop->id }}</td>
                </tr>
                <tr>
                    <th> Name</th>
                    <td> {{ $shop->name }} </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>

                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach($shop->products as $item)
                    <tbody>
                    <tr>

                        <td>{{ $item->name }}</td>
                        <td> {{ $item->price }} </td>
                        <td>{!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['delete', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                            <input type="hidden" name="shopId" value="{{$shop->id}}">
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Shop" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Shop',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                            {!! Form::close() !!}</td>
                    </tr>

                    </tbody>
                @endforeach
            </table>
        </div>

    </div>
@endsection
