<?php
namespace App\Test\TestCase\Model\Behavior;

use Cake\ORM\TableRegistry;
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
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bookmarks',
        'app.users',
        'app.tags',
        'app.bookmarks_tags'
    ];

    public function setUp()
    {
        parent::setUp();
        $config          = TableRegistry::exists('Bookmarks') ? [] : ['className' => 'App\Model\Table\BookmarksTable'];
        $this->Bookmarks = TableRegistry::get('Bookmarks', $config);
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

    public function testFindForUsers()
    {
        $count = $this->Bookmarks->find('forUser', ['user_id' => 1])->count();
        $this->assertEquals(1, $count);
        $count = $this->Bookmarks->find('forUser', ['user_id' => 0])->count();
        $this->assertEquals(0, $count);
    }
}
