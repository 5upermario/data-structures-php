<?php

namespace SM\DataStructures\Lists\DoublyLinkedList;

class DoublyLinkedListNode
{
	public ?DoublyLinkedListNode $prev = null;
	public ?DoublyLinkedListNode $next = null;
	public $data;

	public function __construct($data = null)
	{
		$this->data = $data;
	}
}
