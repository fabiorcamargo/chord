<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class SlideConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'bible_image_background',
        'bible_video_background',
        'type',
        'bg_color',
        'bible_font'
    ];

   public function GetImageBackground() : HasOne
   {
        return $this->hasOne(ImageBank::class, 'id', 'bible_image_background');
   }

   public function GetVideoBackground() : HasOne
   {
        return $this->hasOne(VideoBank::class, 'id', 'bible_video_background');
   }

   public function GetFont() : HasOne
   {
        return $this->hasOne(FontBank::class, 'id', 'bible_font');
   }

   public function GetBackgroundImage()
   {
        $this->GetBackground;
        return asset('storage'.$this->GetBackground->path);
   }


}
