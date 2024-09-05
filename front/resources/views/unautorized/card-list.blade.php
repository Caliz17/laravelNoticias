<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($news as $index => $new)
            <form action="{{ route('news.detail') }}" method="POST" class="news-form">
                @csrf
                <input type="hidden" name="newsData" value="{{ json_encode($new) }}">
                <input type="hidden" name="relatedNews" class="related-news-input" value="">

                <button type="submit"
                    class="block max-w-sm rounded bg-sky-500 p-2 m-2 overflow-hidden shadow-lg transform transition-transform duration-300 hover:scale-105">
                    <img class="w-full h-48 object-cover" loading="lazy" src="{{ $new['urlToImage'] }}"
                        alt="Card image">
                    <div class="px-4 py-4">
                        <div class="font-bold text-xl mb-2">{{ $new['title'] }}</div>
                        <p class="text-gray-700 text-base description">
                            {{ $new['description'] }}
                        </p>
                    </div>
                    <div class="px-4 py-2">
                        @if ($new['source']['name'] != null)
                            <span
                                class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                                {{ $new['source']['name'] }}
                            </span>
                        @endif
                        <span
                            class="inline-block bg-violet-500 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">
                            {{ Date::parse($new['publishedAt'])->diffForHumans() }}
                        </span>
                    </div>
                </button>
            </form>
        @endforeach
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obtén todas las noticias del DOM
        const newsForms = document.querySelectorAll('.news-form');
        const newsData = Array.from(newsForms).map(form => {
            try {
                const data = JSON.parse(form.querySelector('input[name="newsData"]').value);
                if (!data || !data.title) {
                    console.error('Invalid news data:', data);
                }
                return {
                    ...data,
                    form: form
                };
            } catch (e) {
                console.error('Error parsing newsData:', e);
                return null;
            }
        }).filter(item => item); // Elimina los valores nulos si la conversión falla

        // Función para calcular noticias similares basado en palabras clave
        function getRelatedNews(currentNews, allNews, count = 3) {
            if (!currentNews || !currentNews.title) {
                console.error('currentNews or currentNews.title is undefined');
                return [];
            }

            const keywords = currentNews.title.toLowerCase().split(' ');
            return allNews
                .filter(news => news !== currentNews)
                .map(news => {
                    if (!news || !news.title) {
                        console.error('news or news.title is undefined');
                        return {
                            news: null,
                            score: 0
                        };
                    }

                    const score = keywords.reduce((acc, keyword) => {
                        return acc + (news.title.toLowerCase().includes(keyword) ? 1 : 0);
                    }, 0);
                    return {
                        news,
                        score
                    };
                })
                .filter(item => item.news) // Filtrar noticias que sean válidas
                .sort((a, b) => b.score - a.score)
                .slice(0, count)
                .map(item => item.news);
        }

        // Maneja el evento de clic en el botón
        newsForms.forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevenir el envío del formulario por defecto

                try {
                    const newsDataInput = form.querySelector('input[name="newsData"]').value;

                    const currentNewsData = JSON.parse(newsDataInput);

                    const relatedNews = getRelatedNews(currentNewsData, newsData.map(item =>
                        item.news));

                    form.querySelector('.related-news-input').value = JSON.stringify(
                        relatedNews);
                    form.submit(); // Enviar el formulario
                } catch (e) {
                    console.error('Error handling form submit:', e);
                }
            });
        });
    });
</script>
