<?php

namespace App\Models;

use App\Events\SlideEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ImageBank extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
    ];

    protected static function booted(): void
    {
        static::deleted(function (ImageBank $ImageBank) {
            Storage::disk('public')->delete($ImageBank->path);
        });
    }



    public function set_background($record){

        $slide_config = SlideConfig::first();
        $slide_config->bible_image_background = $record->id;
        $slide_config->type = 'image';
        $slide_config->save();


        event(new SlideEvent());

    }
}
