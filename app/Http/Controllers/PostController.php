<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request){

        $subTitle = '';
        if($request->input('category')){
            $category = Category::firstWhere('slug',$request->input('category'));
            $subTitle = 'In ' . $category->name;

        }

        if($request->input('author')){
            $user = User::firstWhere('username', $request->input('author'));
            $subTitle = 'By ' . $user->name;
        }

        return view('posts', [
            'subtitle' => 'Semua Postingan '. $subTitle,
            'title' => 'posts',
            // 'posts' => Post::all()
            'posts'=> Post::latest()->filters(request(['search','category','author']))->paginate(10)->withQueryString(),
        ]);
    }


    public function show(Post $post){
        return view('postingan.post',[
            'title'=> 'post',
            'posts' => $post
        ]);
    }




}
