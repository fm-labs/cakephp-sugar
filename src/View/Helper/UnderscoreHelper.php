<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Underscore helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class UnderscoreHelper extends Helper
{
    public array $helpers = ['Html'];

    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [];

    public function initialize(array $config): void
    {
        $this->Html->script('Sugar./libs/underscore/underscore-min.js', ['block' => true]);
    }
}
