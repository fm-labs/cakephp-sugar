<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\Core\Configure;
use Cake\View\Helper;

/**
 * Class SweetAlert2Helper
 * @package Sugar\View\Helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class SweetAlert2Helper extends Helper
{
    public $helpers = ['Html'];

    /**
     * {@inheritDoc}
     */
    public function initialize(array $config): void
    {
        if (Configure::read('debug')) {
            $this->Html->css('/sugar/libs/sweetalert2/sweetalert2.css', ['block' => true]);
            $this->Html->script('/sugar/libs/sweetalert2/sweetalert2.js', ['block' => true]);
        } else {
            $this->Html->css('/sugar/libs/sweetalert2/sweetalert2.min.css', ['block' => true]);
            $this->Html->script('/sugar/libs/sweetalert2/sweetalert2.min.js', ['block' => true]);
        }
    }
}
