<?php

class Node {
	public function __construct($value, ?Node $left = null, Node $right = null)
	{
		$this->value = $value;
		$this->left = $left;
		$this->right = $right;
	}
	
	public $value;
	public ?Node $left;
	public ?Node $right;
}

function areTreesEqual(?Node $a, ?Node $b): bool
{
	
	if (! $a  &&  $b || $a && ! $b) {
		return false;
}

if (! $a && ! $b) {
	return true;
}

	if ($a->value !== $b->value) {
		return false;
}
return  areTreesEqual($a->left, $b->left)
		&&  areTreesEqual($a->right, $b->right); 
}

$tree1 = new Node(
	'A', 
	new Node(
		'B', 
		new Node(
			'D'
		),
		new Node(
			'E',
			null,
			new Node(
				'F'
			)
		)
	),
	new Node(
		'C',
		new Node('G')
	)
);

$tree2 = clone $tree1;

$tree3 = new Node(
	'A', 
	new Node(
		'B', 
		new Node(
			'F'
		),
		new Node(
			'E',
			null,
			new Node(
				'D'
			)
		)
	),
	new Node(
		'C',
		new Node('G')
	)
);

$tree4 = new Node(
	'A', 
	new Node(
		'B', 
		new Node(
			'F'
		),
		new Node(
			'E',
			null,
			new Node(
				'D'
			)
		)
	),
	new Node(
		'C'
	)
);
