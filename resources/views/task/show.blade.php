@extends('layouts.main')
@section('content')
    <div class="flex flex-col items-center justify-center">
        <div>
            <h1>Title of the task: {{ $task->title }}</h1>
            <p>Description: {{ $task->content }}<p>
            <p>Status: @if($task->is_completed)
                           Completed
                @else
                           Not completed yet
            @endif</p>
        </div>


        <div class="flex">
            <div class="p-4">
                <form action="{{ route('tasks.index') }}">
                    <button type="submit"
                            class="p-4 inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                        Back
                    </button>
                </form>
            </div>





            @if($task->trashed())
                <div class="p-4">
                    <form action="{{ route('tasks.restore', $task->id) }}" method="post">
                        @csrf
                        <button type="submit"
                                class="p-4 inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                            Restore
                        </button>
                    </form>
                </div>
            @else
                @if($task->is_completed)
                    <div class="p-4">
                        <form action="{{ route('tasks.toggle', $task->id) }}" method="post">
                            @csrf
                            <button type="submit"
                                    class="p-4 inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                Mark as not completed
                            </button>
                        </form>
                    </div>
                @else
                    <div class="p-4">
                        <form action="{{ route('tasks.toggle', $task->id) }}" method="post">
                            @csrf
                            <button type="submit"
                                    class="p-4 inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                Mark as completed
                            </button>
                        </form>
                    </div>
                @endif


                <div class="p-4">
                    <form action="{{ route('tasks.edit', $task->id) }}">
                        <button type="submit"
                                class="p-4 inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                            Edit
                        </button>
                    </form>
                </div>
            @endif



{{--            --}}
    </div>



    </div>

@endsection
