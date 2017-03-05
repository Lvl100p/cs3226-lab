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

@if(isset($message))
<div class="row">
    <h3>Message - {{$message->student->name}} <small>{{ isset($message->updated_at)? "Updated " . $message->updated_at->diffForHumans() : "[New]" }}</small></h3>
    {!! Form::model($message, ['action' => ['MessageController@update', $message->student_id], 'method' => 'put']) !!}

    {!! Form::textarea('message', null, ['class'=>'form-control']) !!}
    
    <div class="text-center">
        {!! Form::submit('Send Message', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close()!!}
</div>
@endif
@endsection
