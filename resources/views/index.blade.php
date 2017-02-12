@extends('template')

@section('page-title', 'CS3226 Lab: Rank List')

@section('content-title', 'CS3226 Lab: Rank List')

@section('stylesheet')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.datatables/0.1/css/datatables.css">
@endsection

@section('script')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.datatables/0.1/js/datatables.js"></script>
    <script type="text/javascript" src="{{ url(asset('js/all.js')) }}"></script>
@endsection

@section('content')
    <section>
        <table id="ranktable" class="table table-striped table-responsive" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Rank</th>
                <th class="hidden-xs">Flag</th>
                <th class="hidden-xs">Name</th>
                <th class="visible-xs">Nickname</th>
                <th class="hidden-xs">MC</th>
                <th class="hidden-xs">TC</th>
                <th>SPE</th>
                <th class="hidden-xs">HW</th>
                <th class="hidden-xs">BS</th>
                <th class="hidden-xs">KS</th>
                <th class="hidden-xs">AC</th>
                <th>DIL</th>
                <th>SUM</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr class="{{$student->sumCss}}">
                    <td>{{$student->rank}}</td>
                    <td class="hidden-xs"><img src="#" class="flag flag-{{ strtolower($student->flag) }}"/> {{$student->flag}}</td>
                    <td class="hidden-xs"><a href="/students/{{$student->id}}">{{$student->name}}</a></td>
                    <td class="visible-xs"><a href="/students/{{$student->id}}">{{$student->nickname}}</a></td>
                    <td class="{{$student->mcCss}} hidden-xs">{{$student->mc}}</td>
                    <td class="{{$student->tcCss}} hidden-xs">{{$student->tc}}</td>
                    <td class="{{$student->speCss}}">{{$student->spe}}</td>
                    <td class="{{$student->hwCss}} hidden-xs">{{$student->hw}}</td>
                    <td class="{{$student->bsCss}} hidden-xs">{{$student->bs}}</td>
                    <td class="{{$student->ksCss}} hidden-xs">{{$student->ks}}</td>
                    <td class="{{$student->acCss}} hidden-xs">{{$student->ac}}</td>
                    <td class="{{$student->dilCss}}">{{$student->dil}}</td>
                    <td>{{$student->sum}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection