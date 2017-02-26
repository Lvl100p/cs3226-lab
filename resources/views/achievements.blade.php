@extends('template')

@section('page-title', 'CS3226 Lab: Achievements')

@section('content-title', 'CS3226 Lab: Achievements')

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
echo Form::label('achievement', 'Achievement') . "\n";
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
echo Form::label('tier', 'Tier') . "\n";
echo '<select name="tier">' . "\n";
for ($i = 1; $i <= $maxPossibleTier; $i++) {
    echo "<option value='$i'";
    if (isset($defaultTier) && $i == $defaultTier) {
        echo ' selected="selected"';
    }
    echo ">$i</option>" . "\n";
}
echo '</select>' . "\n";
echo Form::submit('Get students') . "\n";

echo Form::close() . "\n";

// Display the students with the specified achievement and tier
if (isset($students)) {
    foreach ($students as $student) {
        echo "<a href='/students/$student->id'>$student->name</a>" . "<br>\n";
    }
}

?>

@endsection
