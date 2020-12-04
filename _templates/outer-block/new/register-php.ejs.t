---
to: <%= name %>/register.php
---
<?php

namespace AlstradocsBlocks\Blocks\Domain\<%= h.capitalize(name) %>;

use AlstradocsBlocks\Block\Scripts;
use AlstradocsBlocks\Block\AssetLoader;
use AlstradocsBlocks\Blocks\Framework\BlockScript;
use AlstradocsBlocks\Blocks\Domain\<%= h.capitalize(name) %>\Partials;

require_once __DIR__ . '/partials/<%= name %>.php';

class Register extends BlockScript {

    protected $blockHandle = '<%= name %>';
    
    /**
     * 
     */
    public function render($attributes, $content): string
    {   
        return Partials::output($attributes, $content);
    }


}




