<?php
/**
 * Block auto-loader.
 */

declare(strict_types=1);

namespace AlstradocsBlocksBoilerplatePlugin\Block;

use AlstradocsBlocksBoilerplatePlugin\Block\AssetLoader;

class Blocks {

    /**
     * Connect namespace functions to actions & hooks.
     *
     * @return void
     */
    public static function setup()
    {
        // Auto-load all PHP-defined blocks.
        self::autoregisterCustomBlocks();

        // Register actions & filters.
        add_filter('block_categories', [__NAMESPACE__ . '\Blocks', 'addStarterBlocks']);
    }

    /**
     * Register a custom block category for this plugin.
     *
     * @param array $categories The list of available block categories.
     * @return array The filtered categories list.
     */
    public static function addStarterBlocks(array $categories)
    {   
        $block_categories = array_merge($categories,[ 
            array('slug' => 'alstradocs-blocks-boilerplate-common', 'title' => 'Alstradocs Boilerplate Common'),
            array('slug' => 'alstradocs-blocks-boilerplate-formatting', 'title' => 'Alstradocs Boilerplate Formatting'),
            array('slug' => 'alstradocs-blocks-boilerplate-layout', 'title' => 'Alstradocs Boilerplate Layout'),
            array('slug' => 'alstradocs-blocks-boilerplate-widgets', 'title' => 'Alstradocs Boilerplate Widget')]
        );
        return $block_categories;
    }

    /**
     * Extract the block name from a directory path.
     *
     *
     * @param string $blockFilePath Path to a block's php file.
     * @return string The name of the block, in Pascal case.
     */
    public static function getBlockHandleFromPath(string $blockFilePath) : string
    {
        $path = str_replace(
            [dirname(__DIR__) . '/src/blocks/', '/register.php'],
            ['', ''],
            $blockFilePath
        );

        // Handle block names in sub-directories.
        if (stripos($path, '/') !== false) {
            $explodePath = explode('/', $path);
            $path        = end($explodePath);
        }

        return $path;
    }

    /**
     * Get the expected PHP namespace from the block name.
     *
     * @param string      $blockHandle Block handle name, harpoon-case.
     * @param string|null $space       Sub-directory namespace.
     * @return string Expected PHP namespace, in PascalCase.
     */
    public static function getNamespaceFromBlockHandle(string $blockHandle, ?string $space = null) : string
    {
        // Add a prefix namespace to the generic namespace, if passed a sub-directory space.
        $prefix = 'AlstradocsBlocksBoilerplatePlugin\\Block\\Domain';
        if ($space) {
            $prefix .= '\\' . ucwords($space);
        }

        // Modify the block handle to remove space, and dashes and make the string PascalCase.
        $blockNamespace = str_replace(' ', '', ucwords(str_replace('-', ' ', $blockHandle)));

        return sprintf(
            '%s\\%s',
            $prefix,
            $blockNamespace
        );
    }

    /**
     * Dynamically register custom blocks if a registration file exists.
     */
    public static function autoregisterCustomBlocks()
    {
        // Load any partials files exposing HTML generation functions.
        // These files are expected to live within `/partials` in each block's directory.
        foreach (glob(dirname(__DIR__) . '/src/blocks/*/partials/*.php') as $file) {
            require_once($file);
        }

        // Each registered block must have an entrypoint in /src/blocks/{blockname}/register.php.
        foreach (self::rglob(dirname(__DIR__) . '/src/blocks/**/register.php') as $file) {
            require_once($file);
            $blockHandle = self::getBlockHandleFromPath($file);
            // Fully qualified block name ()
            $blockFQN = self::getNamespaceFromBlockHandle($blockHandle) . '\Register';
            // The names of the function we are interested in
            $setup    = 'setup';
            $register = 'registerBlock';

            $json_path = str_replace('register.php', 'block.json',  $file);
            $blockData = self::loadBlockConfig($json_path);

            if (! $blockData) {
                continue;
            }

            // If we have extra setup needs, run those hooks. (setup())
            if (method_exists($blockFQN, $setup)) {
                $blockScriptInstance = new $blockFQN();
                call_user_func([$blockScriptInstance, $setup]);
            }

            // Run our block registration. (registerBlock())
            if (method_exists($blockFQN, $register)) {
                add_action('enqueue_block_editor_assets', function () use ($register, $blockData) {
                    call_user_func([$blockFQN, $register], $blockData);
                });
            }
        }
    }

    /**
     * Load in a JSON block configuration file.
     *
     * @param string $blockSlug Name of the block configuration to load.
     * @return array|null
     */
    public static function loadBlockConfig(string $path) : ?array
    {
        if (! file_exists($path)) {
            return null;
        }

        $fileData = file_get_contents($path);

        if (! $fileData) {
            return null;
        }

        return json_decode($fileData, true);
    }

    // Does not support flag GLOB_BRACE
    public static function rglob($pattern, $flags = 0) {
        $files = glob($pattern, $flags); 
        foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
            $files = array_merge($files, self::rglob($dir.'/'.basename($pattern), $flags));
        }
        return $files;
    }
}


