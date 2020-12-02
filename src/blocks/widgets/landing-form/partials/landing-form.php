<?php

namespace AlstradocsBlocksBoilerplatePlugin\Blocks\Domain\LandingForm;


class Partials {

    public static function output($attributes, $content): string { 
        ob_start(); 
    ?>
    <div id="landing-form-root"></div>
    <?php 
        return (string)ob_get_clean();
    }
    
}
