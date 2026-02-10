import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true
});

// Écouter les événements globaux
if (window.Echo) {
    // Écouter les posts créés
    window.Echo.channel('posts')
        .listen('.post.created', (e) => {
            console.log('Post créé:', e.post);
            
            // Dispatcher l'événement Livewire
            window.Livewire.dispatch('postCreated');
        });
}