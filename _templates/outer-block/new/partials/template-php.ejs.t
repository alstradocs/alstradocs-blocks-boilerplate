---
to: <%= name %>/partials/<%= name %>.php
---
<?php

namespace AlstradocsBlocksBoilerplatePlugin\Block\Domain\<%= h.capitalize(name) %>;


class Partials {

    public static function output($attributes, $content): string { 
        ob_start(); 
    ?>
    <div id="<%= name %>-block-container" class="alstradocs-block-container alstradocs-outer-block-container">
        <?php echo $content; ?>
    </div>  
    <?php 
        return (string)ob_get_clean();
    }
    
}



