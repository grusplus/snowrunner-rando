<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AccountsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AccountsController Test Case
 */
class BaseIntegrationTestCase extends IntegrationTestCase
{

    /**
     * Setup user account
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->session([
            'Auth' => [
                'User' => [
                    'id' => '00000000-0000-0000-0000-000000000001',
                    'username' => 'testing',
                    'email' => 'email@example.com',
                    'password' => 'testing',
                ]
            ]
        ]);

    }

    /**
     * Sometimes you need to see the output. Will dump an html file in the base folder of the app.
     *
     * @return void
     */
    protected function debugHTML()
    {
        file_put_contents("test-failure.html", $this->_response->body());
    }
}
