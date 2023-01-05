<?php
declare(strict_types=1);

namespace Sugar\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Sugar\View\Helper\FontAwesomeHelper;

/**
 * Sugar\View\Helper\FontAwesomeHelper Test Case
 */
class FontAwesomeHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Sugar\View\Helper\FontAwesomeHelper
     */
    protected $FontAwesome;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->FontAwesome = new FontAwesomeHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->FontAwesome);

        parent::tearDown();
    }
}
