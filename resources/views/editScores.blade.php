@extends('template')

@section('page-title','CS3226 Lab: Edit Scores Mode')

@section('content-title','CS3226 Lab: Edit Scores Mode')

@section('stylesheet')

@endsection

@section('content')
<div class="row form-inline text-right">
    <div class="form-group ">
        {!! Form::label('type','Score Type'); !!}
        {!! Form::select('type',['mc' => 'Mini Contest', 'tc' => 'Team Contest', 'hw' => 'Homework', 'bs' =>
        'Problem Bs', 'ks' => 'Kattis Sets', 'ac' => 'Achievements'],
        null, ['class'=>'form-control']); !!}
    </div>
    <div class="form-group">
        {!! Form::label('week','Week'); !!}
        {!! Form::selectRange('week',1 , 13,
        null, ['class'=>'form-control']); !!}
    </div>
</div>


@if(!empty($scores))
<div class="row">
    <table class="table table-striped table-responsive">
        <thead>
            <th>Student Name</th>
            <th>Score</th>
        </thead>
        <tbody>
            @foreach($scores as $score)
            <tr>
                <td>{{  $score->name  }}</td>
                <td>{!!  Form::selectRange('score', 0, 4, $score->score, ['class' => 'form-control'])  !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
<div class="row text-center">
    {{  Form::submit("Save Scores", ['class' => 'btn btn-primary'])  }}
</div>

@endsection