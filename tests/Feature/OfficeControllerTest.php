<?php

namespace Tests\Feature;

use App\Models\Office;
use Tests\TestCase;

class OfficeControllerTest extends TestCase
{
    /**
     * @var string
     */
    private string $officeEndpoint = '/api/offices';

    /**
     * Check with no search we get all offices.
     *
     * @return void
     */
    public function test_get_offices_no_query_params(): void
    {
        $office1 = Office::factory()->create();
        $office2 = Office::factory()->create();

        $response = $this->get($this->officeEndpoint);

        $response->assertStatus(200);

        $responseContentArr = json_decode($response->getContent());

        $returnedOffice1 = array_shift($responseContentArr);
        $returnedOffice2 = array_shift($responseContentArr);

        $this->assertEquals($office1->name, $returnedOffice1->name);
        $this->assertEquals($office1->price, $returnedOffice1->price);
        $this->assertEquals($office1->offices, $returnedOffice1->offices);
        $this->assertEquals($office1->tables, $returnedOffice1->tables);
        $this->assertEquals($office1->sqm, $returnedOffice1->sqm);

        $this->assertEquals($office2->name, $returnedOffice2->name);
        $this->assertEquals($office2->price, $returnedOffice2->price);
        $this->assertEquals($office2->offices, $returnedOffice2->offices);
        $this->assertEquals($office2->tables, $returnedOffice2->tables);
        $this->assertEquals($office2->sqm, $returnedOffice2->sqm);

        $office1->forceDelete();
        $office2->forceDelete();
    }

    /**
     * Check with a search we get the office name.
     *
     * @return void
     */
    public function test_get_offices_search_name(): void
    {
        $office1 = Office::factory()->create(
            [
                'name' => 'veryuniqueofficename'
            ]
        );
        $office2 = Office::factory()->create();

        $response = $this->get($this->officeEndpoint . '?query=veryuniqueofficename');

        $response->assertStatus(200);

        $responseContentArr = json_decode($response->getContent());

        $this->assertCount(1, $responseContentArr);

        $returnedOffice = reset($responseContentArr);

        $this->assertEquals($office1->name, $returnedOffice->name);
        $this->assertEquals($office1->price, $returnedOffice->price);
        $this->assertEquals($office1->offices, $returnedOffice->offices);
        $this->assertEquals($office1->tables, $returnedOffice->tables);
        $this->assertEquals($office1->sqm, $returnedOffice->sqm);

        $office1->forceDelete();
        $office2->forceDelete();
    }

    /**
     * Check with a search we get the office price.
     *
     * @return void
     */
    public function test_get_offices_search_price(): void
    {
        $office1 = Office::factory()->create(
            [
                'price' => 1337,
                'offices' => 1,
                'tables' => 1,
                'sqm' => 1
            ]
        );
        $office2 = Office::factory()->create(
            [
                'price' => 1,
                'offices' => 1,
                'tables' => 1,
                'sqm' => 1
            ]
        );

        $response = $this->get($this->officeEndpoint . '?query=1337');

        $response->assertStatus(200);

        $responseContentArr = json_decode($response->getContent());

        $this->assertCount(1, $responseContentArr);

        $returnedOffice = reset($responseContentArr);

        $this->assertEquals($office1->name, $returnedOffice->name);
        $this->assertEquals($office1->price, $returnedOffice->price);
        $this->assertEquals($office1->offices, $returnedOffice->offices);
        $this->assertEquals($office1->tables, $returnedOffice->tables);
        $this->assertEquals($office1->sqm, $returnedOffice->sqm);

        $office1->forceDelete();
        $office2->forceDelete();
    }

    /**
     * Check with a search we get the office's office numbers.
     *
     * @return void
     */
    public function test_get_offices_search_offices(): void
    {
        $office1 = Office::factory()->create(
            [
                'price' => 1,
                'offices' => 1337,
                'tables' => 1,
                'sqm' => 1
            ]
        );
        $office2 = Office::factory()->create(
            [
                'price' => 1,
                'offices' => 1,
                'tables' => 1,
                'sqm' => 1
            ]
        );

        $response = $this->get($this->officeEndpoint . '?query=1337');

        $response->assertStatus(200);

        $responseContentArr = json_decode($response->getContent());

        $this->assertCount(1, $responseContentArr);

        $returnedOffice = reset($responseContentArr);

        $this->assertEquals($office1->name, $returnedOffice->name);
        $this->assertEquals($office1->price, $returnedOffice->price);
        $this->assertEquals($office1->offices, $returnedOffice->offices);
        $this->assertEquals($office1->tables, $returnedOffice->tables);
        $this->assertEquals($office1->sqm, $returnedOffice->sqm);

        $office1->forceDelete();
        $office2->forceDelete();
    }

