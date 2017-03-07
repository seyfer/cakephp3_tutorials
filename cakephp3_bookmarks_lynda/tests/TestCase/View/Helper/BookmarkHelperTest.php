<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\BookmarkHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\BookmarkHelper Test Case
 */
class BookmarkHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\BookmarkHelper
     */
    public $Bookmark;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view           = new View();
        $this->Bookmark = new BookmarkHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bookmark);

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

    public function testUrl()
    {
        $data     = ['title' => 'TITLE', 'url' => 'http://test.com'];
        $bookmark = new \App\Model\Entity\Bookmark($data);

        $output   = $this->Bookmark->url($bookmark);

        $expected = '<a href="http://test.com" title="TITLE" target="_blank">http://test.com</a>';
        $this->assertEquals($expected, $output);
    }
}
