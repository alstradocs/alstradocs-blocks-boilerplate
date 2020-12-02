<?php

namespace AlstradocsBlocksBoilerplatePlugin\Blocks\Framework;

use AlstradocsBlocksBoilerplatePlugin\Block\Scripts;
use AlstradocsBlocksBoilerplatePlugin\Block\AssetLoader;

/**
 * 
 */
abstract class BlockScript {

    protected $blockHandle;
    protected $editorStyles = [];
    protected $editorScripts = [];
    protected $frontendStyles = [];
    protected $frontendScripts = [];

    /**
     * 
     */
    public function setup() {
        add_action('admin_enqueue_scripts', [$this, 'loadEditorAssets']);
        add_action('admin_enqueue_scripts', [$this, 'loadFrontendAssets']);
        register_block_type_from_metadata(__DIR__, ['render_callback' => [$this, 'render']]);
    }

    public function loadEditorAssets()
    {
        AssetLoader::enqueueAsset(
            Scripts::manifestFilePath(),
            'blocks/' . $this->blockHandle .'-scripts.js',
            [
                'handle' => $this->blockHandle, 
                'styles' => $this->getEditorStylesDependencies(),
                'scripts' => $this->getEditorScriptsDependencies(),
            ]
        );

        foreach ($this->editorScripts as $scriptName => $scriptURI) {
            wp_enqueue_script($scriptName, $scriptURI, array(), NULL, false);
        }

        foreach ($this->editorStyles as $styleName => $styleURI) {
            wp_enqueue_style($styleName, $styleURI, array());
        }
    }

    /**
     * For some reason I am unable to enqueue the script
     * in the footer hence the need to pass a 'false' as 
     * the last option to \AlstradocsBlocksBoilerplatePlugin\AssetLoader\enqueueAsset
     */
    public function loadFrontendAssets()
    {
        AssetLoader::enqueueAsset(
            Scripts::manifestFilePath(),
            $this->blockHandle . '-component.js',
            [
                'handle' => $this->blockHandle . '-component',
                'styles' => $this->getFrontendStylesDependencies(),
                'scripts' => $this->getFrontendScriptsDependencies(),
            ],
            false
        );
        
        foreach ($this->frontendScripts as $scriptName => $scriptURI) {
            wp_enqueue_script($scriptName, $scriptURI, array(), NULL, false);
        }

        foreach ($this->frontendStyles as $styleName => $styleURI) {
            wp_enqueue_style($styleName, $styleURI, array());
        }

        wp_localize_script( $this->blockHandle . '-component', 
            $this->blockHandle . 'InitData', $this->getLocalizationData());
    }


    /**
     * 
     */
    protected function getEditorStylesDependencies(): array
    {
        return [];
    }

    /**
     * 
     */
    protected function getEditorScriptsDependencies(): array
    {
        return [];
    }

    /**
     * 
     */
    protected function getFrontendStylesDependencies(): array
    {
        return [];
    }

    /**
     * 
     */
    protected function getFrontendScriptsDependencies()
    {
        return [];
    }

    /**
     * 
     */
    protected function getLocalizationData(): array
    {
        return [];
    }

    /**
     * 
     */
    public abstract function render($attributes, $content): string;
}
