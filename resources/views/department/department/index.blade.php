@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('flash_message'))
            <div class="alert alert-info">{{ Session::get('flash_message') }}</div>
        @endif

        <h1>Department
            @if (!Auth::guest())
                <a href="{{ url('/department/create') }}" class="btn btn-primary btn-xs"
                   title="Add New Department"><span class="glyphicon glyphicon-plus"
                                                    aria-hidden="true"></span></a>
            @endif
        </h1>

        <div class="table">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    @if (!Auth::guest())
                        <th>S.No<a href="{{ url('/departmentList/id') }}" class="btn btn-primary btn-xs"
                                   title="Sort By ID"><span class="glyphicon glyphicon-sort"
                                                            aria-hidden="true"></span></a>
                        </th>
                    @endif
                    <th> Name<a href="{{ url('/departmentList/name') }}" class="btn btn-primary btn-xs"
                                title="Sort By NAME"><span class="glyphicon glyphicon-sort"
                                                           aria-hidden="true"></span></a>
                    </th>
                    <th> Location<a href="{{ url('/departmentList/location') }}" class="btn btn-primary btn-xs"
                                    title="Sort By LOCATION"><span class="glyphicon glyphicon-sort"
                                                                   aria-hidden="true"></span></a>
                    </th>
                    @if (!Auth::guest())
                        <th>Actions</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($department as $item)
                    <tr>
                        @if(!Auth::guest())
                            <td>{{ $item->id }}</td>
                        @endif

                        <td>{{ $item->name }}</td>
                        <td>{{ $item->location }}</td>
                        @if(!Auth::guest())
                            <td>
                                <a href="{{ url('/department/' . $item->id) }}" class="btn btn-success btn-xs"
                                   title="View Department"><span class="glyphicon glyphicon-eye-open"
                                                                 aria-hidden="true"></span></a>
                                <a href="{{ url('/department/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs"
                                   title="Edit Department"><span class="glyphicon glyphicon-pencil"
                                                                 aria-hidden="true"></span></a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/department', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Department" />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-xs',
                                        'title' => 'Delete Department',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                )) !!}
                                {!! Form::close() !!}
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="pagination-wrapper"> {!! $department->links()  !!} </div>
        </div>

    </div>

@endsection
