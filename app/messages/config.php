<?php

return [
    'sourcePath' => dirname(__DIR__),
    'languages' => ['ru', 'en'],
    'translator' => 'Yii::t',
    'sort' => false,
    'removeUnused' => false,
    'only' => ['*.php'],
    'except' => [
        '.svn',
        '.git',
        '.gitignore',
        '.gitkeep',
        '.hgignore',
        '.hgkeep',
        '/messages',
        '/vendor',
    ],
    'format' => 'php',
    'messagePath' => dirname(__DIR__) . DIRECTORY_SEPARATOR . 'messages',
    'overwrite' => true
];
