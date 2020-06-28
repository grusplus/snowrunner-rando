<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         1.2.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Test\TestCase\Controller;

use App\Controller\PagesController;
use Cake\Core\App;
use Cake\Core\Configure;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\TestSuite\IntegrationTestCase;
use Cake\View\Exception\MissingTemplateException;
use CakeDC\Users\Test\Fixture\UsersFixture;

/**
 * ProfilesControllerTest class
 */
class ProfilesControllerTest extends BaseIntegrationTestCase
{

    public $fixtures = ['plugin.CakeDC/Users.users'];

    /**
     * testDisplay method
     *
     * @return void
     */
    public function testEditProfileLoggedIn()
    {
        $this->get('/profiles/edit/00000000-0000-0000-0000-000000000001');
        $this->assertResponseOk();
    }


}
