<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
    // use HasFactory;
    private static $blog_post =[
        [
            "tittle" => "Judul satu",
            "slug" => "slug-satu",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum veniam illo laborum suscipit velit itaque aspernatur assumenda a nihil incidunt asperiores quae dolorum, eius excepturi nisi consequuntur architecto officia. Dicta id quaerat quam amet illum enim consequuntur sequi, incidunt earum temporibus similique perspiciatis quisquam architecto necessitatibus animi minima perferendis soluta explicabo odit vel? Placeat quasi reiciendis, veniam magni voluptatibus unde expedita incidunt sit, cumque aliquid modi quidem possimus et harum maxime, aspernatur quisquam? Quasi molestiae illum debitis blanditiis? Eos, vel."
        ],
        [
            "tittle" => "Judul dua",
            "slug" => "slug-dua",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum veniam illo laborum suscipit velit itaque aspernatur assumenda a nihil incidunt asperiores quae dolorum, eius excepturi nisi consequuntur architecto officia. Dicta id quaerat quam amet illum enim consequuntur sequi, incidunt earum temporibus similique perspiciatis quisquam architecto necessitatibus animi minima perferendis soluta explicabo odit vel? Placeat quasi reiciendis, veniam magni voluptatibus unde expedita incidunt sit, cumque aliquid modi quidem possimus et harum maxime, aspernatur quisquam? Quasi molestiae illum debitis blanditiis? Eos, vel."
        ],
        [
            "tittle" => "Judul tiga",
            "slug" => "slug-tiga",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum veniam illo laborum suscipit velit itaque aspernatur assumenda a nihil incidunt asperiores quae dolorum, eius excepturi nisi consequuntur architecto officia. Dicta id quaerat quam amet illum enim consequuntur sequi, incidunt earum temporibus similique perspiciatis quisquam architecto necessitatibus animi minima perferendis soluta explicabo odit vel? Placeat quasi reiciendis, veniam magni voluptatibus unde expedita incidunt sit, cumque aliquid modi quidem possimus et harum maxime, aspernatur quisquam? Quasi molestiae illum debitis blanditiis? Eos, vel."
        ],
    ];

    public static function all(){
        return collect(self::$blog_post);
    }

    public static function find($slug){
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
