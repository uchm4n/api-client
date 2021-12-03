<?php

use Uchm4n\API\APIClient;

test('Check All Endpoints', function () {
    $api = new APIClient();
    expect($api)->toBeInstanceOf('Uchm4n\API\APIClient');

    // test getPosts
    expect($api->getPosts())->toBeArray()->toHaveCount(100);

    // test getPostByID
    expect($api->getPostByID(1))->toBeArray()->toHaveCount(4);

    // test getPostWithComments
    expect($api->getPostWithComments(1))->toBeArray()->toHaveCount(5);

    // test getCommentsByPost
    expect($api->getCommentsByPost(5));

    // test savePost
    expect($api->savePost([
        'title'  => 'TEST SAVED',
        'body'   => 'TEST BODY',
        'userId' => 1,
    ]))->toBeArray()->toHaveCount(4);

    // test updatePost
    expect($api->updatePost([
        'id'     => 1,
        'title'  => 'TEST UPDATED',
        'body'   => 'TEST BODY',
        'userId' => 1,
    ]))->toBeArray()->toHaveCount(4);

    // test patchPost
    expect($api->patchPost([
        'id'    => 1,
        'title' => 'TEST PATCHED',
    ]))->toBeArray()->toHaveCount(4);

    // test deletePost
    expect($api->deletePost(5))->toBeEmpty();
});
