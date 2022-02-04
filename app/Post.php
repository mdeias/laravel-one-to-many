<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{

    protected $fillable = ['title', 'content', 'slug'];

    public static function generateSlug($title){

        //slug

        $slug = Str::slug($title);
        $slug_base = $slug;
        // è presente nnel db?

        $post_presente = Post::where('slug', $slug)->first();

        // se è presente genero un contatore
        $c = 1;
        while($post_presente){
            $slug = $slug_base . '-' . $c;
            $c++;
            $post_presente = Post::where('slug', $slug)->first();
        }

        return $slug;
    }
}
