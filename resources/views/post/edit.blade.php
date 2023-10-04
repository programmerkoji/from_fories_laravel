<x-app-layout>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white mt-8">
        <form action="{{ route('post.update', ['post' => $post->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-4">
                <div class="flex flex-col w-full gap-2">
                    <label for="title" class="whitespace-nowrap">タイトル</label>
                    <input type="text" name="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" id="title" value="{{ $post->title }}">
                </div>

                <div>
                    <select name="is_publish" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0" {{ $post->is_publish === 0 ? 'selected' : '' }}>非公開</option>
                        <option value="1" {{ $post->is_publish === 1 ? 'selected' : '' }}>公開</option>
                    </select>
                </div>

                <div class="flex gap-2 items-center">
                    <span class="whitespace-nowrap">カテゴリ：</span>
                    <div class="w-full flex items-center flex-wrap gap-2">
                        <div class="flex items-center">
                            <input id="laravel" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="laravel" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laravel</label>
                        </div>
                        <div class="flex items-center">
                            <input id="react" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="react" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">React</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bl_post_conts mt-4 flex flex-col md:flex-row">
                <textarea  id="markdown-input" name="content" id="markdown_editor_textarea" class="w-full md:w-1/2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-96 text-base outline-none text-gray-700 py-2 px-3 resize-none  overflow-y-auto leading-6 transition-colors duration-200 ease-in-out">{{ $post->content }}</textarea>
                <div id="preview" class="preview md:w-1/2 h-96 rounded border border-gray-300 py-2 px-3 resize-none overflow-y-auto"></div>
            </div>
            <div class="flex gap-2 mt-6">
                <button type="button" onclick="location.href='{{ route('post.index') }}'" class="flex text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg">戻る</button>
                <button type="submit" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">保存</button>
            </div>
        </form>
    </div>
</x-app-layout>
