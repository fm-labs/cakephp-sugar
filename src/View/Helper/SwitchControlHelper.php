<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\View\Helper;

/**
 * Class SwitchControlHelper
 * @package Sugar\View\Helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 * @property \Cake\View\Helper\FormHelper $Form
 */
class SwitchControlHelper extends Helper
{
    public $helpers = ['Html', 'Form'];

    /**
     * {@inheritDoc}
     */
    public function initialize(array $config): void
    {
        $this->Html->css('Sugar./vendor/bootstrap-switch/css/bootstrap3/bootstrap-switch.css', ['block' => true]);
        $this->Html->script('Sugar./vendor/bootstrap-switch/js/bootstrap-switch.js', ['block' => true]);
        $this->Form->addWidget('switch', ['Sugar\View\Widget\SwitchControlWidget', '_view']);
    }
}
