<?php
declare(strict_types=1);

namespace Sugar\View\Widget;

use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\View\Form\ContextInterface;
use Cake\View\View;
use Cake\View\Widget\BasicWidget;

/**
 * Class HtmlEditorWidget
 *
 * TinyMCE Html Editor widget
 *
 * @package Sugar\View\Widget
 */
class HtmlEditorWidget extends BasicWidget
{
    /**
     * Default TinyMCE html editor config
     * @see https://www.tinymce.com/docs
     * @var array
     */
    public static $defaultConfig = [
        ## General
        # A CSS selector for the areas that TinyMCE should make editable.
        'selector' => 'textarea.htmleditor',
        # Which plugins TinyMCE will attempt to load when starting up
        'plugins' => [
            'image link lists code table media paste wordcount importcss wordcount autoresize',
        ],
        # Show the element path within the status bar at the bottom of the editor.
        'elementpath' => true,
        # Height of the editable area in pixels.
        'height' => 300,

        'content_css' => null,

        ## Toolbar / Menu
        'menubar' => false,
        'menu' => [
            //'file' => [ 'title' => 'File', 'items' => 'newdocument'],
        ],
        'toolbar' => [
            'formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | blockquote | code',
            'undo redo | cut copy paste | link image media | table',
        ],
        ## URL Handling
        'convert_urls' => false, // TinyMCE default: true
        'relative_urls' => false, // TinyMCE default: true
        'remove_script_host' => false, // TinyMCE default: true
        'document_base_url' => '/',
        //'importcss_append' => true,
        'cache_suffix' => null,

        ## Content Filtering

        # Wrap any non-block elements or text in given element
        # https://www.tiny.cloud/docs/configure/content-filtering/#forced_root_block
        'forced_root_block' => '',
        'schema' => 'html5',

        ## Plugin: table
        'table_class_list' => [
            ['title' => 'None', 'value' => ''],
            ['title' => 'Standard', 'value' => 'table'],
            ['title' => 'Striped', 'value' => 'table table-striped'],
            ['title' => 'Condensed', 'value' => 'table table-condensed'],
            ['title' => 'Condensed Striped', 'value' => 'table table-condensed table-striped'],
            ['title' => 'Hover', 'value' => 'table table-hover'],
        ],
        'table_default_styles' => [
            'width' => '100%',
            'border-collapse' => 'collapse'
        ],
        'table_default_attributes' => [
            'border' => 0
        ],
        //'table_style_by_css' => true,

        ## Plugin: autoresize
        'autoresize_on_init' => true,
        'max_height' => 800,
        'min_height' => 400
    ];

    /**
     * {@inheritDoc}
     */
    public function __construct($templates, View $view)
    {
        static::$defaultConfig['document_base_url'] = Router::url('/', true);

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
            'id' => '',
            'editor' => [],
        ];

        $defaultClass = 'htmleditor form-control';
        $data['class'] = $data['class'] ? $data['class'] . ' ' . $defaultClass : $defaultClass;
        $data['id'] = uniqid($data['id'] . '-htmleditor');

        // load editor config by config reference (@[Config.Key])
        //@deprecated
        if ($data['editor'] && is_string($data['editor']) && preg_match('/^\@(.*)/', $data['editor'], $matches)) {
            $data['editor'] = Configure::read($matches[1]);
        } elseif ($data['editor'] && is_string($data['editor'])) {
            $confKey = 'HtmlEditor.' . $data['editor'];
            $data['editor'] = (array)Configure::read($confKey);
        }

        $data['editor'] = array_merge(static::$defaultConfig, $data['editor']);

        // convert urls
        $editor = [];
        array_walk($data['editor'], function ($val, $key) use (&$editor) {
            if (preg_match('/^\@(.*)$/', $key, $matches)) {
                $_key = $matches[1];

                // urls in cakephp can be arrays
                // check if given value is an url or a list of urls
                if (array_values($val) !== $val) {
                    $editor[$_key] = Router::url($val, true);
                } else {
                    $list = [];
                    array_walk($val, function ($_url) use (&$list) {
                        $list[] = Router::url($_url, true);
                    });
                }
            } else {
                $editor[$key] = $val;
            }
        });

        $editor['selector'] = '#' . $data['id'];
        //debug($editor);

        $this->_templates->add([
            'htmlEditor' => '<textarea name="{{name}}"{{attrs}}>{{value}}</textarea><script>{{editorScript}}</script>',
            //'htmlEditor' => '<div class="htmleditor"><textarea  data-htmleditor=\'{{editorConfig}}\' name="{{name}}"{{attrs}}>{{value}}</textarea></div>',
        ]);

        $selector = $editor['selector'];
        unset($editor['selector']);
        //$editorScript = "$(document).ready(function() { tinymce.init(" . json_encode($editor) .") });";
        $jsTemplate = '$(document).ready(function() { $("%s").tinymce(%s); });';
        $editorConfig = json_encode($editor);
        $editorScript = sprintf($jsTemplate, $selector, $editorConfig);

        return $this->_templates->format('htmlEditor', [
            'name' => $data['name'],
            'value' => $data['escape'] ? h($data['val']) : $data['val'],
            'editorConfig' => $editorConfig,
            'editorScript' => $editorScript,
            'attrs' => $this->_templates->formatAttributes(
                $data,
                ['name', 'val', 'type', 'editor']
            ),
        ]);
    }
}
