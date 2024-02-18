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
        $slide_config->bible_video_background = $record;
        $slide_config->type = 'video';
        $slide_config->save();
        //dd($record);

        Notification::make()
            ->title('Definido com Sucesso')
            ->success()
            ->send();


    }
}
