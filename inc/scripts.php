<?php
/**
 * Register scripts in development and production.
 */
declare(strict_types=1);

namespace AlstradocsBlocksBoilerplatePlugin\Block;

use AlstradocsBlocksBoilerplatePlugin\Block\AssetLoader;

class Scripts {

    public static $EDITOR_BUNDLE_HANDLE = 'admin-editor-blocks';

    /**
     * 
     */
    public static function setup()
    {
        add_action('wp_enqueue_scripts', [__NAMESPACE__ . '\Scripts', 'enqueueBlockFrontendAssets']);
        add_action('enqueue_block_editor_assets', [__NAMESPACE__ . '\Scripts', 'enqueueBlockEditorAssets']);
    }


    public static function manifestFilePath() : string
    {
        $pluginPath = trailingslashit(plugin_dir_path(dirname(__FILE__)));
        return $pluginPath . 'build/manifest.json';
    }


    /**
     * Enqueue editor-only assets based on the generated `asset-manifest.json` file.
     *
     * @return void
     */
    public static function enqueueBlockEditorAssets() : void
    {
        AssetLoader::enqueueAsset(
            self::manifestFilePath(),
            'editor.js', // Match the `entry: { 'editor': {} }` bundle in the Webpack config.
            [
            'handle' => self::$EDITOR_BUNDLE_HANDLE,
            'scripts' => [
                'wp-blocks',
                'wp-components',
                'wp-compose',
                'wp-data',
                'wp-edit-post',
                'wp-editor',
                'wp-element',
                'wp-i18n',
                'wp-plugins',
                'wp-rich-text',
                'wp-shortcode',
                'wp-url',
            ],
            'transformDevURI' => [
                'https://pub.gutencast.test/alstradocs-blocks-boilerplate/',
                plugins_url('alstradocs-blocks-boilerplate/build/', dirname(__DIR__)),
                ],
            ]
        );

        AssetLoader::enqueueAsset(
            self::manifestFilePath(),
            'editor.css',
            [
                'handle' => self::$EDITOR_BUNDLE_HANDLE,
                'styles' => [],
                'transformDevURI' => [
                    '/alstradocs-blocks-boilerplate/',
                    plugins_url('alstradocs-blocks-boilerplate/build/', dirname(__DIR__)),
                ],
            ]
        );
    }

    /**
     * Enqueue assets used both in the editor and on the frontend based on the generated `asset-manifest.json` file.
     *
     * @return void
     */
    public static function enqueueBlockFrontendAssets() : void
    {
        AssetLoader::enqueueAsset(
            self::manifestFilePath(),
            'frontend.css',
            [
                'handle' => 'alstradocs-blocks-boilerplate',
                'styles' => [],
                'transformDevURI' => [
                    '/alstradocs-blocks-boilerplate/',
                    plugins_url('alstradocs-blocks-boilerplate/build/', dirname(__DIR__)),
                ],
            ]
        );
    }
}