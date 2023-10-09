<x-app-layout>

    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-12 mx-auto">
            <div class="pb-8 w-full">
                <a href="{{ route('category.create') }}" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規投稿</a>
            </div>
            <div class="-my-8 divide-y-2 divide-gray-100">
                @foreach ($categories as $category)
                <div class="py-8 flex flex-wrap gap-2">
                    <div class="w-full md:w-56 md:mb-0 mb-3 flex-shrink-0 flex">
                        <span class="el_catLabel text-white" style="background: {{ $category->bg_color_code }}">{{ $category->name }}</span>
                    </div>
                    <div class="w-full md:flex-1 md:mb-0 flex items-center gap-4">
                        <button type="button" class="px-4 py-1 bg-gray-600 text-white rounded-md text-sm whitespace-nowrap" onclick="location.href='{{ route('category.edit', ['category' => $category->id]) }}'">編集</button>
                        <form id="delete_{{ $category->id }}" action="{{ route('category.destroy', ['category' => $category->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="px-4 py-1 bg-red-600 text-white rounded-md text-sm whitespace-nowrap" data-id="{{ $category->id }}" onclick="deletePost(this)">削除</button>
                        </form>
                    </div>
                </div>
                @endforeach
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
    </script>
</x-app-layout>
