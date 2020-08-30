<?php

namespace SM\DataStructures\Lists\LinkedList;

class LinkedListNode
{
	public ?LinkedListNode $next;
	public $data;

	public function __construct($data = null)
	{
		$this->next = null;
		$this->data = $data;
	}
}
