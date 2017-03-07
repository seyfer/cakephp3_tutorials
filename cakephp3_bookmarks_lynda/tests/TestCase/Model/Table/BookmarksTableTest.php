<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookmarksTable Test Case
 */
class BookmarksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BookmarksTable
     */
    public $Bookmarks;

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

    /**
     * setUp method
     *
     * @return void
     */
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
        unset($this->Bookmarks);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testNotUrl()
    {
        $value   = 'http://google.com';
        $context = [];
        $this->assertFalse($this->Bookmarks->notUrl($value, $context));
        $value   = 'foo';
        $context = [];
        $this->assertTrue($this->Bookmarks->notUrl($value, $context));
    }
}
