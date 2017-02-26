@extends('template')

@section('page-title', 'CS3226 Lab: Student Details')

@section('content-title', 'CS3226 Lab: Student Details')

@section('stylesheet')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.datatables/0.1/css/datatables.css">
@endsection

@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.datatables/0.1/js/datatables.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
<script type="text/javascript" src="{{ url(asset('js/radarChart.js')) }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#ranktable').DataTable();

        radarChart({{$student->mc}}, {{$student->tc}}, {{$student->hw}}, {{$student->bs}}, {{$student->ks}}, {{$student->ac}});

    });

    jQuery('#form-delete').on('submit', function(){
        return confirm("Are you sure you want to delete?");
    });
</script>
@endsection


@section('content')
<section id="summary">
    <h1>{{$student->name}}
        <small>in CS3233 S2 AY 2016/17</small>
    </h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6"><canvas id="radarChart" width="550", height="550"></canvas></div>
            <div class="col-md-6 vcenter" style="height: 500px;">
                <table class="table">
                    <tr>
                        <td><img src="/img/uploads/{{$student->id}}.png" width="200" height="200"/> </td>
                    </tr>
                    <tr>
                        <td>Kattis account</td>
                        <td>{{$student->nickname}}</td>
                    </tr>
                    <tr>
                        <td>SPE(ed) component</td>
                        <td>{{$student->mc}} + {{$student->tc}} = {{$student->spe}}</td>
                    </tr>
                    <tr>
                        <td>DIL(igence) component</td>
                        <td>{{$student->hw}} + {{$student->bs}} + {{$student->ks}} + {{$student->ac}} = {{$student->dil}}</td>
                    </tr>
                    <tr>
                        <td>Sum</td>
                        <td>SPE + DIL = {{$student->spe}} + {{$student->dil}} = {{$student->sum}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>

<p>&nbsp;</p>

<section id="detailed-scores">
    <h2>Detailed Scores</h2>
    <table id="ranktable" class="table table-striped table-responsive" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Component</th>
                <th>Sum</th>
                <th>01</th>
                <th>02</th>
                <th>03</th>
                <th>04</th>
                <th>05</th>
                <th>06</th>
                <th>07</th>
                <th>08</th>
                <th>09</th>
                <th>10</th>
                <th>11</th>
                <th>12</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mini Contests</td>
                <td>4</td>
                <td>4.0</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Team Contests</td>
                <td>0</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Homework</td>
                <td>1</td>
                <td>1.0</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Problem Bs</td>
                <td>1</td>
                <td>1.0</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Kattis Sets</td>
                <td>1</td>
                <td>1.0</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
            </tr>
            <tr>
                <td>Achievements</td>
                <td>4</td>
                <td>1</td>
                <td>1</td>
                <td>2</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td class="negative">x</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </section>

    <p>&nbsp;</p>

    <section id="achievements">
        <h2>Achivements</h2>
        <ol>
            <li>Let it begins</li>
            <li>Quick starter</li>
            <li>Active in class 2/3</li>
        </ol>

    </section>

    <p>&nbsp;</p>

    <section id="comments">
        <h2>Public Comments</h2>

        <div class="bs-callout bs-callout-success">
            <h4>IOI Silver Medalist 2015</h4>
            Own like a pro!
        </div>

        <div class="bs-callout bs-callout-success">
            <h4>ICPC Jakarta 2016 runner-up (TeamTam)</h4>
            Own like a pro!
        </div>

        <div class="bs-callout bs-callout-info">
            <h4>Active in Class</h4>
            <ul>
                <li>Answer 1Q in L1</li>
                <li>Answer 1Q on Week02</li>
            </ul>
        </div>

        <div class="bs-callout bs-callout-danger">
            <h4>Late with HW1 once!</h4>
            Tsk Tsk
        </div>
		
		<div>
		<i>
		Created on
		<?php use Carbon\Carbon; ?>
		<?php setlocale(LC_TIME, 'English');
		echo $student->created_at->formatLocalized('%A %d %B %Y'); ?>
		</i>
		</div>
	
		<div>
		<i>
		Last updated
		<?php 
		echo $student->updated_at->diffForHumans();?>
		</i>
		</div>

    </section>

    @if(\Illuminate\Support\Facades\Auth::check())
        <section id="form">
            {!! Form::model($student, ['action' => ['StudentController@destroy', $student->id], 'method' => 'delete',
            'id'=>'form-delete']) !!}
            <a class="btn btn-warning" href="{{$student->id}}/edit">Edit</a>
            {!! Form::submit('Delete', ['class'=>'btn btn-danger', 'id'=>'btn-delete']) !!}
            {!! Form::close() !!}
        </section>
    @endif

@endsection