@props(['route', 'image', 'title', 'description', 'source', 'publishedAt', 'newsData', 'relatedNews'])

<form action="{{ $route }}" method="POST" class="news-form">
    @csrf
    <input type="hidden" name="newsData" value="{{ json_encode($newsData) }}">
    <input type="hidden" name="relatedNews" class="related-news-input" value="{{ $relatedNews }}">

    <button type="submit"
        class="block max-w-sm rounded bg-gray-100 p-2 m-2 overflow-hidden shadow-lg transform transition-transform duration-300 hover:scale-105">
        <img class="w-full h-48 object-cover" loading="lazy" src="{{ $image }}" alt="Card image">
        <div class="px-4 py-4">
            <div class="font-bold text-xl mb-2">{{ $title }}</div>
            <p class="text-gray-700 text-base description">
                {{ $description }}
            </p>
        </div>
        <div class="px-4 py-2">
            @if ($source != null)
                <span
                    class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    {{ $source }}
                </span>
            @endif
            <span class="inline-block bg-violet-500 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">
                {{ \Carbon\Carbon::parse($publishedAt)->diffForHumans() }}
            </span>
        </div>
    </button>
</form>

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
