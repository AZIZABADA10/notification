<div class="p-4 bg-white shadow rounded">

    <form wire:submit.prevent="save">

        <input
            type="text"
            wire:model="title"
            placeholder="Titre"
            class="w-full mb-2 p-2 border rounded"
        >

        <textarea
            wire:model="content"
            placeholder="Contenu"
            class="w-full mb-2 p-2 border rounded"
        ></textarea>

        <button
            type="submit"
            class="bg-blue-500 text-black px-4 py-2 rounded"
        >
            Publier
        </button>

    </form>

</div>
