@extends('template')

@section('stylesheet')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.semanticui.min.css">
@endsection

@section('script')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.semanticui.min.js"></script>
@endsection

@section('page-title', 'CS3226 Lab: Rank List')

@section('content-title', 'CS3226 Lab: Rank List')

@section('content')
    <section>
        <table id="ranktable" class="ui selectable celled table" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Rank</th>
                <th>Flag</th>
                <th>Name</th>
                <th>MC</th>
                <th>TC</th>
                <th>SPE</th>
                <th>HW</th>
                <th>BS</th>
                <th>KS</th>
                <th>AC</th>
                <th>DIL</th>
                <th>SUM</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Rank</th>
                <th>Flag</th>
                <th>Name</th>
                <th>MC</th>
                <th>TC</th>
                <th>SPE</th>
                <th>HW</th>
                <th>BS</th>
                <th>KS</th>
                <th>AC</th>
                <th>DIL</th>
                <th>SUM</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$student->rank}}</td>
                    <td><img src="#" class="flag flag-{{ strtolower($student->flag) }}"/> {{$student->flag}}
                    </td>
                    <td><a href="/students/1">{{$student->name}}</a></td>
                    <td>{{$student->mc}}</td>
                    <td>{{$student->tc}}</td>
                    <td>{{$student->spe}}</td>
                    <td>{{$student->hw}}</td>
                    <td>{{$student->bs}}</td>
                    <td>{{$student->ks}}</td>
                    <td>{{$student->ac}}</td>
                    <td>{{$student->dil}}</td>
                    <td>{{$student->sum}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection