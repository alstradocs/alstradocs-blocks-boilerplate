<?php
/**
 * Plugin Name: Alstradocs Blocks Boiler Plate
 * Plugin URI: https://github.com/alstradocs-main/alstradocs-blocks-boilerplate/
 * Description: Blocks for www.alstradocs.com.
 * Author: Edward Banfa
 * Author URI: https://alstradocs.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package CGB
 */
namespace AlstradocsBlocksBoilerplatePlugin;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Auto-load PHP Editor Blocks.
require_once __DIR__ . '/inc/utils/block-utils.php';
require_once __DIR__ . '/inc/blocks.php';
require_once __DIR__ . '/inc/asset-loader.php';
require_once __DIR__ . '/inc/scripts.php';
// Old static blocks format

Blocks\setup();

Scripts\setup();

/**
 * Block Initializer.
 */
