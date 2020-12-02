<?php

namespace AlstradocsBlocksBoilerplatePlugin\Blocks\Domain\LandingForm;

use AlstradocsBlocksBoilerplatePlugin\Block\Scripts;
use AlstradocsBlocksBoilerplatePlugin\Block\AssetLoader;
use AlstradocsBlocksBoilerplatePlugin\Blocks\Framework\BlockScript;
use AlstradocsBlocksBoilerplatePlugin\Blocks\Domain\LandingForm\Partials;

require_once __DIR__ . '/partials/landing-form.php';

class Register extends BlockScript {

    protected $blockHandle = 'landing-form';
    
    protected $frontendScripts = [
        'simple-react-validator' => 'https://cdn.jsdelivr.net/npm/simple-react-validator/dist/simple-react-validator.js',
        'moment-js' => 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js'
    ];

    /**
     * 
     */
    public function render($attributes, $content): string
    {   
        return Partials::output($attributes, $content);
    }


}
