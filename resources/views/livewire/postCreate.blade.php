<form wire:submit="storePost" class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md space-y-4 mb-6">
    @csrf

    <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Post Title</label>
        <input type="text" name="title" wire:model="title"
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
               placeholder="Enter post title">
        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="body" class="block text-sm font-medium text-gray-700 mb-1">Post Body</label>
        <textarea name="body" rows="5" wire:model="body"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  placeholder="Write your post..."></textarea>
        @error('body')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="text-right">
        <button class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-900 transition">
            Submit
        </button>

        <button wire:click="cancel" type="button"
                class="bg-red-500 text-white px-5 py-2 rounded-lg hover:bg-red-800 transition">
            Cancel
        </button>
    </div>
</form>
