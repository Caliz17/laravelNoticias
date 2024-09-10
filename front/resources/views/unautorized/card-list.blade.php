<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($news as $new)
            @if ($new['image_url'] != null)
                <x-card :route="route('news.detail')" :image="$new['image_url']" :title="$new['title']" :description="$new['description']" :source="$new['creator'][0] ?? null"
                    :publishedAt="$new['pubDate']" :newsData="$new" :relatedNews="$relatedNews ?? ''" />
            @endif
        @endforeach
    </div>
</div>
