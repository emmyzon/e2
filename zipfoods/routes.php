<?php

# Define the routes of your application

return [
    # Ex: The path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    '/about' => ['AppController', 'about'],
    '/products' => ['ProductController', 'index'],
    '/product' => ['ProductController', 'show'],
];
