# JSONPlaceholder API Wrapper

This is a [JSONPlaceholder](https://jsonplaceholder.typicode.com) client library. It is designed to be easily integrated into any project.

## Installation

```sh
composer require uchm4n/api-client
```

## How to use

```php
<?php

require_once 'vendor/autoload.php';

use U\APIClient;

$api = new APIClient();

// test getPosts
$api->getPosts();

// test getPostByID
$api->getPostByID(1);

// test getPostWithComments
$api->getPostWithComments(1);

// test getCommentsByPost
$api->getCommentsByPost(5);

// test savePost
$api->savePost([
    'title'  => 'TEST SAVED',
    'body'   => 'TEST BODY',
    'userId' => 1,
]);

// test updatePost
$api->updatePost([
    'id'     => 1,
    'title'  => 'TEST UPDATED',
    'body'   => 'TEST BODY',
    'userId' => 1,
]);

// test patchPost
$api->patchPost([
    'id'    => 1,
    'title' => 'TEST PATCHED',
]);

// test deletePost
$api->deletePost(5);



```




