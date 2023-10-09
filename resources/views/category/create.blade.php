<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white mt-8">
        <form action="{{route('category.store')}}" method="post">
            @csrf
            <div class="flex flex-wrap gap-4">
                <div class="flex items-center gap-2">
                    <label for="name" class="whitespace-nowrap">カテゴリ名</label>
                    <input type="text" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" id="name" value="{{ old('name') }}">
                </div>
                <div class="flex items-center gap-2">
                    <label for="bg_color_code" class="whitespace-nowrap">背景色</label>
                    <div class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3">
                        <input type="color" name="bg_color_code" id="bg_color_code" value="{{ old('bg_color_code') }}">
                    </div>
                </div>
            </div>
            <div class="flex gap-2 mt-6">
                <button type="button" onclick="location.href='{{ route('post.index') }}'" class="flex text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg">戻る</button>
                <button type="submit" class="flex text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規追加</button>
            </div>
        </form>
    </div>
</x-app-layout>
