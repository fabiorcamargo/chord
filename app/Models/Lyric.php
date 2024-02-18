<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function show_slide($type, $text, $model, $key){

        $content = [

            'type' => $type,
            'key' => $key,
            'text' => $text,
            'end' => null,
            'model' => $model

        ];

        $slide = Slide::first();
        $slide->content = json_encode($content);
        $slide->update();

        return 'sim';

    }
}
