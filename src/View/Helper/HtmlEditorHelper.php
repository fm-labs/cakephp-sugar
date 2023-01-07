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
        $this->Html->script('Sugar./libs/tinymce/tinymce.min', ['block' => 'script']);
        $this->Html->script('Sugar./libs/tinymce/jquery.tinymce.min', ['block' => 'script']);
        //$this->Html->script('/admin/js/admin.htmleditor.js', ['block' => 'script']);
    }
}
