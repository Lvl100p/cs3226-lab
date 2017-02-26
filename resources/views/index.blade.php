@extends('template')

@section('page-title', 'CS3226 Lab: Rank List')

@section('content-title', 'CS3226 Lab: Rank List')

@section('stylesheet')
    {{ Html::style('https://cdn.jsdelivr.net/bootstrap.datatables/0.1/css/datatables.css')}}
    {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/hint.css/2.4.1/hint.min.css') }}
    {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css') }}
    {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.6/select2-bootstrap.min.css') }}
    {{ Html::style('css/flags.css')}}
@endsection

@section('script')
    {{ Html::script('https://cdn.datatables.net/1.10.13/js/jquery.dataTables.js') }}
    {{ Html::script('https://cdn.jsdelivr.net/bootstrap.datatables/0.1/js/datatables.js') }}
    {{ Html::script('https://code.highcharts.com/stock/highstock.js') }}
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') }}
    {{ Html::script('js/highcharts-theme-monokai.js') }}
    {{ Html::script('js/parallax.min.js') }}
    {{ Html::script('js/confetti.js') }}
    {{ Html::script('js/table-sorting.js') }}
    
    <script type="text/javascript">
        $('.intro-parallax-container').parallax();
        $('.chart-parallax-container').parallax();

        $('#ranktable').DataTable({
            "dom": "fartp",
            "order": [[12, "desc"]]
        });
        $('#ranktable_filter input').attr("placeholder", "Search here!")


        var studentCount = 10;
        var seriesOptions = [];
        var seriesCounter=0;


        var studentNames = [
                @foreach($student_names as $student_name)
                "{{$student_name}}",
                @endforeach
        ];


        $.each([1,2,3,4,5,6,7,8,9,10], function(i){

            $.getJSON('http://127.0.0.1:8000/students/' + i + '/weeklySums',    function (data) {

                seriesOptions[i] = {
                    name: studentNames[i],
                    data: data
                };

                // As we're loading the data asynchronously, we don't know what order it will arrive. So
                // we keep a counter and create the chart when all the data is loaded.
                seriesCounter += 1;

                if (seriesCounter === 10) {
                    var chart = createChart(seriesOptions);
                    createChartOptions(chart);
                }
            });
        });

        function createChart(seriesOptions) {

            var chart = Highcharts.stockChart('chart', {

                rangeSelector: {
                    enabled: false
                },

                yAxis: {
                    labels: {
                        formatter: function () {
                            return (this.value > 0 ? ' + ' : '') + this.value;
                        }
                    },
                    plotLines: [{
                        value: 0,
                        width: 2,
                        color: 'silver'
                    }]
                },
                xAxis: {
                    allowDecimals: false,
                    labels: {
                        format: "Week {value}",
                        rotation: -45
                    }
                },

                plotOptions: {
                    series: {
                        compare: 'undefined',
                        showInNavigator: true
                    }
                },

                tooltip: {
                    backgroundColor: "#2a2c31",
                    pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b style="color: {series.color}">{point.y}</b><br/>',
                    headerFormat: '<span style="color:white;">Week {point.x}</span>',
                    valueDecimals: 1,
                    split: true
                },

                series: seriesOptions
            });

            return chart;
        }

        function createChartOptions(chart) {
            $.each(chart.series, function (i, serie) {
                if (serie.name.indexOf('Navigator')) {
                    $('#chart-options').append('<option value="' + i + '">' + serie.name + '</option>')
                }
            });

            $('#chart-options').select2();

            $('select').on('change', function (evt) {
                var selectedSeries = $('#chart-options').select2('val');

                $.each(chart.series, function (i, name) {

                    if (jQuery.inArray(i.toString(), selectedSeries) !== -1 || !chart.series[i].name.indexOf("Navigator")) {
                        // is selected
                        chart.series[i].show();
                    } else {
                        chart.series[i].hide();
                    }
                });
            });

        }

        function getRandomInt(min, max) {
            return Math.round(Math.random() * (max - min) + min);
        }
    </script>
@endsection

@section('content')

    @if (session('status'))
        <p class="alert alert-success alert-dismissable">{{ session('status') }}</p>
    @endif

    @if (Session::has('message'))
        <div class="alert alert-info alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="intro-parallax-container visible-lg" data-parallax="scroll" data-position="top" data-bleed="50"
         data-natural-width="600"
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

            <div class="intro col-md-4"
                 style="position: absolute; top: 100px; left: 25px; background-color: #00000022;margin: 10px; padding: 20px; border-radius: 5%;">
                <h1>CS3233 Competitive Programming Rank List</h1>

                <p style="text-align: justify;">It will benefit NUS students who want to compete in ACM ICPC, invited
                    high school students who want
                    to compete in IOI (not just for NOI), and NUS students in general who aspire to excel in technical
                    interviews of top IT companies.</p>

                <p style="text-align: justify;">It covers techniques for attacking and solving challenging*
                    computational problems. Fundamental
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
                            <img class="avatar visible-lg-inline-block"
                                 src="https://api.adorable.io/avatars/50/{{$student->nickname}}.png"/>
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

    <div class="chart-parallax-container" data-parallax="scroll" data-position="top" data-bleed="550"
         data-natural-width="600"
         data-natural-height="577">
        <div class="parallax-slider">
            <div class="col-md-offset-6 col-md-6" style="position: absolute; top: 150px; left: -150px;">
                <img src="img/chart.png"/>
            </div>
        </div>
    </div>

    <section class="row">
        <div class="col-md-offset-1 col-md-10 col-md-offset-1">
            <select id="chart-options" multiple="multiple"
                    data-placeholder="Filter your result by typing the name of the student..."
                    style="width:100%"></select>
        </div>
        <div id="chart" class="col-md-12"></div>
    </section>
@endsection