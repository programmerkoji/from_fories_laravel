<x-blog-layout>
    <div class="bl_mv"></div>

    <div class="ly_cont">
        <div class="ly_cont_inner ly_cont__col">

            <!-- main -->
            <main class="ly_cont_main">
                @if (isset($posts))
                <article>
                    <ul class="bl_archive">
                        @foreach ($posts as $post)
                            <li class="bl_archive_item">
                                <a href="{{route('blog.detail', ['id' => $post->id])}}" class="bl_archive_link">
                                    <div class="bl_archive_head">
                                        <time class="bl_archive_time" datetime="{{ $post->updated_at->format('Y-m-d') }}">{{ $post->updated_at->format('Y.m.d') }}</time>
                                        <ul class="bl_labelWrapper">
                                            <li class="el_catLabel"></li>
                                        </ul>
                                    </div>
                                    <!-- /.bl_archive_head -->
                                    <h3 class="bl_archive_ttl">{{ $post->title }}</h3>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </article>
                @else
                <p>記事がありません。</p>
                @endif
            </main>

            <!-- aside -->
            <aside class="ly_aside">
                <div class="ly_aside_inner bl_aside">
                </div>
                <!-- /.ly_aside_inner -->
            </aside>

        </div>
        <!-- /.ly_cont_inner -->
    </div>
    <!-- /.ly_cont -->
</x-blog-layout>
