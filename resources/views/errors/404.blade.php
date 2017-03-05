@extends('template')

@section('page-title', 'CS3226 Lab: Page Not Found')

@section('content-title', 'CS3226 Lab: Page Not Found')

@section('stylesheet')

@endsection

@section('script')

@endsection

@section('content')

    <p style="text-align: center; font-size: 36px;">&lt;404 World Not Found&gt;</p>

    <div style="display: flex; align-items: center; justify-content: center;">
        <img src="/img/404.png" alt="404 page not found"/>
    </div>

    <p style="text-align: center; font-size: 20px; margin-top: 36px;"><a href="/">Back to the pipe?</a></p>

    <div style="display: flex; align-items: center; justify-content: center;">
        <a href="/"><img src="/img/pipe.png" alt="404 page not found" width="200" height="200"/></a>
    </div>
@endsection