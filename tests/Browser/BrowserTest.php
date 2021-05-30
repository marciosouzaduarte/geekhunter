<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Chrome;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Faker\Factory as Faker;

class BrowserTest extends DuskTestCase
{
    // Remove all tables
    //use DatabaseMigrations;

    /** @test */
    public function check_site_is_correct()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('geekhunter');
        });
    }

    /** @test */
    public function check_if_login_is_working()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', 'souzaduarte@gmail.com')
                    ->type('password', '123456789')
                    ->press(__('Login'))
                    ->assertPathIs('/home');
        });
    }

    /** @test */
    public function check_if_register_is_working()
    {
        $this->browse(function ($browser) {
            $faker = Faker::create();
            $browser->visit('/register')
                    ->type('name', $faker->name)
                    ->type('email', $faker->email)
                    ->type('password', '123456789')
                    ->type('password_confirmation', '123456789')
                    ->press(__('Register'))
                    ->assertPathIs('/home')
                    ->assertSee('Bem vindo');
        });
    }
    
}
