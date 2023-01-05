<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Bootstrap helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class BootstrapHelper extends Helper
{
    public $helpers = ['Html'];

    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];

    public function initialize(array $config): void
    {
        $this->Html->css('Sugar./libs/bootstrap/dist/css/bootstrap.min.css', ['block' => true]);
        $this->Html->script('Sugar./libs/bootstrap/dist/js/bootstrap.min.js', ['block' => true]);
    }
}
