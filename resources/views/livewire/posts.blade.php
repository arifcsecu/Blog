<div class="overflow-x-auto bg-white rounded-xl shadow-md p-4">

    @if(session("creation-message"))
        <div class="bg-green-600 p-2 rounded-md mb-3">{{session("creation-message")}}</div>
    @elseif(session("update-message"))
        <div class="bg-blue-600 p-2 rounded-md mb-3">{{session("update-message")}}</div>
    @elseif(session("delete-message"))
        <div class="bg-red-600 p-2 rounded-md mb-3">{{session("delete-message")}}</div>
    @endif



    @if($postUpdate)
        @include('livewire.postUpdate')
    @elseif($postAdd)
        @include('livewire.postCreate')
    @else
        <button class="border border-white p-2 rounded-md bg-blue-500 hover:bg-blue-700 text-white mb-3"
        wire:click="addPost()">Create Post</button>
    @endif

    
    <table class="min-w-full table-auto border-collapse">
        <thead class="bg-gray-100 text-left text-gray-600 uppercase text-sm tracking-wider">
            <tr>
                <th class="px-4 py-3 border-b">ID</th>
                <th class="px-4 py-3 border-b">Title</th>
                <th class="px-4 py-3 border-b">Body</th>
                <th class="px-4 py-3 border-b">Created At</th>
                <th class="px-4 py-3 border-b">Action</th>
            </tr>
        </thead>

        <tbody class="text-gray-700">
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $post->id }}</td>
                    <td class="px-4 py-2 border-b">{{ $post->title }}</td>
                    <td class="px-4 py-2 border-b">{{ $post->body }}</td>
                    <td class="px-4 py-2 border-b">{{ $post->created_at }}</td>
                    <td class="px-4 py-2 border-b">
                        <button class="rounded-md py-1 px-2 m-1 bg-purple-600 hover:bg-purple-800 text-white" wire:click="editPost({{$post->id}})">Edit</button>

                        <button class="rounded-md py-1 px-2 m-1 bg-red-600 hover:bg-red-800 text-white" wire:confirm="Are you sure to remove this blog?" wire:click="delete({{$post->id}})">Delete</button>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-red-500">There is no post!!</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>