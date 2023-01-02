<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\Event\Event;
use Cake\View\Helper;

/**
 * Class HtmlEditorHelper
 *
 * @package Sugar\View\Helper
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class HtmlEditorHelper extends Helper
{
    public $helpers = ['Html'];

    /**
     * @param \Cake\Event\Event $event The event object
     * @return void
     */
    public function beforeLayout(Event $event)
    {
        $this->Html->script('/sugar/libs/tinymce/tinymce.min', ['block' => 'script']);
        $this->Html->script('/sugar/libs/tinymce/jquery.tinymce.min', ['block' => 'script']);
        $this->Html->script('/sugar/js/sugar.htmleditor.js', ['block' => 'script']);
    }
}
