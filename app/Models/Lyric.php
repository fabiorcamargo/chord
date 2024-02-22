<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lyric extends Model
{
    use HasFactory;

    protected $fillable = [
        'slide',
        'slidetext',
        'image_background_id',
        'video_background_id',
        'background_type',
        'song_id'
    ];

    protected $casts = [
        'slide' => 'array',
        'slidetext' =>  'array'
    ];

    public function setSlideAttribute($value)
    {
        $this->attributes['slide'] = json_encode($value);
    }

    public function setSlidetextAttribute($value)
    {
        // Use preg_match_all para encontrar todas as ocorrências do conteúdo dentro das tags <p>
        preg_match_all('/<p>(.*?)<\/p>/', $value, $matches);

        // Inicialize um array para armazenar as entradas JSON
        $entradasJSON = [];

        // Percorra cada correspondência encontrada
        foreach ($matches[1] as $conteudo) {
            // Substitua a tag <br> por PHP_EOL para adicionar uma nova linha
            $conteudoComNovaLinha = str_replace('<br>', PHP_EOL, $conteudo);

            // Divida o conteúdo em linhas
            $linhas = explode(PHP_EOL, $conteudoComNovaLinha);

            // Percorra cada linha e adicione-a ao array de entradas JSON
            foreach ($linhas as $linha) {
                // Adicione a linha ao array de entradas JSON com a chave "text"
                $entradasJSON[] = ['text' => $linha];
            }
        }

        // Converta o array associativo em JSON
        $json = json_encode($entradasJSON);

        // Saída do JSON resultante
        $this->attributes['slide'] = $json;
    }

    public function Songs(): BelongsTo
    {
        return $this->belongsTo(Song::class);
    }

    public function Image(): HasOne
    {
        return $this->hasOne(ImageBank::class, 'id', 'image_background_id');
    }

    public function Video(): HasOne
    {
        return $this->hasOne(VideoBank::class, 'id', 'video_background_id');
    }

    public function show_slide($type, $text, $model, $key){

        $slide = Slide::first();
        $slide_content = json_decode($slide->content);

        $content = [
            'type' => $type,
            'key' => $key,
            'text' => $text,
            'model' => $model,
            'end' => null,
            'image_background' => $this->Image->path,
            'video_background' => $this->Video->path,
            'text_show' => isset($slide_content->text_show) ? $slide_content->text_show : true,
            'image_show' => isset($slide_content->image_show) ? $slide_content->image_show : true,
        ];


        $slide->content = json_encode($content);
        $slide->update();

        return 'sim';

    }
}
