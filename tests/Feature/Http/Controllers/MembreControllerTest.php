<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Membre;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MembreController
 */
class MembreControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $membres = Membre::factory()->count(3)->create();

        $response = $this->get(route('membre.index'));

        $response->assertOk();
        $response->assertViewIs('membre.index');
        $response->assertViewHas('membres');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('membre.create'));

        $response->assertOk();
        $response->assertViewIs('membre.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MembreController::class,
            'store',
            \App\Http\Requests\MembreStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $nom = $this->faker->word;
        $prenom = $this->faker->word;
        $date_naissance = $this->faker->date();

        $response = $this->post(route('membre.store'), [
            'nom' => $nom,
            'prenom' => $prenom,
            'date_naissance' => $date_naissance,
        ]);

        $membres = Membre::query()
            ->where('nom', $nom)
            ->where('prenom', $prenom)
            ->where('date_naissance', $date_naissance)
            ->get();
        $this->assertCount(1, $membres);
        $membre = $membres->first();

        $response->assertRedirect(route('membre.index'));
        $response->assertSessionHas('membre.id', $membre->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $membre = Membre::factory()->create();

        $response = $this->get(route('membre.show', $membre));

        $response->assertOk();
        $response->assertViewIs('membre.show');
        $response->assertViewHas('membre');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $membre = Membre::factory()->create();

        $response = $this->get(route('membre.edit', $membre));

        $response->assertOk();
        $response->assertViewIs('membre.edit');
        $response->assertViewHas('membre');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MembreController::class,
            'update',
            \App\Http\Requests\MembreUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $membre = Membre::factory()->create();
        $nom = $this->faker->word;
        $prenom = $this->faker->word;
        $date_naissance = $this->faker->date();

        $response = $this->put(route('membre.update', $membre), [
            'nom' => $nom,
            'prenom' => $prenom,
            'date_naissance' => $date_naissance,
        ]);

        $membre->refresh();

        $response->assertRedirect(route('membre.index'));
        $response->assertSessionHas('membre.id', $membre->id);

        $this->assertEquals($nom, $membre->nom);
        $this->assertEquals($prenom, $membre->prenom);
        $this->assertEquals(Carbon::parse($date_naissance), $membre->date_naissance);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $membre = Membre::factory()->create();

        $response = $this->delete(route('membre.destroy', $membre));

        $response->assertRedirect(route('membre.index'));

        $this->assertModelMissing($membre);
    }
}
