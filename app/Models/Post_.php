<?php

namespace App\Models;



class Post_
{

    private static $blog_post = [

        [
            'title' => 'Judul Post pertama',
            'slug' => 'judul-post-pertama',
            'author' => 'Muhamad Arif',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et unde dolore cupiditate doloremque minus maiores, officia
                       expedita provident quia molestiae beatae, illum, distinctio voluptates eveniet delectus sint eius esse atque.'
        ],
        [
            'title' => 'Judul Post kedua',
            'slug' => 'judul-post-kedua',
            'author' => 'Muhamad dicky',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et unde dolore cupiditate doloremque minus maiores, officia
                       expedita provident quia molestiae beatae, illum, distinctio voluptates eveniet delectus sint eius esse atque.'
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_post);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);

    }
}
