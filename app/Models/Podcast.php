<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Podcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'podcast',
        'user_id',
        'image'
    ];

    public function storageUrlImage()
    {
        return Storage::url($this->image);
    }

    public function storageUrlPodcast()
    {
        return Storage::url($this->podcast);
    }
}
