<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('categories')->orderBy('updated_at', 'desc')
            ->paginate(config('const.paginate'));

        foreach ($posts as $post) {
            $post->title = Str::limit($post->title, 40, '...');
            $post->content = Str::limit($post->content, 80, '...');
        }
        return view('post/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('post/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $post = Post::create($data);
            $post->categories()->sync($request->input('categories', []));
            DB::commit();
        } catch (\Throwable $th) {
            Log::error($th);
            DB::rollBack();
        }
        return redirect()
        ->route('post.index')
        ->with('message', '記事を投稿しました');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::select('id', 'name')->get();
        $categoryIds = $post->categories->pluck('id')->toArray();
        return view('post.edit', compact('post', 'categories','categoryIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $post = Post::findOrFail($id);
            if (array_key_exists('is_publish', $data) && count($data) === 3) {
                $post->is_publish = $request->is_publish;
                $post->save();
            } else {
                $post->fill($data)->save();
                $post->categories()->sync($request->input('categories', []));
            }
            DB::commit();
        } catch (\Throwable $th) {
            Log::error($th);
            DB::rollBack();
        }
        return redirect()
        ->route('post.index')
        ->with('message', '記事を編集しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()
        ->route('post.index')
        ->with('message', '記事を削除しました');
    }
}
