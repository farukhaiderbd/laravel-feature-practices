<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\NewUserRegistrationEvent;
use App\Mail\WelcomeUserMail;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class ExampleTest extends TestCase
{
   use RefreshDatabase;

   protected function setUp(): void
   {
       parent::setUp();
       Session::start();

   }

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_entry_event(): void
    {
        Event::fake([
            NewUserRegistrationEvent::class,
        ]);
//        $this->withoutExceptionHandling();
        $this->post('/users',[
            'name'=>"Faruk Haider",
            '_token'=> csrf_token(),
            "email"=>"faruk-haider@gmail.com",
            'password'=> "12345678"
        ]);
        $this->assertDatabaseCount('users',1);
    }

    public function test_Welcome_User_Notify_email_Send()
    {
        $this->withoutExceptionHandling();
        Mail::fake();
        $this->post('/users',[
            'name'=>"Faruk Haider",
            '_token'=> csrf_token(),
            "email"=>"faruk-haider@gmail.com",
            'password'=> "12345678"
        ]);

        Mail::assertSent(WelcomeUserMail::class);
    }
}
