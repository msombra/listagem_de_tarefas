<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tarefa;

class TarefasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Tarefa $tarefa): void
    {
        $tarefa->factory(24)->create();
    }
}
