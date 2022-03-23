<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function itListsCustomers()
    {
        $response = $this->get('/api/customers');

        $response->assertStatus(200);
        $this->assertCount(15,$response->json('data'));
        $this->assertNotNull($response->json('data')[0]['tel']);

    }
    /**
     * @test
     */
    public function itCreatesCustomer(){
        $response = $this->post('/api/customers',[
            'name' => 'Mon premier client',
            'tel' => '06XXXXXX',
            'is_favourite' => true

        ]);

        $customers = Customer::all();
        $customer = Customer::first();

        $response->assertStatus(200);
        $this->assertEquals(1,$customers->count());
        $this->assertEquals('Mon premier client',$customer->name);

    }
}
