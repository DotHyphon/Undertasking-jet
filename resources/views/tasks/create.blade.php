<?php
$currentDate = new DateTime();
$formattedDate = $currentDate->format('d-m');

// auth()->user()->tasks()->create([
//     'title' => Faker\Factory::Create()->sentence(),
//     'date' => $currentDate,
//     'user' => auth()->user()->id,
// ]);
?>
<x-app-layout>
    <h1>Today is: {{$formattedDate}}</h1>
    <x-planner :user="auth()->user()" />
    
    <!-- Rest of the content -->
</x-app-layout>