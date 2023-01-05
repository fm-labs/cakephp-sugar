<?php
declare(strict_types=1);

namespace Sugar\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use Sugar\View\Helper\UnderscoreHelper;

/**
 * Sugar\View\Helper\UnderscoreHelper Test Case
 */
class UnderscoreHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Sugar\View\Helper\UnderscoreHelper
     */
    protected $Underscore;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Underscore = new UnderscoreHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Underscore);

        parent::tearDown();
    }
}
