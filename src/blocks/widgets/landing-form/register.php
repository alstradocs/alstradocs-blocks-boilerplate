<?php

namespace AlstradocsBlocksBoilerplatePlugin\Blocks\LandingForm;

use AlstradocsBlocksBoilerplatePlugin\AssetLoader;
use AlstradocsBlocksBoilerplatePlugin\Scripts;

require_once __DIR__ . '/partials/landing-form.php';

function setup()
{
    add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\loadFrontendAssets' );
    add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\loadEditorAssets' );

    register_block_type_from_metadata(
        __DIR__,
        [
            'render_callback' => __NAMESPACE__ . '\\renderLandingForm',
        ]
    );
}

function loadEditorAssets()
{
    AssetLoader\enqueueAsset(
        Scripts\manifestFilePath(),
        'blocks/landing-form-scripts.js',
        [
        'handle' => 'landing-form',
        'styles' => [],
        'transformDevURI' => [
            '/alstradocs-blocks-boilerplate/',
            plugins_url('alstradocs-blocks-boilerplate/build/', dirname(__DIR__)),
        ],
        ]
    );
}
/**
 * For some reason I am unable to enqueue the script
 * in the footer hence the need to pass a 'false' as 
 * the last option to \AlstradocsBlocksBoilerplatePlugin\AssetLoader\enqueueAsset
 */
function loadFrontendAssets()
{
    \AlstradocsBlocksBoilerplatePlugin\AssetLoader\enqueueAsset(
        Scripts\manifestFilePath(),
        'landing-form-component.js',
        [
            'handle' => 'landing-form-component',
            'styles' => [],
            'scripts' => [
                'wp-element'
            ],
            'transformDevURI' => [
                '/alstradocs-blocks-boilerplate/',
                plugins_url('alstradocs-blocks-boilerplate/build/', dirname(__DIR__)),
            ],
        ],
        false
    );
    //wp_localize_script( 'landing-form-component', 'orderFormBlockInitData', get_localization_data() );

    wp_enqueue_script('simple-react-validator', 
        'https://cdn.jsdelivr.net/npm/simple-react-validator/dist/simple-react-validator.js', array(), NULL, false);

    wp_enqueue_script('moment-js', 
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js', array(), NULL, false);
}

function get_localization_data(): array {
    $data = [];
    if(array_key_exists('', $_POST)) {

    }
    return [];
}

function renderLandingForm($attributes): string
{   
    return Partials\output($attributes);
}