    /**
     * Check with a search we get the office's tables.
     *
     * @return void
     */
    public function test_get_offices_search_tables(): void
    {
        $office1 = Office::factory()->create(
            [
                'price' => 1,
                'offices' => 1,
                'tables' => 1337,
                'sqm' => 1
            ]
        );
        $office2 = Office::factory()->create(
            [
                'price' => 1,
                'offices' => 1,
                'tables' => 1,
                'sqm' => 1
            ]
        );

        $response = $this->get($this->officeEndpoint . '?query=1337');

        $response->assertStatus(200);

        $responseContentArr = json_decode($response->getContent());

        $this->assertCount(1, $responseContentArr);

        $returnedOffice = reset($responseContentArr);

        $this->assertEquals($office1->name, $returnedOffice->name);
        $this->assertEquals($office1->price, $returnedOffice->price);
        $this->assertEquals($office1->offices, $returnedOffice->offices);
        $this->assertEquals($office1->tables, $returnedOffice->tables);
        $this->assertEquals($office1->sqm, $returnedOffice->sqm);

        $office1->forceDelete();
        $office2->forceDelete();
    }

    /**
     * Check with a search we get the office's sqm.
     *
     * @return void
     */
    public function test_get_offices_search_sqm(): void
    {
        $office1 = Office::factory()->create(
            [
                'price' => 1,
                'offices' => 1,
                'tables' => 1,
                'sqm' => 1337
            ]
        );
        $office2 = Office::factory()->create(
            [
                'price' => 1,
                'offices' => 1,
                'tables' => 1,
                'sqm' => 1
            ]
        );

        $response = $this->get($this->officeEndpoint . '?query=1337');

        $response->assertStatus(200);

        $responseContentArr = json_decode($response->getContent());

        $this->assertCount(1, $responseContentArr);

        $returnedOffice = reset($responseContentArr);

        $this->assertEquals($office1->name, $returnedOffice->name);
        $this->assertEquals($office1->price, $returnedOffice->price);
        $this->assertEquals($office1->offices, $returnedOffice->offices);
        $this->assertEquals($office1->tables, $returnedOffice->tables);
        $this->assertEquals($office1->sqm, $returnedOffice->sqm);

        $office1->forceDelete();
        $office2->forceDelete();
    }

    /**
     * Test getting mixed search results.
     *
     * @return void
     */
    public function test_get_offices_search_mixed(): void
    {
        $office1 = Office::factory()->create(
            [
                'price' => 1,
                'offices' => 1337,
                'tables' => 1,
                'sqm' => 1
            ]
        );
        $office2 = Office::factory()->create(
            [
                'price' => 1,
                'offices' => 1,
                'tables' => 1337,
                'sqm' => 1
            ]
        );

        $response = $this->get($this->officeEndpoint . '?query=1337');

        $response->assertStatus(200);

        $responseContentArr = json_decode($response->getContent());

        $this->assertCount(2, $responseContentArr);

        $returnedOffice1 = array_shift($responseContentArr);
        $returnedOffice2 = array_shift($responseContentArr);

        $this->assertEquals($office1->name, $returnedOffice1->name);
        $this->assertEquals($office1->price, $returnedOffice1->price);
        $this->assertEquals($office1->offices, $returnedOffice1->offices);
        $this->assertEquals($office1->tables, $returnedOffice1->tables);
        $this->assertEquals($office1->sqm, $returnedOffice1->sqm);

        $this->assertEquals($office2->name, $returnedOffice2->name);
        $this->assertEquals($office2->price, $returnedOffice2->price);
        $this->assertEquals($office2->offices, $returnedOffice2->offices);
        $this->assertEquals($office2->tables, $returnedOffice2->tables);
        $this->assertEquals($office2->sqm, $returnedOffice2->sqm);

        $office1->forceDelete();
        $office2->forceDelete();
    }

    /**
     * Check if we use a search that won't exist that nothing is returned.
     */
    public function test_get_offices_search_no_results(): void
    {
        $office = Office::factory()->create();

        $response = $this->get($this->officeEndpoint . '?query=doesnotexist');

        $response->assertStatus(400);

        $responseContent = json_decode($response->getContent());

        $this->assertEquals('Sorry cannot find any office matching that criteria.', $responseContent->Errors);

        $office->forceDelete();
    }
}
