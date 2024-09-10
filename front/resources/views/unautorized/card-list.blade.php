<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($news as $new)
            <x-card :route="route('news.detail')" :image="$new['urlToImage']" :title="$new['title']" :description="$new['description']" :source="$new['author'] ?? null"
                :publishedAt="$new['publishedAt']" :newsData="$new" :relatedNews="$relatedNews ?? ''" />
        @endforeach
    </div>
</div>
