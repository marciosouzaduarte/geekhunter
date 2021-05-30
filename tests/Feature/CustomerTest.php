<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /** @test */
    public function site_is_upper_in_server()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function only_logged_user_can_see_company_list()
    {
        $response = $this->get('/company');
        $response->assertRedirect('/login');
    }
}
