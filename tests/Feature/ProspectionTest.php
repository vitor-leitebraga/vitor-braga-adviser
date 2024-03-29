<?php


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProspectionTest extends TestCase
{
    use RefreshDatabase;

	private array $formData;

	protected function setUp(): void
	{
		parent::setUp();
		$this->formData = [
			'categories' => ['Home', 'Auto', "Recreational Vehicle"],
			'firstname' => "Jake",
			'lastname' => "Kashue",
			'email' => "jakekashue@gmail.com",
			'phone' => "(123) 123-4321",
			'contactpreference' => 'email',
			'address' => "Flower Street 201",
			'complement' => "Apt 402, D",
			'state' => 'TX',
			'city' => "Austin",
			'zipcode' => "43212"
		];
	}

    public function test_prospection_screen_can_be_rendered(): void
    {
        $response = $this->get('/insurance');
        $response->assertStatus(200);
    }

	public function test_missing_personal_data_in_prospection_form(): void
	{
		$this->formData['firstname'] = '';
		$this->post('/insurance', $this->formData)->assertInvalid('firstname');
	}

	public function test_missing_address_data_in_prospection_form(): void
	{
		$this->formData['address'] = '';
		$this->post('/insurance', $this->formData)->assertInvalid('address');
	}
}
