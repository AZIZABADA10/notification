<div class="p-4 border-b">
    <h3 class="font-bold mb-2">Notifications</h3>

    @forelse($notifications as $notif)
        <div class="mb-2 p-2 border rounded bg-gray-100 flex justify-between items-center">
            <div>
                <strong>{{ $notif->data['user'] }}</strong> posted: {{ $notif->data['title'] }}
            </div>
            <button wire:click="markAsRead('{{ $notif->id }}')"
                class="text-xs text-blue-500">Mark as read</button>
        </div>
    @empty
        <p class="text-gray-500 text-sm">No notifications</p>
    @endforelse
</div>
