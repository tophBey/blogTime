<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Illuminate\Http\Request;


class Post extends Model
{
    use HasFactory, Sluggable ;

    protected $fillable = [
        "title",
        "slug",
        "category_id",
        "excerpt",
        "user_id",
        "body"
    ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function scopeFilters($query, array $filters){
        
        // if(request('search')){
        //     return 
        //     $query->where('title', 'like', '%' . request('search') . '%')
        //     ->where('body', 'like' , '%' . request('body') .'%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search){
            return  $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like' , '%' . $search .'%');
        });

        // relasi ke tabel kategory
        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use($category){
                return $query->where('slug', $category);
            });
        });

        // relasi ke author
        $query->when($filters['author'] ?? false, function($query, $author){
            return $query->whereHas('author', function($query) use($author){
                return $query->where('username', $author);
            });
        });
    }

    protected $with = ['category','author'];

    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function author():BelongsTo{
        return $this->belongsTo(User::class,'user_id','id');
    }
}
