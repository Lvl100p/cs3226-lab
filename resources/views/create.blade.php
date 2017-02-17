@extends('template')

@section('page-title','CS3226 Lab: Create New Student Mode')

@section('content-title','CS3226 Lab: Create New Student Mode')

@section('stylesheet')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css"/>
    <style>
        img {
            max-width: 100%;
        }
    </style>
@endsection

@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.js"></script>
    <script>
        function read(data) {
            if (data.files && data.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    //$('#preview').attr('src', e.target.result);
                    $.fn.cropper.setDefaults({
                        viewMode: 2,
                        aspectRatio: 1,
                        autoCropArea: 1,
                        dragMode: 'move',
                        restore: false,
                        guides: false,
                        highlight: false,
                        cropBoxMovable: false,
                        cropBoxResizable: false
                    });

                    $('#preview').cropper('replace', e.target.result);
                };

                reader.readAsDataURL(data.files[0]);
            }
        }

        $("#btn-crop").on('click', function () {

            var croppedCanvas = $('#preview').cropper('getCroppedCanvas');

            $('#preview').cropper('replace', croppedCanvas.toDataURL("image/png"));

            $('#cropped-image').val(croppedCanvas.toDataURL());
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

    {!! Form::open(['url' => 'students', 'files' => 'true']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('nickname','Nickname') !!}
                {!! Form::text('nickname', '', ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('fullname','Fullname') !!}
                {!! Form::text('fullname', '', ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('kattisacc','Kattis account') !!}
                {!! Form::text('kattisacc', '', ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('nationality','Nationality'); !!}
                {!! Form::select('nationality',['SG' => 'Singaporean', 'CN' => 'Chinese', 'VN' => 'Vietnamese', 'ID' => 'Indonesian', 'OTH - Other Nationality' => 'other'],
                null, ['placeholder' => 'Select Nationality', 'class'=>'form-control']); !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                {!! Form::hidden('cropped_image', '', ['id' => 'cropped-image']) !!}
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