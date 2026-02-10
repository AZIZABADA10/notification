<div class="mt-4">
    @foreach($posts as $post)
        <div class="p-3 mb-3 bg-white shadow rounded">
            <h3 class="font-bold">{{ $post->title }}</h3>
            <p class="text-sm">{{ $post->content }}</p>
            <small class="text-gray-500">
                Par {{ $post->user->name }}
            </small>
        </div>
    @endforeach
</div>
