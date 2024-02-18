<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'image_background_id',
        'video_background_id'
    ];

    public function save(array $options = [])
    {
        dd($options);
    }

    public function Category(): HasMany
    {
        return $this->hasMany(Category::class, 'id', 'category_id');
    }

    public function Lyric(): HasOne
    {
        return $this->hasOne(Lyric::class);
    }

    public function show_slide($type)
    {

        dd($type);
        $content = [
            'type' => $type,
            'text' => $this->text,
            'end' => $this->complete
        ];
        //dd(json_encode($slide, true));
        $slide = Slide::first();
        $slide->content = json_encode($content);
        $slide->update();

        return '';
    }
}
