<?php
namespace App\Test\TestCase\Controller;

use App\Controller\BalancesController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\BalancesController Test Case
 *
 * TODO: Update the bakery to do this stuff
 */
class BalancesControllerTest extends BaseIntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.balances',
        'app.accounts'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/balances');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/balances/view/1');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->get('/balances/add');
        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/balances/edit/1');
        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEditPost()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/balances/edit/1', ['amount' => '9999123']);

        $this->assertResponseSuccess();
        $table = TableRegistry::get('Balances');
        $object = $table->find()->where(['id' => 1])->first();
        $this->assertEquals(9999123, $object->amount);
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/balances/delete/1', []);

        $this->assertResponseSuccess();
        $table = TableRegistry::get('Balances');
        $query = $table->find()->where(['id' => 1]);
        $this->assertEquals(0, $query->count());
    }
}
