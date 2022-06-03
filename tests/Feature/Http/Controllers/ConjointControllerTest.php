<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Conjoint;
use App\Models\Membre;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ConjointController
 */
class ConjointControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $conjoints = Conjoint::factory()->count(3)->create();

        $response = $this->get(route('conjoint.index'));

        $response->assertOk();
        $response->assertViewIs('conjoint.index');
        $response->assertViewHas('conjoints');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('conjoint.create'));

        $response->assertOk();
        $response->assertViewIs('conjoint.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ConjointController::class,
            'store',
            \App\Http\Requests\ConjointStoreRequest::class
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
        $date_mariage = $this->faker->date();
        $membre = Membre::factory()->create();

        $response = $this->post(route('conjoint.store'), [
            'nom' => $nom,
            'prenom' => $prenom,
            'date_naissance' => $date_naissance,
            'date_mariage' => $date_mariage,
            'membre_id' => $membre->id,
        ]);

        $conjoints = Conjoint::query()
            ->where('nom', $nom)
            ->where('prenom', $prenom)
            ->where('date_naissance', $date_naissance)
            ->where('date_mariage', $date_mariage)
            ->where('membre_id', $membre->id)
            ->get();
        $this->assertCount(1, $conjoints);
        $conjoint = $conjoints->first();

        $response->assertRedirect(route('conjoint.index'));
        $response->assertSessionHas('conjoint.id', $conjoint->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $conjoint = Conjoint::factory()->create();

        $response = $this->get(route('conjoint.show', $conjoint));

        $response->assertOk();
        $response->assertViewIs('conjoint.show');
        $response->assertViewHas('conjoint');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $conjoint = Conjoint::factory()->create();

        $response = $this->get(route('conjoint.edit', $conjoint));

        $response->assertOk();
        $response->assertViewIs('conjoint.edit');
        $response->assertViewHas('conjoint');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ConjointController::class,
            'update',
            \App\Http\Requests\ConjointUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $conjoint = Conjoint::factory()->create();
        $nom = $this->faker->word;
        $prenom = $this->faker->word;
        $date_naissance = $this->faker->date();
        $date_mariage = $this->faker->date();
        $membre = Membre::factory()->create();

        $response = $this->put(route('conjoint.update', $conjoint), [
            'nom' => $nom,
            'prenom' => $prenom,
            'date_naissance' => $date_naissance,
            'date_mariage' => $date_mariage,
            'membre_id' => $membre->id,
        ]);

        $conjoint->refresh();

        $response->assertRedirect(route('conjoint.index'));
        $response->assertSessionHas('conjoint.id', $conjoint->id);

        $this->assertEquals($nom, $conjoint->nom);
        $this->assertEquals($prenom, $conjoint->prenom);
        $this->assertEquals(Carbon::parse($date_naissance), $conjoint->date_naissance);
        $this->assertEquals(Carbon::parse($date_mariage), $conjoint->date_mariage);
        $this->assertEquals($membre->id, $conjoint->membre_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $conjoint = Conjoint::factory()->create();

        $response = $this->delete(route('conjoint.destroy', $conjoint));

        $response->assertRedirect(route('conjoint.index'));

        $this->assertModelMissing($conjoint);
    }
}
