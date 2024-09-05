<!-- resources/views/components/card.blade.php -->
@props(['route', 'image', 'title', 'description', 'loading' => 'lazy'])

<a href="{{ $route }}" class="block max-w-sm rounded bg-sky-500 p-2 m-2 overflow-hidden shadow-lg transform transition-transform duration-300 hover:scale-105">
    <img class="w-full h-48 object-cover" loading="{{ $loading }}" src="{{ $image }}" alt="Card image">
    <div class="px-4 py-4">
        <div class="font-bold text-xl mb-2">{{ $title }}</div>
        <p class="text-gray-700 text-base description">
            {{ $description }}
        </p>
    </div>
    <div class="px-4 py-2">
        {{ $slot }}
    </div>
</a>

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
