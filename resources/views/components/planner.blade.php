        <?php

use Carbon\Carbon;
?>
@props(['user', 'canEdit' => false])

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
{{-- tailwind columns don't work without this link --}}

<div class="w-full">
    <div class="max-w-2xl p-6 bg-white rounded-lg shadow-2xl shadow-gray-500/20">
        <h2 class="block text-xl font-semibold text-gray-900">{{$user->name}}</h2>
        <div class="grid grid-cols-5 mt-4 gap-2 place-items-center">
            @foreach(['Mon', 'Tue', 'Wed', 'Thu', 'Fri'] as $day)
            <div class="w-full shadow px-2">
                @if ($canEdit)
                {{-- <button type="button" id="addTask" class="w-full" onclick="addTask({{$user->id}}, '{{'testTitle'}}', {{$week=Carbon::now()->week()}}, '{{$day}}',)"> --}}
                    <form method="POST" action="/tasks/create">
                        @csrf
                        <input type="hidden" name="day" value="{{$day}}">
                        <input type="hidden" name="week" value="{{Carbon::now()->week()}}">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <input type="text" name="title" placeholder="Task title" required>
                        <button type="submit" id="addTask" class="w-full">Add Task</button>
                    </form>
                    <h1 class="text-center whitespace-nowrap"> {{$day}} &#x25BC;</h1>
                </button>
                @else
                <div class="w-full">
                    <h1 class="text-center whitespace-nowrap"> {{$day}} </h1>
                </div>
                @endif

                @foreach ($user->tasks->filter(function ($task) {
                return Carbon::parse($task->week) === Carbon::now()->week();
                }) as $task)
                <div class="mt-2">
                    <p class="text-sm text-gray-600">{{$task->title}}</p>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</div>

<script type="text/javascript" >

function addTask(user, title, week, day) {
    console.log(user, title, week, day);
    axios.post('/tasks/create', {
        user_id: user,
        title: title,
        week: week,
        day: day,
    }, {
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(function (response) {
        console.log(response);
    })
    .catch(function (error) {
        console.log(error);
    });
}

function test(day) {
    console.log(day);
}

</script>