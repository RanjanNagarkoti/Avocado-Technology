<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'desc', 'active'];

    public function getLink(){
        return $this->hasMany(VideoList::class, 'video_id', 'id');
    }
}
