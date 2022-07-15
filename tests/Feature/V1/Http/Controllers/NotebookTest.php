<?php

namespace Tests\Feature\V1\Http\Controllers;

use App\Models\Notebook;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function route;

class NotebookTest extends TestCase
{
    use WithFaker;

    public function testIndexOk()
    {
        $notebook = Notebook::factory()->create();

        $response = $this->getJson(route('notebook.index'));

        $response
            ->assertOk()
            ->assertJsonFragment([
                'data' => [
                    [
                        'id' => $notebook->id,
                        'full_name' => $notebook->full_name,
                        'company' => $notebook->company,
                        'phone' => $notebook->phone,
                        'email' => $notebook->email,
                        'birth_date' => $notebook->birth_date,
                        'photo' => null,
                        'created_at' => $notebook->created_at
                    ]
                ]
            ]);
    }

    public function testShowOk()
    {
        $notebook = Notebook::factory()->create();

        $response = $this->getJson(route('notebook.show', $notebook));

        $response->assertOk();
    }

    public function testShowNotFound()
    {
        $response = $this->getJson(route('notebook.show', 'n'));

        $response->assertNotFound();
    }

    public function testStore201()
    {
        $response = $this->postJson(route('notebook.store'), [
            'full_name' => $this->faker->name,
            'company' => $this->faker->company,
            'phone' => '+7999 999 99-99',
            'email' => $this->faker->email,
            'birth_date' => $this->faker->date('Y-m-d', 'now'),
        ]);

        $response->assertCreated();
    }

    public function testStoreErrorValidateUniqueEmail()
    {
        $notebook = Notebook::factory()->create();

        $response = $this->postJson(route('notebook.store'), [
            'full_name' => $this->faker->name,
            'company' => $this->faker->company,
            'phone' => '+7999 999 99-99',
            'email' => $notebook->email,
            'birth_date' => $this->faker->date('Y-m-d', 'now'),
        ]);

        $response
            ->assertJsonValidationErrors(['email'])
            ->assertUnprocessable();
    }

    public function testUpdate()
    {
        $notebook = Notebook::factory()->create();

        $response = $this->patchJson(route('notebook.update', $notebook), [
            'full_name' => 'updated',
            'company' => $this->faker->company,
            'phone' => '+7999 999 99-99',
            'email' => $this->faker->email,
            'birth_date' => $this->faker->date,
        ]);

        $response->assertOk();
    }

    public function testUpdateNotFound()
    {
        $response = $this->patchJson(route('notebook.update', 'n'), [
            'full_name' => 'updated',
            'company' => $this->faker->company,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker,
            'birth_date' => $this->faker->date('Y-m-d', 'now'),
        ]);

        $response->assertNotFound();
    }

    public function testDelete()
    {
        $notebook = Notebook::factory()->create();

        $response = $this->deleteJson(route('notebook.destroy', $notebook));

        $response->assertNoContent();
    }

    public function testDeleteNotFound()
    {
        $response = $this->deleteJson(route('notebook.destroy', 'n'));

        $response->assertNotFound();
    }
}
