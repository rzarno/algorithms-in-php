<?php
//reverse linked list in PHP implementation

class LinkedListItem {
  private ?LinkedListItem $next = null;
  private ?LinkedListItem $prev = null;
  private $value;

  public function setNext(?LinkedListItem $next)
  {
    $this->next = $next;
    return $this;
  }

  public function getNext(): ?LinkedListItem
  {
    return $this->next;
  }

  public function setPrev(?LinkedListItem $prev)
  {
    $this->prev = $prev;
    return $this;
  }

  public function getPrev(): ?LinkedListItem
  {
    return $this->prev;
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



$list = [1,2,3,4,5];

$firstItem = (new LinkedListItem())->setValue(0);

$prevItem = $firstItem;

foreach ($list as $value) {
  $item = new LinkedListItem();
  $item->setValue($value);
  $item->setPrev($prevItem);
  $prevItem->setNext($item);
  $prevItem = $item;
}

$item = $firstItem;
do {
  echo $item->getValue();
  if ($prev = $item->getPrev()) {
    echo $prev->getValue();
  }
  "\n";
} while($item = $item->getNext());


function reverseLinkedList(LinkedListItem $item): LinkedListItem
{
  $next = $item->getNext();
  $item->setNext(null);
  while (true) {
    $item->setPrev($next);
    if(! $next) {
      return $item;
    }
    $nextNext = $next->getNext();
    $next->setNext($item);
    $item = $next;
    $next = $nextNext;
  }
}

$item = reverseLinkedList($firstItem);


do {
  echo $item->getValue() . "\n";
} while($item = $item->getNext());
