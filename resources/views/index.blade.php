<!DOCTYPE html>
<html lang="en">
<!--
head
meta
title
link
body
header
style
nav
main
section
table
thead
tr
th
tfoot
td
img
script
small
h1
p
ol
li
div
i
footer
h3
h2
b
hr
a

-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CS3226 Lab</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url(asset('css/main.css')) }}"/>
    <link rel="stylesheet" href="{{ url(asset('css/flags.css')) }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.semanticui.min.css">

</head>
<body class="flex-center position-ref full-height">
<header>
    <h6 class="top-left links">CS3233 Ranklist 2017</h6>
</header>

<nav class="top-right links">
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ url('/help') }}">Help</a>
</nav>

<main>
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
                    <td><img src="blank.gif" class="flag flag-{{ strtolower($student->flag) }}"/> {{$student->flag}}
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
</main>
</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.semanticui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
<script type="text/javascript" src="{{ url(asset('js/main.js')) }}"></script>
</html>
