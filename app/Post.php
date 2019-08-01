<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Post extends Model
{

    use SoftDeletes;

    protected $dates = [
        'published_at'
        
    ];

    protected $fillable = [
        'title', 
        'description', 
        'content', 
        'image', 
        'published_at',
        'category_id',
        'user_id',
        'slug'

    ];
// delete post image in storage
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    } 

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    } 

    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    } 

    public function user()
    {
        return $this->belongsTo(User::class); 
    } 
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    public function scopeSearched($query)
    {
         
    $search = request()->query('search');

    if (!$search) {
        return $query->published();
    }
    return $query->published()->where('title', 'LIKE', "%{$search}%");

    } 
    // method untuk memilah status post
    public function publicationLabel ()
    {
        if( ! $this->published_at){
            return '<button class="btn btn-warning btn-sm" disabled="disabled">Draft </button>';
        }
        elseif ($this->published_at && $this->published_at->isFuture()){
            return '<button class="btn btn-info btn-sm" disabled="disabled">Schedule </button>';
        }
        else{
            return '<button class="btn btn-success btn-sm" disabled="disabled">Publish </button>';
        }
    }
    
}
