<?php
declare(strict_types=1);

namespace Sugar\View\Widget;

use Cake\View\Form\ContextInterface;
use Cake\View\View;
use Cake\View\Widget\BasicWidget;

class HtmlTextWidget extends BasicWidget
{
    /**
     * {@inheritDoc}
     */
    public function __construct($templates, View $view)
    {
        $view->loadHelper('Sugar.HtmlEditor');

        parent::__construct($templates);
    }

    /**
     * Render a text area element which will be converted to a tinymce htmleditor.
     *
     * Data supports the following keys
     *
     * @param array $data The data to build a textarea with.
     * @param \Cake\View\Form\ContextInterface $context The current form context.
     * @return string HTML elements.
     */
    public function render(array $data, ContextInterface $context): string
    {
        $data += [
            'val' => '',
            'name' => '',
            'escape' => true,
            'class' => '',
        ];

        $data['class'] = $data['class'] ? $data['class'] . ' htmltext' : 'htmltext';

        $this->_templates->add([
            'htmlText' => '<textarea name="{{name}}"{{attrs}}>{{value}}</textarea>',
        ]);

        $html = $this->_templates->format('htmlText', [
            'name' => $data['name'],
            'value' => $data['escape'] ? h($data['val']) : $data['val'],
            'attrs' => $this->_templates->formatAttributes(
                $data,
                ['name', 'val', 'type']
            ),
        ]);

        return $html;
    }
}
