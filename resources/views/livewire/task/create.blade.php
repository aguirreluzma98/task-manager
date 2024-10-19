<div class="w-full flex flex-col relative">
    <a href="/dashboard" class="text-blue-500 underline hover:text-blue-700 transition duration-300 ease-in-out mb-6">
        Go back to dashboard
    </a>
    <div class="flex flex-col w-full max-w-lg mt-12 mx-auto bg-white p-8 border border-gray-200 rounded-lg shadow-md">
        <div class="flex flex-col mb-4">
            <label for="title" class="text-lg font-medium text-gray-700 mb-2">Title:</label>
            <input type="text" name="title" wire:model="title" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-800" />
            @error('title')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col mb-4">
            <label for="description" class="text-lg font-medium text-gray-700 mb-2">Description:</label>
            <input type="text" name="description" wire:model="description" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-800" />
            @error('description')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col mb-4">
            <label for="status" class="text-lg font-medium text-gray-700 mb-2">Status:</label>
            <select name="status" id="status" wire:model="status" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-800">
                <option value="" disabled selected>Select a status</option>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="verification">Verification</option>
                <option value="completed">Completed</option>
            </select>

            @error('status')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button wire:click="save" class="w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition duration-300 ease-in-out font-medium">
            Save
        </button>
    </div>
</div>