<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\UsersFindBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\UsersFindBehavior Test Case
 */
class UsersFindBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Behavior\UsersFindBehavior
     */
    public $UsersFind;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->UsersFind = new UsersFindBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersFind);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
