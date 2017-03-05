@extends('template')

@section('page-title', 'CS3226 Lab: Message')

@section('content-title', 'CS3226 Lab: Message')

@section('content')

@if (Session::has('msg'))
<div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    {{ Session::get('msg') }}
</div>
@endif

@if(isset($messages))

<div class="row">
    <h3>Messages</h3>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Student</th>
                <th>Message</th>
                <th>Reply</th>
                <th>Delete</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
            <tr>
                <td>{{ $message->student->name }}</td>
                <td>{{ $message->message }}</td>
                <td><a href="/messages/{{$message->student->id}}">Reply</a></td>
                <td>
                {!! Form::model($message, ['action' => ['MessageController@destroy', $message->student->id], 'method' =>'delete']) !!}

                {!! Form::submit('Delete', ['class'=>'btn btn-danger', 'id'=>'btn-delete']) !!}

                {!! Form::close() !!}
                </td>
                <td>{{ $message->updated_at->diffForHumans() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="row">
    No messages found.
</div>
@endif
@endsection
