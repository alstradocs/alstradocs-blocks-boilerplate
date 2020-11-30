<?php

namespace AlstradocsBlocksBoilerplatePlugin\Blocks\Jumbotron\Partials;

function output($attributes, $content): string { 
    ob_start(); 
?>
<div id="home-jumbotron-container" class="">
    <div class="home-jumbotron-text-container">
        <p class="home-jumbotron-text-lead"><?php echo $attributes['primary']; ?></p>
        <p class="home-jumbotron-text-sub"><?php echo $attributes['secondary']; ?></p>
        <div class="">
            <a class="home-jumbotron-btn" href="<?php echo get_site_url() ?>/about">Learn More</a>
        </div>
    </div>
    <div class="home-jumbotron-form-container">
        <div id="panel-12-9-2-1" class="so-panel widget widget_text panel-last-child" data-index="26">
            <div class="textwidget">
                <div role="form" class="wpcf7" id="wpcf7-f85-p12-o1" lang="en-US" dir="ltr">
                    <div class="screen-reader-response" aria-live="polite"></div>
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>
</div>  
<?php 
    return (string)ob_get_clean();
}
