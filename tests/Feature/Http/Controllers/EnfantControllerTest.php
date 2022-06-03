<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Conjoint;
use App\Models\Enfant;
use App\Models\Membre;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EnfantController
 */
class EnfantControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $enfants = Enfant::factory()->count(3)->create();

        $response = $this->get(route('enfant.index'));

        $response->assertOk();
        $response->assertViewIs('enfant.index');
        $response->assertViewHas('enfants');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('enfant.create'));

        $response->assertOk();
        $response->assertViewIs('enfant.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EnfantController::class,
            'store',
            \App\Http\Requests\EnfantStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $prenom = $this->faker->word;
        $date_naissance = $this->faker->date();
        $membre = Membre::factory()->create();
        $conjoint = Conjoint::factory()->create();

        $response = $this->post(route('enfant.store'), [
            'prenom' => $prenom,
            'date_naissance' => $date_naissance,
            'membre' => $membre->id,
            'conjoint' => $conjoint->id,
        ]);

        $enfants = Enfant::query()
            ->where('prenom', $prenom)
            ->where('date_naissance', $date_naissance)
            ->where('membre', $membre->id)
            ->where('conjoint', $conjoint->id)
            ->get();
        $this->assertCount(1, $enfants);
        $enfant = $enfants->first();

        $response->assertRedirect(route('enfant.index'));
        $response->assertSessionHas('enfant.id', $enfant->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $enfant = Enfant::factory()->create();

        $response = $this->get(route('enfant.show', $enfant));

        $response->assertOk();
        $response->assertViewIs('enfant.show');
        $response->assertViewHas('enfant');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $enfant = Enfant::factory()->create();

        $response = $this->get(route('enfant.edit', $enfant));

        $response->assertOk();
        $response->assertViewIs('enfant.edit');
        $response->assertViewHas('enfant');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EnfantController::class,
            'update',
            \App\Http\Requests\EnfantUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $enfant = Enfant::factory()->create();
        $prenom = $this->faker->word;
        $date_naissance = $this->faker->date();
        $membre = Membre::factory()->create();
        $conjoint = Conjoint::factory()->create();

        $response = $this->put(route('enfant.update', $enfant), [
            'prenom' => $prenom,
            'date_naissance' => $date_naissance,
            'membre' => $membre->id,
            'conjoint' => $conjoint->id,
        ]);

        $enfant->refresh();

        $response->assertRedirect(route('enfant.index'));
        $response->assertSessionHas('enfant.id', $enfant->id);

        $this->assertEquals($prenom, $enfant->prenom);
        $this->assertEquals(Carbon::parse($date_naissance), $enfant->date_naissance);
        $this->assertEquals($membre->id, $enfant->membre);
        $this->assertEquals($conjoint->id, $enfant->conjoint);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $enfant = Enfant::factory()->create();

        $response = $this->delete(route('enfant.destroy', $enfant));

        $response->assertRedirect(route('enfant.index'));

        $this->assertModelMissing($enfant);
    }
}
