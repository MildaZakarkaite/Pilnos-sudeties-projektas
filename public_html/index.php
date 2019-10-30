<?php

require('../bootloader.php');
$form = [
    'attr' => [],
    'fields' => [
        'name' => [
            'type' => 'text',
			'label' => 'Drink name:',
			'extra' => [
				'attr' => [
					'placeholder' => 'Pavadinimas',
				],
			],
            'validators' => [
                'validate_not_empty',
            ],
        ],
        'amount_ml' => [
            'type' => 'number',
			'label' => 'Amount in ml:',
            'extra' => [
				'attr' => [
					'placeholder' => 'Talpa',
				],
			],
            'validators' => [
                'validate_not_empty',
            ],
        ],
        'abarot' => [
            'type' => 'number',
			'label' => 'Abarot:',
			'extra' => [
				'attr' => [
					'placeholder' => 'Laipsniai',
				],
			],
            'validators' => [
                'validate_not_empty',
            ],
        ],
        'image' => [
            'type' => 'url',
			'label' => 'Image URL:',
			'extra' => [
				'attr' => [
					'placeholder' => 'Paveikslelio nuoroda',
				],
			],
            'validators' => [
                'validate_not_empty',
            ],
        ],
    ],
    'buttons' => [
        'insert' => [
            'type' => 'submit',
        ],
        'delete' => [
            'type' => 'submit',
        ],
    ],
    'validators' => [
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail',
    ],
];
function form_success($filtered_input, &$form) {
    $modelDrinks = new \App\Drinks\Model();
	var_dump($filtered_input);
    $drink = new \App\Drinks\Drink($filtered_input);
    $modelDrinks->insert($drink);
}
function form_fail($filtered_input, &$form) {
}
$modelDrinks = new \App\Drinks\Model();
$filtered_input = get_filtered_input($form);
$button = get_form_action();
switch ($button) {
	case 'insert':
		if (!empty($filtered_input)) {
			validate_form($filtered_input, $form);
		}
		break;
	case 'delete':
		$modelDrinks->deleteAll();
		break;
}
?>
<html>
    <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>OOP</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="form-container">
			<?php require('../core/templates/form.tpl.php'); ?>
		</div>
		<div class="catalogue">
			<?php foreach ($modelDrinks->get() as $drink): ?>
				<div class="bottle">
					<img src="<?php print $drink->getImage(); ?>" alt="<?php $drink->getName(); ?>">
					<div class='name'><?php print "Pavadinimas: {$drink->getName()}"; ?></div>
					<div class="abarot"><?php print"Laipsniai: {$drink->getAbarot()} %"; ?></div>
					<div class="Amount"><?php print "Turis {$drink->getAmount()} ml"; ?></div>
				</div>
			<?php endforeach; ?>
		</div>
    </body>
</html>