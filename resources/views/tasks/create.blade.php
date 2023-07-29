<?php
$currentDate = new DateTime();
$formattedDate = $currentDate->format('d-m');

// auth()->user()->tasks()->create([
//     'title' => Faker\Factory::Create()->sentence(),
//     'week' => $currentDate->week(),
//     'day' => $currentDate,
//     'user' => auth()->user()->id,
// ]);
?>
<x-app-layout>
    <div class="m-4">
        <h1 class="m-4">Today is: {{$formattedDate}}</h1>
        <x-planner :user="auth()->user()" :canEdit="true" />
    </div>
    
    <!-- Rest of the content -->
</x-app-layout>