<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\View\Helper;
use Cake\View\StringTemplateTrait;

/**
 * FlagIcon helper.
 *
 * Wrapper for 'flag-icons' npm package.
 */
class FlagIconHelper extends Helper
{
    use StringTemplateTrait;

    /**
     * Default configuration.
     *
     * @var array
     */
    protected array $_defaultConfig = [];

    public array $helpers = ['Html'];

    /**
     * {@inheritDoc}
     */
    public function initialize(array $config): void
    {
        $this->Html->css('/sugar/libs/flag-icons/css/flag-icons.min.css', ['block' => true]);

        $this->templater()->add([
            'flag_icon' => '<span class="fi fi-{{flag}}"{{attrs}}></span>',
            //'flag_icon' => '<span class="flag-icon flag-icon-{{flag}}"{{attrs}}></span>',
            //'flag_icon_wrapper' => '<div class="flag-wrapper"><div class="img-thumbnail flag flag-icon-background flag-icon-{{flag}}"></div></div>'
        ]);
    }

    /**
     * @param string $flag Flag icon ( ISO 3166-1-alpha-2 code )
     * @param array $options Icon options
     * @return string
     */
    public function create($flag, $options = [])
    {
        return $this->templater()->format('flag_icon', [
            'flag' => strtolower($flag),
            'attrs' => $this->templater()->formatAttributes($options),
        ]);
    }
}
