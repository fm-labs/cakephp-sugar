<?php
declare(strict_types=1);

namespace Sugar\View\Widget;

use Cake\View\Form\ContextInterface;
use Cake\View\StringTemplate;
use Cake\View\View;
use Cake\View\Widget\BasicWidget;
use Cake\View\Widget\DateTimeWidget as CakeDateTimeWidget;
use DateTime;

class DatePickerWidget extends CakeDateTimeWidget
{
    /**
     * @var \Cake\View\Widget\BasicWidget
     */
    protected $_text;

    /**
     * {@inheritDoc}
     */
    public function __construct(StringTemplate $templates, BasicWidget $text, View $view)
    {
        $this->_templates = $templates;
        $this->_text = $text;

        $view->loadHelper('Sugar.Datepicker');
    }

    /**
     * {@inheritDoc}
     */
    public function render(array $data, ContextInterface $context): string
    {
        $data = array_merge([
            'escape' => true,
            'class' => 'datepicker',
            'options' => [],
            'id' => null,
            'name' => null,
            'val' => null,
        ], $data);

        $data['type'] = 'text';
        if ($data['val']) {
            if (!is_object($data['val'])) {
                $data['val'] = new DateTime($data['val']);
            }
            $data['data-value'] = $data['value'] = date("Y-m-d", $data['val']->getTimestamp());
        }
        unset($data['val']);
        unset($data['options']);

        $input = $this->_text->render($data, $context);

        $pickerOptions = [
            //'format' => 'dd.mm.yyyy',
            'format' => 'yyyy-mm-dd',
            'formatSubmit' => 'yyyy-mm-dd',
            'hiddenPrefix' => null,
            'hiddenSuffix' => null,
            'hiddenName' => true,
        ];
        $scriptTemplate = '<script>$(document).ready(function() { $("#%s").pickadate(%s); });</script>';
        $script = sprintf($scriptTemplate, $data['id'], json_encode($pickerOptions));

        return $input . $script;
    }
}
