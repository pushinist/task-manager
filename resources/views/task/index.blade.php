@extends('layouts.main')
@section('content')

    <div class="flex justify-center items-center ">
        <ul role="list" class="divide-y divide-gray-100">
            @foreach($tasks as $task)
                <li class="flex flex-col justify-between gap-x-6 py-5 items-center rounded-md bg-blue-50 px-2 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="min-w-0 flex-auto justify-center items-center">
                            <p class="text-sm/6 font-semibold text-gray-900"><a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a></p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>

@endsection
