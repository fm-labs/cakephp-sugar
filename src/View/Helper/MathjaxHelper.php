<?php

namespace Sugar\View\Helper;

use Cake\View\Helper;
use Cupcake\Cupcake;

class MathjaxHelper extends Helper
{
    protected $_scriptsLoaded = false;

    protected $_defaultConfig = [
        'jsSrc' => 'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js',
        'inlineDelimiters' => [['$', '$'], ['\\(', '\\)']]
    ];

    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->loadScripts();
    }

    public function loadScripts(): void
    {
        if ($this->_scriptsLoaded) {
            return;
        }
//        $scriptTemplate = <<<SCRIPT
//    window.MathJax = {
//      tex: {
//        inlineMath: [['$', '$'] /*, ['\\(', '\\)']*/]
//      },
//      svg: {
//        fontCache: 'global'
//      }
//    };
//    (function () {
//      var script = document.createElement('script');
//      script.src = 'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js';
//      script.async = true;
//      document.head.appendChild(script);
//    })();
//SCRIPT;
        $scriptTemplate = <<<SCRIPT
    window.MathJax = %s;
    (function () {
      var script = document.createElement('script');
      script.src = '%s';
      script.async = true;
      document.head.appendChild(script);
    })();
SCRIPT;

        $jsParams = [
            'tex' => [
                'inlineMath' => $this->getConfig('inlineDelimiters', [['$', '$']])
            ],
            'svg' => [
                'fontCache' => 'global'
            ]
        ];

        $jsSrc = $this->getConfig('jsSrc');
        $jsParams = Cupcake::doFilter('content_mathjax_params', $jsParams);
        $js = sprintf($scriptTemplate, json_encode($jsParams), $jsSrc);

        $this->_View->Html->scriptBlock($js, ['block' => true]);
    }
}
