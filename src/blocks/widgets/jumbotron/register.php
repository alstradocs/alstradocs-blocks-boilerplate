<?php

namespace AlstradocsBlocksBoilerplatePlugin\Block\Domain\Jumbotron;

use AlstradocsBlocksBoilerplatePlugin\Block\Scripts;
use AlstradocsBlocksBoilerplatePlugin\Block\AssetLoader;
use AlstradocsBlocksBoilerplatePlugin\Block\Framework\BlockScript;
use AlstradocsBlocksBoilerplatePlugin\Block\Domain\Jumbotron\Partials;

require_once __DIR__ . '/partials/jumbotron.php';

class Register extends BlockScript {

    protected $blockHandle = 'jumbotron';

    /**
     * 
     */
    public function setup() {
        parent::setup();
        register_block_type_from_metadata(__DIR__, ['render_callback' => [$this, 'render']]);
    }
    
    /**
     * 
     */
    public function render($attributes, $content): string
    {   
        return Partials::output($attributes, $content);
    }


}

