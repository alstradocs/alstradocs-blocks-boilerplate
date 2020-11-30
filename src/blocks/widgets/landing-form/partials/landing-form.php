<?php

namespace AlstradocsBlocksBoilerplatePlugin\Blocks\LandingForm\Partials;

function output($attributes): string
{
    ob_start(); ?>

    <div id="landing-form-root"></div>
    
    <?php
    return (string)ob_get_clean();
}
