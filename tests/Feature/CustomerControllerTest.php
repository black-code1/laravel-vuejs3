<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
{
    /**
     * @test
     */
    public function itListCustomers()
    {
        $response = $this->get('/api/customers');

        $response->assertStatus(200);
        $this->assertCount(15,$response->json('data'));
        $this->assertNotNull($response->json('data')[0]['tel']);

        // dd($response->json('data'));
    }
}
