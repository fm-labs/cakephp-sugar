<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\View\Helper;

/**
 * Class DateRangePickerHelper
 * @package Sugar\View\Helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 * @property \Cake\View\Helper\FormHelper $Form
 */
class DateRangePickerHelper extends Helper
{
    public array $helpers = ['Html', 'Form'];

    /**
     * {@inheritDoc}
     */
    public function initialize(array $config): void
    {
        $this->Html->css('/sugar/libs/daterangepicker/daterangepicker.css', ['block' => true]);
        $this->Html->script('/sugar/libs/daterangepicker/daterangepicker.js', ['block' => true]);

        $this->Form->addWidget('daterange', ['Sugar\View\Widget\DateRangePickerWidget', '_view']);
    }
}
