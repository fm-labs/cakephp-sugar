<?php
declare(strict_types=1);

namespace Sugar\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Sugar\View\Helper\MomentJsHelper;

/**
 * Sugar\View\Helper\MomentJsHelper Test Case
 */
class MomentJsHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Sugar\View\Helper\MomentJsHelper
     */
    protected $MomentJs;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->MomentJs = new MomentJsHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MomentJs);

        parent::tearDown();
    }
}
