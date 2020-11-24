<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'text', 'publish_at',
    ];
    public function getShortTextAttribute()
    {
        return mb_substr($this->text, 0, 75);
    }
}
