<?php

namespace YOOtheme;

return [

    'transforms' => [

        'render' => function ($node) {

            /**
             * @var Metadata $metadata
             */
            $metadata = app(Metadata::class);

            $metadata->set('style:builder-tf', ['href' => Path::get('./css/tf.css')]);

        },

    ],

    'updates' => [
    ],

];
