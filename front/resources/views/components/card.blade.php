<div class="max-w-sm rounded bg-sky-500 p-2 m-2 overflow-hidden shadow-lg">
    <img class="w-full h-48 object-cover" loading="{{ $loading ?? 'eager' }}" src="{{ $image }}" alt="Card image">
    <div class="px-4 py-4">
        <div class="font-bold text-xl mb-2">{{ $title }}</div>
        <p class="text-gray-700 text-base description">
            {{ $description }}
        </p>
    </div>
    <div class="px-4 py-2">
        {{ $slot }}
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const descriptionElements = document.querySelectorAll('.description');
        descriptionElements.forEach(element => {
            let text = element.textContent;
            if (text.length > 80) {
                element.textContent = text.slice(0, 80) + '...';
            }
        });
    });
</script>
