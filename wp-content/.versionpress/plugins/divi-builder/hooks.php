<?php

use VersionPress\DI\VersionPressServices;

add_filter('vp_entity_tags_et_divi_ab_testing_client', function ($tags, $oldEntity, $newEntity) {

    global $versionPressContainer;

    /** @var Database $database */
    $database = $versionPressContainer->resolve(VersionPressServices::DATABASE);

    $postId = isset($newEntity['vp_test_id']) ? $newEntity['vp_test_id'] : $oldEntity['vp_test_id'];

    $result = $database->get_row("SELECT post_type, post_title FROM {$database->posts} " .
        "JOIN {$database->vp_id} ON {$database->posts}.ID = {$database->vp_id}.id " .
        "WHERE vp_id = UNHEX('$postId')");

    $tags['VP-Post-Type'] = $result->post_type;
    $tags['VP-Post-Title'] = $result->post_title;

    return $tags;
}, 10, 3);


add_filter('vp_entity_tags_et_divi_ab_testing_stat', function ($tags, $oldEntity, $newEntity) {

    global $versionPressContainer;

    /** @var Database $database */
    $database = $versionPressContainer->resolve(VersionPressServices::DATABASE);

    $postId = isset($newEntity['vp_test_id']) ? $newEntity['vp_test_id'] : $oldEntity['vp_test_id'];

    $result = $database->get_row("SELECT post_type, post_title FROM {$database->posts} " .
        "JOIN {$database->vp_id} ON {$database->posts}.ID = {$database->vp_id}.id " .
        "WHERE vp_id = UNHEX('$postId')");

    $tags['VP-Post-Type'] = $result->post_type;
    $tags['VP-Post-Title'] = $result->post_title;

    return $tags;
}, 10, 3);
