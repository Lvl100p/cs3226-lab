@extends('template')

@section('page-title', trans('lang.Title').':'.trans('lang.Achievements'))

@section('content-title', trans('lang.Title').':'.trans('lang.Achievements'))

@section('content')

<?php

// Display error message from server, if there is any
if (isset($errorMsg)) {
    echo '<div class="alert alert-danger" role="alert">' . $errorMsg . "</div><br>\n";
}

$achievements = App\Achievement::all();
$maxPossibleTier = App\Achievement::max('max_tier');

echo Form::open() . "\n";

// Drop down list of achievements
echo Form::label('achievement', trans('lang.Achievements')) . "\n";
echo '<select name="achievement">' . "\n";
foreach ($achievements as $achievement) {
    echo "<option value='$achievement->id'";
    if (isset($defaultAchv) && $achievement->id == $defaultAchv) {
        echo ' selected="selected"';
    }
    echo ">$achievement->name</option>" . "\n";
}
echo '</select>' . "\n";

// Drop down list of tiers
echo Form::label('tier', trans('lang.Tier')) . "\n";
echo '<select name="tier">' . "\n";
for ($i = 1; $i <= $maxPossibleTier; $i++) {
    echo "<option value='$i'";
    if (isset($defaultTier) && $i == $defaultTier) {
        echo ' selected="selected"';
    }
    echo ">$i</option>" . "\n";
}
echo '</select>' . "\n";
echo Form::submit(trans('lang.GetStudents')) . "\n";

echo Form::close() . "<br><br>\n";

// Display the students with the specified achievement and tier
if (isset($students)) {
    foreach ($students as $student) {
        echo "<a href='/students/$student->id'>$student->name</a>" . "<br>\n";
    }
}

?>

@endsection
