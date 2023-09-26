<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">投稿一覧</h2>
    </x-slot>

    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-12 mx-auto">
            <div class="pb-8 w-full">
                <a href="{{ route('post.create') }}" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規投稿</a>
            </div>
            <div class="-my-8 divide-y-2 divide-gray-100">
                @foreach ($posts as $key => $post)
                    <div class="py-8 flex flex-wrap md:flex-nowrap">
                        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                            <span class="font-semibold title-font text-gray-700">CATEGORY</span>
                            <span class="mt-1 text-gray-500 text-sm">
                                @if ($post->updated_at > $post->created_at)
                                    {{ $post->updated_at->format('Y-m-d') }}
                                @else
                                    {{ $post->created_at->format('Y-m-d') }}
                                @endif
                            </span>
                        </div>
                        <div class="md:flex-grow">
                            <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $post->title }}</h2>
                            <p class="leading-relaxed">{{ $post->content }}</p>
                            <a href="{{ route('post.show', ['post' => $post->id]) }}" class="text-indigo-500 inline-flex items-center mt-4">Learn More
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-12">
                {{ $posts->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </section>

</x-app-layout>
