<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FontBank extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $appends = ['fontshow'];

    public function getFontshowAttribute()
    {
        //dd($this->name);
        $show = '
        <div style="font-size: 40px; font-family: ' . $this->name . ';"> Hello Word. </div>
        ';
        return $show;
    }

    public static function getAllFonts(){
        $fontBankItems = FontBank::select('name')->pluck('name')->toArray();
        $fontBankString = implode('|', $fontBankItems);

        //dd($fontBankString);
        return $fontBankString;
    }

    public function set_font($record){

        $slide_config = SlideConfig::first();
        $slide_config->bible_font = $record->id;
        $slide_config->save();
        //dd($record);

    }
}
