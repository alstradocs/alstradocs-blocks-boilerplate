<?php

namespace AlstradocsBlocksBoilerplatePlugin\Blocks\Domain\Jumbotron;

use AlstradocsBlocksBoilerplatePlugin\Block\Scripts;
use AlstradocsBlocksBoilerplatePlugin\Block\AssetLoader;
use AlstradocsBlocksBoilerplatePlugin\Blocks\Framework\BlockScript;
use AlstradocsBlocksBoilerplatePlugin\Blocks\Domain\Jumbotron\Partials;

require_once __DIR__ . '/partials/jumbotron.php';

class Register extends BlockScript {

    protected $blockHandle = 'jumbotron';
    
    /**
     * 
     */
    public function render($attributes, $content): string
    {   
        return Partials::output($attributes, $content);
    }


}

