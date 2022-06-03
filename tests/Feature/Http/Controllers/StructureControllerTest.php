<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Structure;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StructureController
 */
class StructureControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $structures = Structure::factory()->count(3)->create();

        $response = $this->get(route('structure.index'));

        $response->assertOk();
        $response->assertViewIs('structure.index');
        $response->assertViewHas('structures');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('structure.create'));

        $response->assertOk();
        $response->assertViewIs('structure.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StructureController::class,
            'store',
            \App\Http\Requests\StructureStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $code = $this->faker->word;
        $nom = $this->faker->word;

        $response = $this->post(route('structure.store'), [
            'code' => $code,
            'nom' => $nom,
        ]);

        $structures = Structure::query()
            ->where('code', $code)
            ->where('nom', $nom)
            ->get();
        $this->assertCount(1, $structures);
        $structure = $structures->first();

        $response->assertRedirect(route('structure.index'));
        $response->assertSessionHas('structure.id', $structure->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $structure = Structure::factory()->create();

        $response = $this->get(route('structure.show', $structure));

        $response->assertOk();
        $response->assertViewIs('structure.show');
        $response->assertViewHas('structure');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $structure = Structure::factory()->create();

        $response = $this->get(route('structure.edit', $structure));

        $response->assertOk();
        $response->assertViewIs('structure.edit');
        $response->assertViewHas('structure');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StructureController::class,
            'update',
            \App\Http\Requests\StructureUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $structure = Structure::factory()->create();
        $code = $this->faker->word;
        $nom = $this->faker->word;

        $response = $this->put(route('structure.update', $structure), [
            'code' => $code,
            'nom' => $nom,
        ]);

        $structure->refresh();

        $response->assertRedirect(route('structure.index'));
        $response->assertSessionHas('structure.id', $structure->id);

        $this->assertEquals($code, $structure->code);
        $this->assertEquals($nom, $structure->nom);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $structure = Structure::factory()->create();

        $response = $this->delete(route('structure.destroy', $structure));

        $response->assertRedirect(route('structure.index'));

        $this->assertModelMissing($structure);
    }
}
