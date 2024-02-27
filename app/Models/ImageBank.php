<?php

namespace App\Models;

use App\Events\SlideEvent;
use App\Events\SlideRecharge;
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

    }

    public function send_show($record){

        $slide = Slide::first();
        $slide_content = json_decode($slide->content);

        $content = [
            'type' => 'bible',
            'key' => 1,
            'text' => '',
            'model' => 1,
            'end' => null,
            'bg_type' => 'image_show',
            'image_background' => $record->path,
            'video_background' => '',
            'font_type' => '',
            'text_show' => isset($slide_content->text_show) ? $slide_content->text_show : true,
            'image_show' => isset($slide_content->image_show) ? $slide_content->image_show : true,
        ];


        $slide->content = json_encode($content);
        $slide->update();

        event(new SlideRecharge());
    }
}
