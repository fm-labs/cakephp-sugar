<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\View\Helper;

/**
 * Class CodeEditorHelper
 * @package Sugar\View\Helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 * @property \Cake\View\Helper\FormHelper $Form
 */
class CodeEditorHelper extends Helper
{
    public $helpers = ['Html', 'Form'];

    protected $_defaultConfig = [
        'scriptUrl' => '/sugar/vendor/ace/1.4.1-noconflict/ace.js',
        'scriptBlock' => true,
    ];

    /**
     * {@inheritDoc}
     */
    public function initialize(array $config): void
    {
        $this->Html->script($this->getConfig('scriptUrl'), [
            'block' => $this->getConfig('scriptBlock'),
        ]);

        $this->Form->addWidget('codeeditor', ['Sugar\View\Widget\CodeEditorWidget', '_view']);
    }
}
