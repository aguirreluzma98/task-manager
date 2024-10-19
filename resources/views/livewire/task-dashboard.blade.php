<div class="container mx-auto mt-10">
    <form action="{{ route('logout') }}" class="flex" method="POST" class="mb-6">
        @csrf
        <button type="submit" class="text-white ml-auto bg-red-500 py-2 px-4 rounded hover:bg-red-600 transition duration-300 ease-in-out font-medium">
            Log Out
        </button>
    </form>

    <div class="flex justify-between mt-6">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Task Dashboard</h1>
        <div class="flex ml-auto w-auto bg-blue-400 rounded-sm p-4 cursor-pointer text-white" href="/task/create" wire:navigate>
            Create task
        </div>
    </div>

    <div class="flex flex-col w-full h-auto relative">
        @if($tasks->isEmpty())
        <p class="mt-4 text-center text-gray-700">No current tasks</p>
        @else
        <table class="table-auto w-3/4 mx-auto mt-4 bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                    <td class="border px-4 py-2 {{ $task->status === 'completed' ? 'line-through text-gray-500' : '' }}">
                        {{$task->title}}
                    </td>
                    <td class="border px-4 py-2 {{ $task->status === 'completed' ? 'line-through text-gray-500' : '' }}">
                        {{$task->description}}
                    </td>
                    <td class="border px-4 py-2">
                        {{ $task->status === 'in_progress' ? 'In progress' : ($task->status === 'completed' ? 'Completed' : ($task->status === 'pending' ? 'Pending' : ucfirst($task->status))) }}
                    </td>
                    <td class="border px-4 py-2 flex items-center">
                        @if($task->status !== 'completed')
                        <button class="bg-green-500 p-2 rounded-sm text-white hover:bg-green-700 cursor-pointer ml-2 mr-2" wire:click="markAsCompleted('{{ $task->id }}')">Mark as Completed</button>
                        @endif
                        <a class="text-blue-500 hover:text-blue-700 mr-2" href="/task/edit/{{$task->id}}">Edit</a>
                        <p class="text-red-500 hover:text-red-700 cursor-pointer mr-2" wire:click="deleteTask('{{$task->id}}')">Delete</p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>