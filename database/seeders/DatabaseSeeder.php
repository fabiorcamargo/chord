<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Fábio',
            'email' => 'fabiorcamargo@gmail.com',
            'password' => bcrypt('Quem@ma764829')
        ]);

        // Caminho para o arquivo SQL
        $bible = 'sql/testaments.sql';
        // Leia o conteúdo do arquivo SQL
        $sql = file_get_contents($bible);
        // Execute o SQL
        DB::unprepared($sql);
        // Caminho para o arquivo SQL
        $bible = 'sql/bibles.sql';
        // Leia o conteúdo do arquivo SQL
        $sql = file_get_contents($bible);
        // Execute o SQL
        DB::unprepared($sql);
        // Caminho para o arquivo SQL
        $bible = 'sql/books.sql';
        // Leia o conteúdo do arquivo SQL
        $sql = file_get_contents($bible);
        // Execute o SQL
        DB::unprepared($sql);
        // Caminho para o arquivo SQL
        $bible = 'sql/nvi.sql';
        // Leia o conteúdo do arquivo SQL
        $sql = file_get_contents($bible);
        // Execute o SQL
        DB::unprepared($sql);

        \App\Models\ImageBank::create([
            'name' => 'Fundo Colorido',
            'path' => '01HP2K3HJA43EAXKDNMMK3QJDW.jpg'
        ]);

        \App\Models\VideoBank::create([
            'name' => 'Fundo Colorido',
            'path' => '01HP7XB6Z4SWQXPE9CBNZ5SNCA.m4v'
        ]);


        \App\Models\FontBank::create([
            'name' => 'Impact'
        ]);

        \App\Models\SlideConfig::create([
            'content' => '{
                "image_background": 1,
                "video_background": 1,
                "type": "image",
                "bg_color": "rgba(0, 0, 0, 0.6)",
                "font_type": 1,
                "font_size": 5
            }'
        ]);

        \App\Models\Slide::create([
            'content' => '
            {
                "type": "lyric",
                "text":"Seja Bem Vindo",
                "image_background": "01HP2K3HJA43EAXKDNMMK3QJDW.jpg",
                "image_show": true,
                "text_show": true,
                "end":"",
                "key":"1"
            }'
        ]);

        \App\Models\Category::create([
            "name" => "Comunhão"
        ]);

        \App\Models\Song::create([
            "name" => "Pai de Multidões",
            "category_id" => 1,
            "font_id" => null,
            "image_id" => null,
            "video_id" => null,
        ]);

        \App\Models\Lyric::create([
            "song_id" => 1,
            "slide" => null,
            "slidetext" => null,
            "image_background_id" => 1,
            "video_background_id" => 1,
            "background_type" => "image"
        ]);

        DB::statement('UPDATE verses SET book = book + 1');
    }
}
