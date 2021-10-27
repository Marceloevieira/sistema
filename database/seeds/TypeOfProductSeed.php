<?php

use Illuminate\Database\Seeder;

class TypeOfProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $aTypeOfProduct = ['ME' => 'Mercadoria para Revenda','MP' => 'Matéria-Prima','EM' => 'Embalagem','PP' => 'Produto em Processo', 'PA' => 'Produto Acabado', 'SP' => 'Subproduto', 'PI' => 'Produto Intermediário', 'MC' => 'Material de Uso e Consumo','AI' => 'Ativo Imobilizado','MO' => 'Serviços','OI' => 'Outros insumos'];

        foreach ($aTypeOfProduct as $key => $value) {
        	DB::table('type_of_products')->insert([
            'abbreviation'  => $key,
            'description'   => $value
        	]);
        }
    }
}
