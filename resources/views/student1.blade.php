<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CS3226 Lab</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url(asset('css/main.css')) }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.semanticui.min.css">

</head>
<body class="center position-ref full-height">
<header>
    <h6 class="top-left links">CS3233 Ranklist 2017</h6>
</header>

<nav class="top-right links">
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ url('/help') }}">Help</a>
</nav>

<main>
    <section id="summary">
        <h1>{{$student->name}}
            <small>in CS3233 S2 AY 2016/17</small>
        </h1>

        <table class="ui table form">
            <tr>
                <td>Kattis account</td>
                <td>aguss787</td>
            </tr>
            <tr>
                <td>SPE(ed) component</td>
                <td>4 + 0 = 4</td>
            </tr>
            <tr>
                <td>DIL(igence) component</td>
                <td>1 + 1 + 1 + 4 = 7</td>
            </tr>
            <tr>
                <td>Sum</td>
                <td>SPE + DIL = 4 + 7 = 11</td>
            </tr>
        </table>
    </section>

    <p>&nbsp;</p>

    <section id="detailed-scores">
        <h2>Detailed Scores</h2>
        <table id="ranktable" class="ui selectable celled table" width="100%" cellspacing="0">
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
        <div class="ui positive icon message">
            <i class="trophy icon"></i>
            <div class="content">
                <div class="header">
                    IOI Silver Medalist 2015
                </div>
                <p>Own like a pro!</p>
            </div>
        </div>

        <div class="ui positive icon message">
            <i class="trophy icon"></i>
            <div class="content">
                <div class="header">
                    ICPC Jakarta 2016 runner-up (TeamTam)
                </div>
                <p>Own like a pro!</p>
            </div>
        </div>

        <div class="ui icon message">
            <i class="idea icon"></i>
            <div class="content">
                <div class="header">
                    Active in Class
                </div>
                <ul>
                    <li>Answer 1Q in L1</li>
                    <li>Answer 1Q on Week02</li>
                </ul>
            </div>
        </div>

        <div class="ui negative icon message">
            <i class="wait icon"></i>
            <div class="content">
                <div class="header">
                    Late with HW1 once!
                </div>
                <p>Tsk Tsk</p>
            </div>
        </div>

    </section>

    <p>&nbsp;</p>

    <hr/>

    <footer class="center">
        Copyright @ 2017 kfwong
    </footer>
</main>
</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.semanticui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#ranktable').DataTable();
    });
</script>
</html>