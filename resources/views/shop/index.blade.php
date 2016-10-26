@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
            {{--<a href="{{ url('shop') }}" class="btn btn-primary btn-xs" title="Edit Shop"><span--}}
                        {{--class="glyphicon glyphicon-backward" aria-hidden="true"></span></a>--}}
        <h1>Shop <a href="{{ url('/shop/create') }}" class="btn btn-primary btn-xs" title="Add New Shop"><span
                        class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
        <div class="table">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th> Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shop as $item)
                    <tr>
                        <td>{{ $loop->iteration }}
                            {{--, {{ $item->id }}--}}
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="{{ url('/shop/' . $item->id) }}" class="btn btn-success btn-xs"
                               title="View Shop"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                            <a href="{{ url('/shop/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs"
                               title="Edit Shop"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                            <a href="{{ url('add/' . $item->id) }}" class="btn btn-primary btn-xs"
                               title="Add Product"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['/shop', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Shop" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Shop',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $shop->render() !!} </div>
        </div>

    </div>
@endsection
