<?php 

namespace AlstradocsBlocksBoilerplatePlugin\Blocks\Utils\BlockUtils;

/**
 * Builds a context object that contains
 * information about the environment and
 * also includes information from the
 * current request object
 */
function new_context($data = []): array {
    $data['siteUrl'] = get_site_url();
    $data['restEnpointUrl'] = $data['siteUrl'] . '/wp-json/enterprise/v2/controller/';
    // Was an id supplied ?
    if(isset($_REQUEST['id'])) {
        $data['id'] = $_REQUEST['id'];
    }
    return $data;
}

/**
 */
function get_request_params($field_names) {
    $data = [];
    foreach ($field_names as $field_name) {
        if(!isset($_REQUEST[$field_name])) {
            $data[$field_name] = $_REQUEST[$field_name];
        }
    }
    return $data;
}

