<?php

use Illuminate\Database\Seeder;

class ProductGroupSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aProductGroup = ['0001' => 'Plástico', '0002' => 'Borracha', '0003' => 'Alumínio', '0004' => 'Eletrônicos', '0005' => 'Pneumáticos', '0006' => 'Produtos Químicos', '0007' => 'Produto de Venda'];

        foreach ($aProductGroup as $key => $value) {
        	DB::table('product_group')->insert([
            'description'   => $value
        	]);
        }    
    }
}
