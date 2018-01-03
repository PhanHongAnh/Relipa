@extends('layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('members.create') }}"> Create New Member</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>
        @foreach ($members as $member)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $member->firstname}}</td>
                <td>{{ $member->middlename}}</td>
                <td>{{ $member->lastname}}</td>
                <td>{{ $member->email}}</td>
                <td>{{ $member->phonenumber}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('members.show',$member->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('members.edit',$member->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['members.destroy', $member->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>


    {!! $members->links() !!}
@endsection