@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{ url('shop') }}" class="btn btn-primary btn-xs" title="Edit Shop"><span
                    class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
        <h1>Add New Products to the Shop {{$shop->name}}</h1>
        <hr/>

        {!! Form::open(['url' => ['/addProduct', $shop->id], 'class' => 'form-horizontal']) !!}


        <div class="form-group ">

            @foreach($temp as $item)
                <div class="col-sm-6">
                    {!! Form::label('{{$item->name}}', 'Product', ['class' => 'col-sm-3 control-label']) !!}
                    <input type="checkbox" name="{{$item->name}}" value="{{$item->id}}">{{$item->name}}

                </div>
            @endforeach
        </div>


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Add Product',['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
        {!! Form::close() !!}

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    </div>
@endsection