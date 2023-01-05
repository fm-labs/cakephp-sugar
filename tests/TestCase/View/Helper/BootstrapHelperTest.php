<?php
declare(strict_types=1);

namespace Sugar\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Sugar\View\Helper\BootstrapHelper;

/**
 * Sugar\View\Helper\BootstrapHelper Test Case
 */
class BootstrapHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Sugar\View\Helper\BootstrapHelper
     */
    protected $Bootstrap;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Bootstrap = new BootstrapHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Bootstrap);

        parent::tearDown();
    }
}
