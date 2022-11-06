<?php
class Node {
	public function __construct($value, ?Node $left = null, ?Node $right = null)
	{
		$this->value = $value;
		$this->right = $right;
		$this->left = $left;
	}
	
	public $value;
	public $right;
	public $left;
}

function mirrorTree(?Node $node)
{
	if ($node->left) {
		mirrorTree($node->left);
	}
	if ($node->right) {
		mirrorTree($node->right);
	}
	[$node->left, $node->right] = [$node->right, $node->left];
}

$tree = new Node(
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

function printTree(Node $node)
{
	echo $node->value;
	if ($node->left) {
		printTree($node->left);
	}
	if ($node->right) {
		printTree($node->right);
	}	
}

printTree($tree);

echo "\n";

mirrorTree($tree);

printTree($tree);

