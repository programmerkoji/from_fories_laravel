<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * @return void
     */
    public function index()
    {
        $posts = Post::where('is_publish', '=', 1)
            ->orderBy('updated_at', 'desc')
            ->paginate(config('const.paginate'));

        foreach ($posts as $post) {
            $post->title = Str::limit($post->title, 40, '...');
            $post->content = Str::limit($post->content, 80, '...');
        }
        return view('blog.index', compact('posts'));
    }

    /**
     * @param int $id
     */
    public function detail(int $id)
    {
        $post = Post::findOrFail($id);
        return view('blog.detail', compact('post'));
    }
}
