<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * MomentJs helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class MomentJsHelper extends Helper
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
        $this->Html->script('Sugar./vendor/momentjs/moment.min.js', ['block' => true]);
    }
}
