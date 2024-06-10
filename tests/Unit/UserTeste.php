<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTeste extends TestCase
{
    public function test_criar_usuario()
    {
        $user = User::factory()->create();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
        ]);
    }
}
