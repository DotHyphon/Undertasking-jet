<?php
$currentDate = new DateTime();
$formattedDate = $currentDate->format('d-m');

?>
<x-app-layout>
    <div class="m-4">
        <h1 class="m-4">Today is: {{$formattedDate}}</h1>
        <x-planner :user="auth()->user()" :canEdit="false" />
    </div>
    
    <!-- Rest of the content -->
</x-app-layout>