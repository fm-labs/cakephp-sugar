<?php
declare(strict_types=1);

namespace Sugar\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Sugar\View\Helper\JqueryHelper;

/**
 * Sugar\View\Helper\JqueryHelper Test Case
 */
class JqueryHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Sugar\View\Helper\JqueryHelper
     */
    protected $Jquery;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Jquery = new JqueryHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Jquery);

        parent::tearDown();
    }
}
