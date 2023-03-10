<?php
declare(strict_types=1);

namespace Sugar\View\Widget;

use Bootstrap\View\Widget\BasicWidget;
use Cake\View\Form\ContextInterface;
use Cake\View\View;
use Cake\View\Widget\CheckboxWidget;

class SwitchControlWidget extends CheckboxWidget
{
    /**
     * {@inheritDoc}
     */
    public function __construct($templates, View $view)
    {
        parent::__construct($templates);

        //$view->loadHelper('Sugar.SwitchControl');
    }

    /**
     * {@inheritDoc}
     */
    public function render(array $data, ContextInterface $context): string
    {
        if (!isset($data['id'])) {
            $data['id'] = uniqid('switchctrl');
        }

        $switch = [
            'size' => 'mini', // mini, small, normal, large
            'animate' => true,
            'disabled' => $data['disabled'] ?? false,
            'readonly' => $data['readonly'] ?? false,
            //'state' => true,
            //'indeterminate' => false,
            //'inverse' => false,
            //'radioAllOff' => false,
            //'onColor' => 'primary',
            //'offColor' => 'default',
            //'labelText' => '&nbsp;',
            //'handleWidth' => 'auto',
            //'labelWidth' => 'auto',
            //'baseClass' => 'bootstrap-switch',
            //'wrapperClass' => 'wrapper'
        ];

        if (isset($data['switch'])) {
            $switch = array_merge($switch, $data['switch']);
            unset($data['switch']);
        }

        $data['type'] = 'checkbox';
        $html = parent::render($data + $switch, $context);

        $tmpl = '<script>$(document).ready(function() { $(\'#%s\').bootstrapSwitch(%s); });</script>';
        $js = sprintf($tmpl, $data['id'], json_encode($switch));

        $hidden = new BasicWidget($this->_templates);
        $hiddenField = $hidden->render(['id' => false, 'type' => 'hidden', 'val' => '0', 'name' => $data['name']], $context);

        return $hiddenField . $html . $js;
    }
}
