<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\Core\Configure;
use Cake\View\Helper;

/**
 * Class Select2Helper
 * @package Sugar\View\Helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 * @property \Cake\View\Helper\FormHelper $Form
 */
class Select2Helper extends Helper
{
    public $helpers = ['Html', 'Form'];

    /**
     * {@inheritDoc}
     */
    public function initialize(array $config): void
    {
        if (Configure::read('debug')) {
            $this->Html->css('/sugar/libs/select2/dist/css/select2.css', ['block' => true]);
            $this->Html->css('/sugar/libs/select2-bootstrap-theme/dist/select2-bootstrap.css', ['block' => true]);
            $this->Html->script('/sugar/libs/select2/dist/js/select2.js', ['block' => true]);
        } else {
            $this->Html->css('/sugar/libs/select2/dist/css/select2.min.css', ['block' => true]);
            $this->Html->css('/sugar/libs/select2-bootstrap-theme/dist/select2-bootstrap.min.css', ['block' => true]);
            $this->Html->script('/sugar/libs/select2/dist/js/select2.min.js', ['block' => true]);
        }

        $this->Form->addWidget('select2', ['Sugar\View\Widget\Select2Widget', '_view']);
    }
}
