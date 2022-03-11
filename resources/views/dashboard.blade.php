<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notes
        </h2>
    </x-slot>

    <div class="container mx-auto py-10">
        <div class="new-todo-form flex column">
            <form action="/tasks" class="contents" method="POST">
                @csrf
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    name="message"
                    placeholder="Go to the grocery"
                >
                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                    <i class="fa fa-plus"></i>
                </button>
            </form>
        </div>
        <ul>
            @foreach($tasks as $task)
                @if($task->is_completed)
                    <li class="flex row items-center justify-between w-full py-1 px-4 my-1 rounded border bg-gray-200 border-gray-300 text-gray-600">
                        <div class="items-center column">
                            <span class="line-through">{{ $task->message }}</span>
                        </div>
                        <span class="py-2 float-right">
                            <a href="/task/{{$task->id}}/restore" class="bg-indigo-400 hover:bg-indigo-500 text-white font-semibold p-0 px-1 border border-indigo-600 rounded inline-block">
                                <i class="fa fa-fw fa-refresh"></i>
                            </a>
                        </span>
                    </li>
                @else
                    <li class="flex row items-center justify-between w-full py-1 px-4 my-1 rounded border bg-gray-200 border-gray-300 text-gray-600">
                        <div class="items-center column">
                            <span>{{ $task->message }}</span>
                        </div>
                        <span class="py-2 float-right">
                            <a href="/task/{{$task->id}}/delete" class="bg-red-400 hover:bg-red-500 text-white font-semibold p-0 px-1 border border-red-600 rounded inline-block">
                                <i class="fa fa-fw fa-times"></i>
                            </a>
                            <a href="/task/{{$task->id}}/complete" class="bg-emerald-400 hover:bg-emerald-500 text-white font-semibold p-0 px-1 border border-emerald-600 rounded inline-block">
                                <i class="fa fa-fw fa-check"></i>
                            </a>
                        </span>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</x-app-layout>
