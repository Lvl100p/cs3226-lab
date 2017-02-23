@extends('template')

@section('page-title','CS3226 Lab: Edit Scores Mode')

@section('content-title','CS3226 Lab: Edit Scores Mode')

@section('stylesheet')

@endsection

@section('content')
{!! Form::open(['url' => '/scores/edit']) !!}
<div class="row form-inline text-right">
    <div class="form-group ">
        {!! Form::label('type','Score Type'); !!}
        {!! Form::select('type',['mc' => 'Mini Contest', 'tc' => 'Team Contest', 'hw' => 'Homework', 'bs' =>
        'Problem Bs', 'ks' => 'Kattis Sets', 'ac' => 'Achievements'],
        empty($request)? 'mc': $request->type, ['class'=>'form-control']); !!}
    </div>
    <div class="form-group">
        {!! Form::label('week','Week'); !!}
        {!! Form::selectRange('week',1 , 13,
        empty($request)? '1': $request->week, ['class'=>'form-control']); !!}
    </div>
        {!! Form::submit('Get scores!', ['class' => 'btn btn-default']); !!}
</div>
{!! Form::close() !!}

<div class="row">
    <table class="table table-striped table-responsive">
        <thead>
            <th>Student Name</th>
            <th>Score</th>
        </thead>
        @if(!empty($scores))
        <tbody>
            @foreach($scores as $score)
            <tr>
                <td>{{  $score->name  }}</td>
                <td>{!!  Form::selectRange('score', 0, 4, isset($score->score)? $score->score : null, ['class' => 'form-control', 'placeholder' => 'Empty'])  !!}</td>
            </tr>
            @endforeach
        </tbody>
        @endif  
    </table>
</div>

<div class="row text-center">
    {{  Form::submit("Save Scores", ['class' => 'btn btn-primary'])  }}
</div>

@endsection