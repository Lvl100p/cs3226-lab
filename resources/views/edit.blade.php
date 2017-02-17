@extends('template')

@section('page-title','CS3226 Lab: Create New Student Mode')

@section('content-title','CS3226 Lab: Create New Student Mode')

@section('stylesheet')

@endsection

@section('script')
    <script>
        //https://regex101.com/r/kFa4ya/1
        $('#mc, #tc, #hw, #bs, #ks, #ac').on('change', function () {
            var mc = parseInt($('#mc').val());
            var tc = parseInt($('#tc').val());
            var hw = parseInt($('#hw').val());
            var bs = parseInt($('#bs').val());
            var ks = parseInt($('#ks').val());
            var ac = parseInt($('#ac').val());

            $('#sum').val(mc + tc + hw + bs + ks + ac);
            $('#scores').val('['+mc+','+tc+','+hw+','+bs+','+ks+','+ac+']');
            $('#scores').trigger('input');
        });

        $('#scores').on('input', function () {
            var regex = /\[(?:\d+(?:\.\d)?(?:, ?)?)+]/g;

            var isPass = regex.test($(this).val());

            if (!isPass) {
                $(this).parent().removeClass('has-success');
                $(this).parent().addClass('has-error');
                $('#scores-icon').removeClass('glyphicon-ok');
                $('#scores-icon').addClass('glyphicon-remove');
            }else{
                $(this).parent().removeClass('has-error');
                $(this).parent().addClass('has-success');
                $('#scores-icon').removeClass('glyphicon-remove');
                $('#scores-icon').addClass('glyphicon-ok');

                var str = $(this).val().substring(1, $(this).val().length -1 );
                var scores = str.split(",");

                $('#mc').val(parseInt(scores[0]));
                $('#tc').val(parseInt(scores[1]));
                $('#hc').val(parseInt(scores[2]));
                $('#bs').val(parseInt(scores[3]));
                $('#ks').val(parseInt(scores[4]));
                $('#ac').val(parseInt(scores[5]));
            }
        });
    </script>

@endsection

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($student, ['action' => ['StudentController@update', $student->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('nickname','Nickname') !!}
                {!! Form::text('nickname', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('name','Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('kattisacc','Kattis account') !!}
                {!! Form::text('kattisacc', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('flag','Nationality'); !!}
                {!! Form::select('flag',['SG' => 'Singaporean', 'CN' => 'Chinese', 'VN' => 'Vietnamese', 'ID' =>
                'Indonesian', 'OTH - Other Nationality' => 'other'],
                null, ['placeholder' => 'Select Nationality', 'class'=>'form-control']); !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('sum','Sum of Scores') !!}
                {!! Form::text('sum', null, ['class' => 'form-control disabled', 'disabled'=>'true']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">


            </div>
            <div class="form-group has-success has-feedback">
                {!! Form::label('scores','Scores') !!}
                {!! Form::text('scores', "[". $student->mc . "," .$student->tc . ",".$student->hw . "," . $student->bs . ",". $student->ks . "," .$student->ac ."]", ['class' => 'form-control']) !!}
                <span id="scores-icon" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('mc','MC') !!}
                {!! Form::selectRange('mc', 0, 10) !!}
                {!! Form::label('tc','TC') !!}
                {!! Form::selectRange('tc', 0, 10) !!}
                {!! Form::label('hw','HW') !!}
                {!! Form::selectRange('hw', 0, 10) !!}
                {!! Form::label('bs','BS') !!}
                {!! Form::selectRange('bs', 0, 10) !!}
                {!! Form::label('ks','KS') !!}
                {!! Form::selectRange('ks', 0, 10) !!}
                {!! Form::label('ac','AC') !!}
                {!! Form::selectRange('ac', 0, 10) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                {!! Form::hidden('cropped-image', '', ['id' => 'cropped-image']) !!}
                {!! Form::label('Image') !!}
                {!! Form::file('image', ['id' => 'image-select', 'onchange' => 'read(this)']) !!}
                <hr/>
                <a id="btn-crop" class="btn btn-default">Crop</a>
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                <hr/>
            </div>
        </div>
        <div class="col-xs-5">
            <img id="preview" class="full-width" src="https://placehold.it/200x200" alt="preview"/>
        </div>
    </div>

    {!! Form::close() !!}
@endsection