<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['chapter_id', 'title', 'content'];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
