<?php
return array(

'home'=>array(
        'controller' => 'home:index',
        'uri' => '/',
	),
  'autocomplete' => array(
      'controller' => 'sites:categorie',
        'uri' => '/explore/{cat}.html',
        'requirements' => array(

            'cat' => '[^/]+'
),
            )


	);