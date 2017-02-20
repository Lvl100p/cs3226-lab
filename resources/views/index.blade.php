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
    {{ Html::script('js/parallax.min.js') }}
    {{ Html::script('js/confetti.js') }}
    <script type="text/javascript">
        $('.parallax-container').parallax();
        $('#ranktable').DataTable({
            "dom": "fartp",
            "order": [[ 12, "desc" ]]
        });
        $('#ranktable_filter input').attr("placeholder", "Search here!")
    </script>
@endsection

@section('content')

    <div class="parallax-container" data-parallax="scroll" data-position="top" data-bleed="50" data-natural-width="600"
         data-natural-height="577">
        <div class="parallax-slider">
            <div class="first-prizes" style="position: absolute; top: 225px; left: 1000px;">
                <a class="hint--top hint--always hint--info"
                   aria-label=" Meatball tail andouille shank filet mignon pastrami, &#10;ribeye spare ribs tenderloin chicken."
                   href="#">
                    <img class="avatar" src="https://api.adorable.io/avatars/50/{{$first_prizes[0]->nickname}}.png"/>
                </a>
                <strong><a href="/students/{{$first_prizes[0]->id}}"><span
                                class="student-name">{{$first_prizes[0]->name}}</span></a></strong>
            </div>
            <div class="second-prizes" style="position: absolute; top: 480px; left: 750px;">
                <a class="hint--top hint--always hint--error"
                   aria-label="Pork chop flank jerky corned beef chuck, &#10;cow boudin fatback ground round salami cupim pork loin."
                   href="#">
                    <img class="avatar" src="https://api.adorable.io/avatars/50/{{$second_prizes[0]->nickname}}.png"/>
                </a>
                <strong><a href="/students/{{$second_prizes[0]->id}}"><span
                                class="student-name">{{$second_prizes[0]->name}}</span></a></strong>
            </div>
            <div class="third-prizes" style="position: absolute; top: 400px; left: 1225px;">
                <a class="hint--top hint--always hint--success"
                   aria-label="Drumstick short loin venison, &#10;prosciutto tri-tip doner rump turkey. " href="#">
                    <img class="avatar" src="https://api.adorable.io/avatars/50/{{$third_prizes[0]->nickname}}.png"/>
                </a>
                <strong><a href="/students/{{$third_prizes[0]->id}}"><span
                                class="student-name">{{$third_prizes[0]->name}}</span></a></strong>
            </div>

            <div class="col-md-offset-6 col-md-6" style="position: absolute; top: 150px; left: -150px;">
                <canvas id="world" width="400" height="400"></canvas>
            </div>
            <div class="col-md-offset-6 col-md-6" style="position: absolute; top: 300px">
                <img src="./img/rank.png" alt="top-three"/>
            </div>
            <div class="col-md-offset-6 col-md-6" style="position: absolute; top: 400px; left: -800px;">
                <img src="./img/intro.png" alt="top-three"/>
            </div>

            <div class="intro col-md-4" style="position: absolute; top: 100px; left: 25px; background-color: #00000022;margin: 10px; padding: 20px; border-radius: 5%;">
                <h1>CS3233 Competitive Programming Rank List</h1>
                <p style="text-align: justify;">It will benefit NUS students who want to compete in ACM ICPC, invited high school students who want
                    to compete in IOI (not just for NOI), and NUS students in general who aspire to excel in technical
                    interviews of top IT companies.</p>

                <p style="text-align: justify;">It covers techniques for attacking and solving challenging* computational problems. Fundamental
                    algorithmic solving techniques covered include complete search, divide/reduce/transform and conquer,
                    greedy, dynamic programming, etc. Domain specific techniques like graph, mathematics-related, string
                    processing, and computational geometry will also be covered.</p>
            </div>
        </div>
    </div>
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
                        <a class="hint--top hint--bounce hint--error"
                           aria-label="Pork chop flank jerky corned beef chuck, &#10;cow boudin fatback ground round salami cupim pork loin."
                           href="#">
                            <img class="avatar" src="https://api.adorable.io/avatars/50/1.png"/>
                        </a>
                        <strong><a href="/students/{{$student->id}}"><span
                                        class="student-name">{{$student->name}}</span></a></strong>
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