<div class="max-w-2xl w-full text-center">
    <p class="text-gray-300 max-w-xl mx-auto mb-8 text-lg">
        With Pyre, you can send messages using short-lived, one-time links that burn away
        after an hour or as soon as they’re viewed.
    </p>

    <form wire:submit.prevent="generateLink" class="space-y-4">
        <textarea wire:model="message" rows="4"
            class="w-full p-3 rounded-xl bg-gray-900/60 border border-gray-700 focus:ring-2 focus:ring-orange-400 focus:outline-none text-white placeholder-gray-400 resize-none"
            placeholder="Get started by typing your message here..."></textarea>

        <button type="submit"
            class="mt-3 w-full py-3 rounded-full bg-gradient-to-r from-orange-400 to-orange-600 font-semibold text-lg hover:opacity-90 transition-all">

            <span wire:loading.class.remove="hidden" class="hidden">Loading...</span>
            <span wire:loading.class="hidden">Generate Link</span>
        </button>
    </form>

    @if ($generatedLink)
        <div class="mt-6 bg-gray-800 p-4 rounded-xl">
            <p class="text-sm text-gray-400 mb-2">Your secret link:</p>
            <div class="flex items-center justify-between bg-gray-900 p-2 rounded">
                <a wire:navigate href="{{ $generatedLink }}" id="secretLink"
                    class="text-orange-400 truncate hover:underline flex-1 text-left">
                    {{ $generatedLink }}
                </a>
                <button wire:click="copyLink"
                    class="ml-3 px-3 py-1 bg-gray-700 rounded hover:bg-orange-600 transition">Copy</button>
            </div>
        </div>
    @endif

    {{-- Script untuk copy link dan notify --}}
    <script>
        // Event Livewire ketika link berhasil dibuat
        document.addEventListener('livewire:load', () => {
            Livewire.on('linkGenerated', () => {
                new Notify({
                    title: 'Success!',
                    text: 'Link generated successfully!',
                    status: 'success'
                });
            });
        });

        function copyLink() {
            const link = document.getElementById('secretLink').getAttribute('href');
            navigator.clipboard.writeText(link)
                .then(() => {
                    new Notify({
                        title: 'Success!',
                        text: 'Link copied to clipboard!',
                        status: 'success'
                    });
                })
                .catch(err => {
                    new Notify({
                        title: 'Error!',
                        text: 'Failed to copy: ' + err,
                        status: 'error'
                    });
                });
        }
    </script>
</div>
