<?php

namespace AlstradocsBlocksBoilerplatePlugin\Blocks\Jumbotron;

use AlstradocsBlocksBoilerplatePlugin\AssetLoader;
use AlstradocsBlocksBoilerplatePlugin\Scripts;

require_once __DIR__ . '/partials/jumbotron.php';

/**
 * 
 */
function setup()
{
    add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\loadEditorAssets' );

    register_block_type_from_metadata(
        __DIR__,
        [
            'render_callback' => __NAMESPACE__ . '\\renderJumbotron',        
        ]
    );
}

/**
 * 
 */
function loadEditorAssets()
{
    AssetLoader\enqueueAsset(
        Scripts\manifestFilePath(),
        'blocks/jumbotron-scripts.js',
        [
        'handle' => 'jumbotron-editor-scripts-js',
        'styles' => [],
        ]
    );
}

/**
 * 
 */
function renderJumbotron($attributes, $content): string
{   
    return Partials\output($attributes, $content);
}
