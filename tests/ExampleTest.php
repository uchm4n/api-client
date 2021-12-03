<?php

use U\API\Client;

test('Check Class Namespace', function () {
    $new = new Client();
    expect($new)->toBeInstanceOf('U\API\Client');
});
