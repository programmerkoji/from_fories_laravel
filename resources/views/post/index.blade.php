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
                <div class="py-8 flex flex-wrap">
                    <div class="w-full md:w-64 md:mb-0 mb-3 flex-shrink-0 flex flex-col">
                        <span class="font-semibold title-font text-gray-700">CATEGORY</span>
                        <span class="mt-1 text-gray-500 text-sm">
                            @if ($post->updated_at > $post->created_at)
                            {{ $post->updated_at->format('Y-m-d') }}
                            @else
                            {{ $post->created_at->format('Y-m-d') }}
                            @endif
                        </span>
                    </div>
                    <div class="w-full md:flex-1">
                        <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $post->title }}</h2>
                        <p class="leading-relaxed">{{ $post->content }}</p>
                        <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="text-indigo-500 inline-flex items-center mt-4">Learn More
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="w-full md:flex-1 md:mb-0 flex items-center gap-4 justify-end">
                        <form id="update_is_publish_{{ $post->id }}" action="{{ route('post.update', ['post' => $post->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <select name="is_publish" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-4 pr-8 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" data-id="{{ $post->id }}" onchange="confirmPublish(this)">
                                <option value="0" {{ $post->is_publish === 0 ? 'selected' : '' }}>非公開</option>
                                <option value="1" {{ $post->is_publish === 1 ? 'selected' : '' }}>公開</option>
                            </select>
                        </form>
                        <form id="delete_{{ $post->id }}" action="{{ route('post.destroy', ['post' => $post->id]) }}" method="post" class="">
                            @csrf
                            @method('delete')
                            <button class="px-4 py-1 bg-red-600 text-white rounded-md text-sm whitespace-nowrap" data-id="{{ $post->id }}" onclick="deletePost(this)">削除</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-12">
                {{ $posts->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </section>
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもよいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
        function confirmPublish(selectElement) {
            'use strict';
            let selectedOption = selectElement.options[selectElement.selectedIndex].text;
            let confirmationMessage = `この投稿を${selectedOption}に変更してもよいですか？`;
            if (confirm(confirmationMessage)) {
                document.getElementById('update_is_publish_' + selectElement.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
