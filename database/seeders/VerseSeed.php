<?php

namespace Database\Seeders;

use App\Models\Verse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class VerseSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Carregue o conteúdo do arquivo JSON
         $nvi = File::get(database_path('base/nvi.json'));
         $acf = File::get(database_path('base/acf.json'));
         $aa = File::get(database_path('base/aa.json'));

         // Decodifique o JSON para uma matriz associativa
         $nvi = json_decode($nvi, true);
         $acf = json_decode($acf, true);
         $aa = json_decode($aa, true);

         // Itere sobre os dados e insira no banco de dados
         foreach ($nvi as $nv) {
            Verse::create([
                 'campo1' => $nv['campo1'],
                 'campo2' => $nv['campo2'],
                 // Adicione os campos restantes conforme necessário
             ]);
         }

         foreach ($acf as $ac) {
            Verse::create([
                 'campo1' => $ac['campo1'],
                 'campo2' => $ac['campo2'],
                 // Adicione os campos restantes conforme necessário
             ]);
         }

         foreach ($aa as $a) {
            Verse::create([
                 'campo1' => $a['campo1'],
                 'campo2' => $a['campo2'],
                 // Adicione os campos restantes conforme necessário
             ]);
         }
    }
}
