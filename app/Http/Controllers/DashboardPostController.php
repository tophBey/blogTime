<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

// use Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // taks hari ini benerin gambar
        

        // return $request->file('image')->store('post-images');
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'slug' => ['required','unique:posts'],
            'image' => ['image','max:3072', 'mimes:png,jpg,jpeg'],
            'category_id' => ['required'],
            'body' => ['required']
        ]);

        if($request->file('image')){
            $validated['image'] = $request->file('image')->store('post-image');
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->input('body')),200);//tag html di tidak adakan

        Post::create($validated);

        return redirect('/dashboard/post')->with('addSuccess', 'Berhasil Menambahkan Post Baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('dashboard.post.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => ['required', 'max:255'],
            'image' => ['image','max:3072', 'mimes:png,jpg,jpeg'],
            'category_id' => ['required'],
            'body' => ['required']
        ];

        if($request->input('slug') != $post->slug){
            $rules['slug'] = ['unique:posts'];
        }

        $validated = $request->validate($rules);

        if($request->file('image')){

            if($request->input('oldImage')){
                // jika update gambar baru hapus gambar lama
                Storage::delete($request->input('oldImage'));
            }

            $validated['image'] = $request->file('image')->store('post-image');
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->input('body')),200);//tag html di tidak adakan

        Post::where('id', $post->id)->update($validated);

        return redirect('/dashboard/post')->with('addSuccess', 'Berhasil Mengedit Post Baru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        if($post->image){
            // jika hapus post  hapus gambar juga
            Storage::delete($post->image);
        }

        Post::destroy($post->id);

        return redirect('/dashboard/post');
    }

    public function createSlug(Request $request){

        $slug = SlugService::createSlug(Post::class, 'slug', $request->input('title'));

        return response()->json(['slug' => $slug]);
    }
}
