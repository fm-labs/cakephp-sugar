<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\Event\Event;
use Cake\View\Helper;

/**
 * Class DatepickerHelper
 *
 * @package Sugar\View\Helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class DatepickerHelper extends Helper
{
    public $helpers = ['Html'];

    /**
     * @param \Cake\Event\Event $event The event object
     * @return void
     */
    public function beforeLayout(Event $event)
    {
        $this->Html->css('/sugar/libs/pickadate/themes/classic', ['block' => true]);
        $this->Html->css('/sugar/libs/pickadate/themes/classic.date', ['block' => true]);
        $this->Html->css('/sugar/libs/pickadate/themes/classic.time', ['block' => true]);
        $this->Html->script('/sugar/libs/pickadate/picker', ['block' => 'script']);
        $this->Html->script('/sugar/libs/pickadate/picker.date', ['block' => 'script']);
        $this->Html->script('/sugar/libs/pickadate/picker.time', ['block' => 'script']);
    }
}
