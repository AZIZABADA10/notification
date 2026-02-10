<div class="p-4 bg-white rounded shadow mt-4">
    <h3 class="font-bold mb-2">🔔 Notifications</h3>

    @forelse($notifications as $notification)
        <div class="border-b py-2 text-sm">
            Nouveau post :
            <b>{{ $notification->data['title'] }}</b>
            par {{ $notification->data['user'] }}
        </div>
    @empty
        <p class="text-gray-500 text-sm">Aucune notification</p>
    @endforelse
</div>
