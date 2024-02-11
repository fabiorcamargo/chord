<?php

namespace App\Models;

use App\Events\NewSlide;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Livewire\Component;

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

    public function show_slide(){

        $content = [
            'text' => $this->text,
            'end' => $this->complete
        ];
        //dd(json_encode($slide, true));
        $slide = Slide::first();
        $slide->content = json_encode($content);
        $slide->update();

        return '';

    }


    public function getVerse(){
        $config = Slide::first();
        return $config->id;
    }


}
