@extends('template')

@section('page-title','CS3226 Lab: Create New Student Mode')

@section('content-title','CS3226 Lab: Create New Student Mode')

@section('stylesheet')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.datatables/0.1/css/datatables.css">
@endsection

@section('content')
<section>

<h1>Create New Student</h1>

@if(count($errors) > 0)
<div class="alert alert-danger">
<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif

{!! Form:open(['url' => '/create']) !!}

<div>
echo Form::label('nickname','Nick name');
echo Form::text('nickname');
</div>

<div>
echo Form::label('fullname','Full name');
echo Form::text('fullname');
</div>

<div>
echo Form::label('kattisacc','Kattis account');
echo Form::text('kattisacc');
</div>

<div>
echo Form::label('nationality','Nationality');
echo Form::select('naitonality',['SGP - Singaporean' => 'singaporean', 'CHN - Chinese' => 'chinese', 'VNM - Vietnamese' => 'vietnamese', 'IDN - Indonesian' => 'indonesian', 'OTH - Other Nationality' => 'other'], null, ['placeholder' => 'Select Nationality']);
</div>

<div>
echo Form::submit('create');
</div>

{!! Form:close() !!}
</section>

@endsection