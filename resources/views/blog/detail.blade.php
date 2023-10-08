<x-blog-layout>
    <div class="bl_mv"></div>

    <!-- contents -->
    <div class="ly_cont">
        <div class="ly_cont_inner ly_cont__col">

            <!-- main -->
            <main class="ly_cont_main">
                <article>

                    <!-- contents -->
                    <section class="ly_post">

                        <article class="bl_post">

                            <div class="bl_post_head">
                                <time class="bl_post_time" datetime="{{ $post->updated_at->format('Y-m-d') }}">
                                    {{ $post->updated_at->format('Y.m.d') }}
                                </time>
                                <ul class="bl_post_catLabel">
                                    @foreach ($post->categories as $category)
                                    <li class="el_catLabel" style="background: {{ $category->bg_color_code }}">{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /.bl_post_head -->

                            <h1 class="bl_post_ttl">{{ $post->title }}</h1>

                            <div class="bl_post_conts">
                                @markdown($post->content)
                            </div>
                            <!-- /.bl_post_conts -->

                            <div class="bl_pager">
                                <ul class="bl_pager_inner">
                                    <li class="bl_pager_link bl_pager_prev">
                                    </li>
                                    <li class="bl_pager_link bl_pager_next">
                                    </li>
                                </ul>
                            </div>
                            <!-- /.bl_pager -->

                        </article>
                        <!-- /.bl_post -->

                    </section>
                    <!-- /.bl_post -->

                </article>
            </main>

            <!-- aside -->
            <aside class="ly_aside">
            </aside>

        </div>
        <!-- ly_cont_inner -->
    </div>
    <!-- /.ly_cont -->
    {{-- @vite(['resources/js/highlight.js']) --}}
</x-blog-layout>
