<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\Event\Event;
use Cake\View\Helper;

/**
 * Class JsTreeHelper
 * @package Sugar\View\Helper
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class JsTreeHelper extends Helper
{
    public $helpers = ['Html'];

    /**
     * @param \Cake\Event\Event $event The event object
     * @return void
     */
    public function beforeLayout(Event $event)
    {
        $this->Html->css('/sugar/css/jstree/themes/sugar/style', ['block' => true]);
        $this->Html->script('/sugar/libs/jstree/jstree.min', ['block' => 'script']);
    }
}
