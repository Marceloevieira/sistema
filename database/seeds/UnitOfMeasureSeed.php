<?php

use Illuminate\Database\Seeder;

class UnitOfMeasureSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aUnitOfMeasure = ['AR' => 'ARROBA'   ,'BD' => 'BALDE'    ,'CX' => 'CAIXA'    ,'CC' => 'CENTIMETRO CUBICO','CM' => 'CENTIMETRO','CT' => 'CENTO'    ,'DM' => 'DECIMETRO','DZ' => 'DUZIA'    ,'FL' => 'FOLHAS'   ,'GL' => 'GALAO'    ,'G ' => 'GRAMA'    ,'GZ' => 'GROZA'    ,'HR' => 'HORA'     ,'YD' => 'JARDA'    ,'JG' => 'JOGO'     ,'KT' => 'KIT'      ,'LT' => 'LATA'     ,'LB' => 'LIBRA'    ,'L ' => 'LITRO'    ,'MT' => 'METRO'    ,'M3' => 'METRO CUBICO','M2' => 'METRO QUADRADO','ML' => 'MILILITRO','MM' => 'MILIMETRO','OZ' => 'ONCA'     ,'P ' => 'PAR'      ,'PC' => 'PECA'     ,'FT' => 'PES'      ,'PL' => 'POLEGADAS','KG' => 'QUILOGRAMA','TL' => 'TONELADA' ,'UN' => 'UNIDADE'  ];

        foreach ($aUnitOfMeasure as $key => $value) {
        	DB::table('units_of_measure')->insert([
            'measured_unit' => $key,
            'description'   => $value
        	]);
        }
    }
}
