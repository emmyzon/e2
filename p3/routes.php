<?php

return [
    # the path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    # the path `/history` will trigger the `history` method within the `AppController`
    '/history' => ['AppController', 'history'],
    # the path `/round` will trigger the `round` method within the `AppController`
    '/round' => ['AppController', 'round'],
    # the path `/play` will trigger the `play` method within the `AppController`
    '/play' => ['AppController', 'play']
];
