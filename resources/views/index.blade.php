@extends('template')

@section('page-title', 'CS3226 Lab: Rank List')

@section('content-title', 'CS3226 Lab: Rank List')

@section('stylesheet')
    {{ Html::style('https://cdn.jsdelivr.net/bootstrap.datatables/0.1/css/datatables.css')}}
    {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/hint.css/2.4.1/hint.min.css') }}
    {{ Html::style('css/flags.css')}}
@endsection

@section('script')
    {{ Html::script('https://cdn.datatables.net/1.10.13/js/jquery.dataTables.js') }}
    {{ Html::script('https://cdn.jsdelivr.net/bootstrap.datatables/0.1/js/datatables.js') }}
@endsection

@section('content')
    <section>
        <table id="ranktable" class="table table-hover table-responsive" width="100%" cellspacing="0">
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
                    <td>
                        <span class="rank">{{$student->rank}}</span>
                    </td>
                    <td class="hidden-xs"><i class="flag flag-{{ strtolower($student->flag) }}"></i></td>
                    <td class="hidden-xs">
                        <a class="hint--top hint--bounce hint--error" aria-label="Pork chop flank jerky corned beef chuck, &#10;cow boudin fatback ground round salami cupim pork loin." href="#"><img class="avatar" src="https://api.adorable.io/avatars/50/{{$student->nickname}}.png"/></a>
                        <strong><a href="/students/{{$student->id}}"><span class="student-name">{{$student->name}}</span></a></strong>
                    </td>
                    <td class="visible-xs"><a href="/students/{{$student->id}}">{{$student->nickname}}</a></td>
                    <td class="hidden-xs">
                        <span class="{{$student->mcCss}} score">{{$student->mc}}</span>
                    </td>
                    <td class="hidden-xs">
                        <span class="{{$student->tcCss}} score">{{$student->tc}}</span>
                    </td>
                    <td>
                        <span class="{{$student->speCss}} score">{{$student->spe}}</span>
                    </td>
                    <td class="hidden-xs">
                        <span class="{{$student->hwCss}} score">{{$student->hw}}</span>
                    </td>
                    <td class="hidden-xs">
                        <span class="{{$student->bsCss}} score">{{$student->bs}}</span>
                    </td>
                    <td class="hidden-xs">
                        <span class="{{$student->ksCss}} score">{{$student->ks}}</span>
                    </td>
                    <td class="hidden-xs">
                        <span class="{{$student->acCss}} score">{{$student->ac}}</span>
                    </td>
                    <td>
                        <span class="{{$student->dilCss}} score">{{$student->dil}}</span>
                    </td>
                    <td>
                        <span class="score">{{$student->sum}}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection