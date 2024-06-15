<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class MutasiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testMutasiDatatxtanamanTest()
    {
        $response = $this->post('/mutasi', [
            'action_task' => 'datatxtanaman',
            'draw'=> 1,
            'columns[0][data]'=> 'rowId',
            'columns[0][name]'=> '',
            'columns[0][searchable]' => 'true',
            'columns[0][orderable]' => 'false',
            'columns[0][search][value]'=> '',
            'columns[0][search][regex]' => 'false',
            'columns[1][data]' => 'id',
            'columns[1][name]' => '', 
            'columns[1][searchable]' => 'true',
            'columns[1][orderable]' => 'true',
            'columns[1][search][value]' => '', 
            'columns[1][search][regex]' => 'false',
            'columns[2][data]' => 'id_m_jenis_tan',
            'columns[2][name]' => '', 
            'columns[2][searchable]' => 'true',
            'columns[2][orderable]' => 'true',
            'columns[2][search][value]' =>'', 
            'columns[2][search][regex]' => 'false',
            'columns[3][data]' => 'id_blok',
            'columns[3][name]' => '',
            'columns[3][searchable]' => 'true',
            'columns[3][orderable]' => 'true',
            'columns[3][search][value]' => '', 
            'columns[3][search][regex]' => 'false',
            'columns[4][data]' => 'id_m_ledger',
            'columns[4][name]' => '',
            'columns[4][searchable]'=> 'true',
            'columns[4][orderable]'=> 'true',
            'columns[4][search][value]'=> '',
            'columns[4][search][regex]' => 'false',
            'columns[5][data]'=> 'jumlah_tanaman',
            'columns[5][name]'=> '',
            'columns[5][searchable]'=> 'true',
            'columns[5][orderable]'=> 'true',
            'columns[5][search][value]'=> '',
            'columns[5][search][regex]'=> 'false',
            'columns[6][data]'=> 'jarak_tanam',
            'columns[6][name]'=> '',
            'columns[6][searchable]'=> 'true',
            'columns[6][orderable]'=> 'true',
            'columns[6][search][value]'=> '',
            'columns[6][search][regex]'=> 'false',
            'columns[7][data]'=> 'luas_tanam',
            'columns[7][name]'=> '',
            'columns[7][searchable]'=> 'true',
            'columns[7][orderable]'=> 'true',
            'columns[7][search][value]'=> '',
            'columns[7][search][regex]'=> 'false',
            'columns[8][data]'=> 'id_m_jenis_ekonomis_tanaman',
            'columns[8][name]'=> '',
            'columns[8][searchable]'=> 'true',
            'columns[8][orderable]'=> 'true',
            'columns[8][search][value]'=> '',
            'columns[8][search][regex]'=> 'false',
            'columns[9][data]'=> 'tahun_tanam',
            'columns[9][name]'=> '',
            'columns[9][searchable]'=> 'true',
            'columns[9][orderable]'=> 'true',
            'columns[9][search][value]'=> '',
            'columns[9][search][regex]'=> 'false',
            'columns[10][data]'=> 'action',
            'columns[10][name]'=> '',
            'columns[10][searchable]'=> 'true',
            'columns[10][orderable]'=> 'true',
            'columns[10][search][value]'=> '',
            'columns[10][search][regex]'=> 'false',
            'order[0][column]'=> '1',
            'order[0][dir]'=> 'asc',
            'start'=> '0',
            'length'=> '10',
            'search[value]'=> '',
            'search[regex]'=> 'false',
        ]);
        
        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) => 
                $json->has('draw')
                    ->has('recordsTotal')
                    ->has('recordsFiltered')
                    ->has('data')
            );
    }
}
