<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Jquery helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class JqueryHelper extends Helper
{
    public array $helpers = ['Html'];

    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [
        'scriptUrl' => 'Sugar./libs/jquery/jquery.min.js',
        'scriptBlock' => 'headjs'
    ];

    public function initialize(array $config): void
    {
        $this->Html->script($this->getConfig('scriptUrl'), ['block' => $this->getConfig('scriptBlock')]);
    }
}
