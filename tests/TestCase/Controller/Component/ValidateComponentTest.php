<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\ValidateComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\ValidateComponent Test Case
 */
class ValidateComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\ValidateComponent
     */
    public $Validate;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Validate = new ValidateComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Validate);

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
