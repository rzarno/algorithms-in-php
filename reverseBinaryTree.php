<?php
//Reverse binary tree PHP implementation

class BinaryTree {
	private ?BinaryTree $left = null;
	private ?BinaryTree $right = null;
	private $value;
	
	public function setLeft(?BinaryTree $left)
	{
		$this->left = $left;
		return $this;
	}
	
	public function getLeft(): ?BinaryTree
	{
		return $this->left;
	}
	
	public function setRight(?BinaryTree $right)
	{
		$this->right = $right;
		return $this;
	}
	
	public function getRight(): ?BinaryTree
	{
		return $this->right;
	}
	
	public function setValue($value)
	{
		$this->value = $value;
		return $this;
	}
	
	public function getValue()
	{
		return $this->value;
	}
	
}


$b = (new BinaryTree())->setValue(1);
$bl = (new BinaryTree())->setValue(3);
$b->setLeft($bl);
$br = (new BinaryTree())->setValue(2);
$b->setRight($br);
$br->setLeft((new BinaryTree())->setValue(4));
$br->setRight((new BinaryTree())->setValue(5));


function reverseBinaryTree(?BinaryTree $b)
{
	if (! $b) {
		return;
	}
	$tmp = $b->getLeft();
	$b->setLeft($b->getRight());
	$b->setRight($tmp);
	reverseBinaryTree($b->getLeft());
	reverseBinaryTree($b->getRight());
}


reverseBinaryTree($b);

echo $b->getValue() . "\n";
echo $b->getLeft()->getValue() . "\n";
echo $b->getRight()->getValue() . "\n";
echo $b->getLeft()->getLeft()->getValue() . "\n";
echo $b->getLeft()->getRight()->getValue() . "\n";
