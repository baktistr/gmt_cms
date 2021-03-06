<?php

namespace Tests\Feature\Api\Auth;

use App\Notifications\Auth\EmailVerificationNotification;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class VerificationEmailTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Default valid params for this test class.
     *
     * @param $params
     * @return array
     */
    private function validParams($params = [])
    {
        return array_merge([
            'name'         => 'Muh Ghazali Akbar',
            'username'     => 'muhghazaliakbar',
            'email'        => 'muhghazaliakbar@live.com',
            'address'      => 'Jl. AP Pettarani Makassar',
            'phone_number' => '+6285110374321',
            'password'     => 'my-password',
        ], $params);
    }

    /** @test */
    public function can_send_verification_email()
    {
        $this->withoutExceptionHandling();
        Notification::fake();

        $this->postJson('/api/auth/register', $this->validParams())
             ->assertCreated();

        $user = User::latest()->first();

        Notification::assertSentTo($user, EmailVerificationNotification::class);
    }

    /** @test */
    public function can_verify_account()
    {
        $this->markTestSkipped();
        $user = factory(User::class)->state('unverified')->create();
    }

    public function can_not_verify_account_with_wrong_code()
    {
    }
}
