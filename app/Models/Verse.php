<?php

namespace App\Models;

use App\Events\NewSlide;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Livewire\Component;
use Livewire\Livewire;

class Verse extends Model
{
    use HasFactory;

    protected $fillable = [
        'version',
        'testament',
        'book',
        'chapter',
        'verse',
        'text',
    ];

    protected $appends = ['complete', 'chapters'];

    public $show;

    /**
     * Get all of the comments for the Verse
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testaments(): HasMany
    {
        return $this->hasMany(Testament::class, 'id', 'testament');
    }

    public function books(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book', 'id')->distinct();
    }

    public function versions(): BelongsTo
    {
        return $this->belongsTo(Bible::class, 'version', 'id');
    }

    public function getCompleteAttribute()
    {
        //dd($this->where('chapter', $this->chapter)->where('book', $this->book)->where('version', $this->version)->get());

        //dd($this->book);
        $book = Book::find($this->book);
        $name = $book->name;

        return "{$name} {$this->chapter}:{$this->verse}";
    }

    public function getChaptersAttribute()
    {
        return  Verse::where('version', $this->version)
            ->where('book', $this->book)
            ->where('chapter', $this->chapter)
            ->get()
            ->toJson();
    }

    public function show_slide($type, $text, $model, $key)
    {
        $config = SlideConfig::first();
        $slide = Slide::first();
        $slide_content = json_decode($slide->content);
        $content = [
            'type' => $type,
            'key' => $key,
            'text' => $text,
            'model' => $model->id,
            'end' => $model->complete,
            'bg_type' => $config->content['type'],
            'image_background' => \App\Models\ImageBank::find($config->content['image_background'])->path,
            'video_background' =>  \App\Models\VideoBank::find($config->content['video_background'])->path,
            'font_type' => \App\Models\FontBank::find($config->content['font_type'])->name,
            'text_show' => isset($slide_content->text_show) ? $slide_content->text_show : true,
            'image_show' => isset($slide_content->image_show) ? $slide_content->image_show : true,
        ];
        $slide->content = json_encode($content);
        $slide->update();
        return 'Sim';
    }


    public function getVerse()
    {
        $config = Slide::first();
        return $config->id;
    }
}
