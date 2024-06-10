<?php

namespace Tests\Unit;

use App\Models\Nota;
use App\Models\User;
use Tests\TestCase;

class NotaTeste extends TestCase
{
    public function test_criar_nota()
    {
        $nota = new Nota();

        $nota->titulo = 'Nota de teste';
        $nota->conteudo = 'Conteúdo da nota de teste';
        $nota->favoritado = false;
        $nota->user_id = 1;
        $nota->save();

        $this->assertDatabaseHas('notas', [
            'titulo' => 'Nota de teste',
            'conteudo' => 'Conteúdo da nota de teste',
            'favoritado' => false,
            'user_id' => 1,
        ]);
    }

    public function test_editar_nota()
    {
        $nota = Nota::find(2);

        $nota->titulo = 'Nota de teste atualizada';
        $nota->conteudo = 'Conteúdo da nota de teste atualizada';
        $nota->favoritado = true;
        $nota->user_id = 1;
        $nota->save();

        $this->assertDatabaseHas('notas', [
            'titulo' => 'Nota de teste atualizada',
            'conteudo' => 'Conteúdo da nota de teste atualizada',
            'favoritado' => true,
            'user_id' => 1,
        ]);
    }

    public function test_deletar_nota()
    {
        $user = User::factory()->create();
        $nota = Nota::factory()->create(['user_id' => $user->id]);

        $nota->delete();

        $this->assertDatabaseMissing('notas', [
            'id' => $nota->id,
        ]);
    }

    public function test_listar_notas_do_usuario()
    {
        $user = User::factory()->create();
        $notas = Nota::factory(5)->create(['user_id' => $user->id]);

        $notas = Nota::where('user_id', $user->id)->get();

        $this->assertCount(5, $notas);
    }

    public function test_buscar_nota()
    {
        Nota::factory(1)->create(['conteudo' => 'lopem ipsum teste lopem ipsum ']);
        $search = 'teste';
        $notas = Nota::where('conteudo', 'like', "%$search%")->first();
        $this->assertNotEmpty($notas);
    }

    public function test_favoritar_nota()
    {
        $nota = Nota::find(2);

        $nota->favoritar();

        $this->assertTrue($nota->favoritado);
    }

    public function test_desfavoritar_nota()
    {
        $nota = Nota::find(2);

        $nota->desfavoritar();

        $this->assertFalse($nota->favoritado);
    }

    public function test_trocar_cor_nota()
    {
        $nota = Nota::find(2);

        $nota->cor = '#FFCAB9';

        $this->assertEquals('FFCAB9', $nota->cor);
    }

    public function test_editar_conteudo_nota()
    {
        $nota = Nota::find(2);

        $nota->conteudo = 'Conteúdo da nota de teste editado';

        $this->assertEquals('Conteúdo da nota de teste editado', $nota->conteudo);
    }
}
