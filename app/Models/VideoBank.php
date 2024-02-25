<?php

namespace App\Models;

use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class VideoBank extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
    ];


    protected static function booted(): void
    {
        static::deleted(function (VideoBank $VideoBank) {
            Storage::disk('public')->delete($VideoBank->path);
        });
    }

    public function set_background($record){


        $slide_config = SlideConfig::first();
        //dd($slide_config->content['video_background'] = 2);

        //dd($slide_config);

        $slide_config->content = [
                "image_background" => $slide_config->content['image_background'],
                "video_background" => $record,
                "type" => "video",
                "bg_color" => $slide_config->content['bg_color'],
                "font_type" => $slide_config->content['font_type'],
                "font_size" => $slide_config->content['font_size']
        ];

        $slide_config->save();

        Notification::make()
            ->title('Definido com Sucesso')
            ->success()
            ->send();


    }
}
