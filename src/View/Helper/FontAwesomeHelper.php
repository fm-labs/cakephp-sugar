<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * FontAwesome helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class FontAwesomeHelper extends Helper
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
        $this->Html->css('Sugar./libs/fontawesome/css/font-awesome.min.css', ['block' => true]);
    }
}
