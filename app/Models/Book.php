<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Verse;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbrev',
        'testament'
    ];

    protected $appends = ['getchapters', 'getverse'];

    public function verse() : HasMany {

        return $this->hasMany(Verse::class, 'book', 'id');
    }

    public function getGetverseAttribute()
    {
        $config = Slide::first();

        //dd(json_decode($config->content)->text);
        return json_decode($config->content)->text;
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

    public function testaments() : BelongsTo
    {
        return $this->belongsTo(Testament::class, 'testament', 'id');

    }

    public function getGetchaptersAttribute()
    {
        //dd($this->chapter);
        $capitulos = Verse::where('book', $this->id)->pluck('chapter')->unique()->toArray();

        //dd($capitulos);

        // $chapter = Verse::where('chapter', $this->chapter)->where('book', $this->book)->first();

        // dd($chapter);

        return $capitulos;
    }


}
