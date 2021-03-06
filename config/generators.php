<?php

return [
      'source' => [
            'root'            => 'angular',
            'page'            => 'app/pages',
            'components'      => 'app/components',
            'config'          => 'config',
            'dialogs'         => 'dialogs',
            'filters'         => 'filters',
            'services'        => 'services',
      ],
      'prefix' => [
            'component'       => '.component.js',
            'componentView'   => '.component.html',
            'dialog'          => '.dialog.js',
            'dialogView'      => '.dialog.html',
            'service'         => '.service.js',
            'config'          => '.config.js',
            'filter'          => '.filter.js',
            'pageView'        => '.page.html',
      ],
      'tests' => [
            'enable' => [
                'components'      => false,
                'services'        => false,
            ],
            'source' => [
                'root'            => 'tests/angular/',
                'components'      => 'app/components',
                'services'        => 'services',
            ],
      ],
      'misc' => [
            'auto_import' => true,
      ],
];
