<?php
declare(strict_types=1);

namespace Sugar\View\Helper;

use Cake\View\Helper;
use Cake\View\StringTemplateTrait;


/**
 * FontAwesome helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class FontAwesome4Helper extends Helper
{
    public $helpers = ['Html'];

    use StringTemplateTrait;

    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [
        'defaultTemplate' => 'fontawesome',
        'templates' => [
            'fa_icon' => '<i class="fa fa-{{class}}"{{attrs}}></i>',
        ],
    ];

    public function initialize(array $config): void
    {
        $this->Html->css('Sugar./libs/fontawesome/css/font-awesome.min.css', ['block' => true]);
    }

    /**
     * @param string $icon Icon name
     * @param array $options Icon options
     * @return null|string
     */
    public function icon(string $icon, array $options = []): string
    {
        $options += ['class' => null];
        $class = trim(sprintf('%s %s', $icon, (string)$options['class']));

        return $this->templater()->format('fa_icon', [
            'class' => $class,
            'attrs' => $this->templater()->formatAttributes($options, ['class']),
        ]);
    }
}
