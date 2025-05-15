<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\View\Helper;

class SumoSelectHelper extends Helper
{
    protected array $_defaultConfig = [
        'scriptUrl' => '/sugar/libs/sumoselect/jquery.sumoselect.min.js',
        'cssUrl' => '/sugar/libs/sumoselect/sumoselect.css',
        'sumo' => [],
    ];

    public array $helpers = ['Html', 'Form'];

    /**
     * {@inheritDoc}
     */
    public function initialize(array $config): void
    {
        $this->Html->css($this->getConfig('cssUrl'), ['block' => true]);
        $this->Html->script($this->getConfig('scriptUrl'), ['block' => true]);

        $this->Form->addWidget('sumoselect', ['Sugar\View\Widget\SumoSelectBoxWidget', '_view']);
    }

//    public function selectbox($options = [])
//    {
//        $defaultSumo = [
//            //'placeholder' => __d('sugar', 'Select Here'),
//            //'csvDispCount' => 3,
//            //'captionFormat' => __d('sugar', '{0} Selected'),
//            //'captionFormatAllSelected' => __d('sugar', '{0} all selected!'),
//        ];
//
//        $options = array_merge($defaultSumo, $this->getConfig('sumo'), $options);
//
//    }
}
