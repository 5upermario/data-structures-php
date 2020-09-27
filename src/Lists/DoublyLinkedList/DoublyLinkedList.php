<?php

namespace SM\DataStructures\Lists\DoublyLinkedList;

use Iterator;
use OutOfBoundsException;

class DoublyLinkedList implements Iterator
{
	const FORWARD  = 0;
	const BACKWARD = 1;

	protected ?DoublyLinkedListNode $head;
	protected ?DoublyLinkedListNode $last;
	protected int $length;
	protected ?DoublyLinkedListNode $current;
	protected int $position;
	protected int $direction;

	public function __construct()
	{
		$this->head      = null;
		$this->last      = null;
		$this->length    = 0;
		$this->current   = null;
		$this->position  = -1;
		$this->direction = self::FORWARD;
	}

	public function setDirectionForward()
	{
		$this->direction = self::FORWARD;
	}

	public function setDirectionBackward()
	{
		$this->direction = self::BACKWARD;
	}

	public function rewind()
	{
		$this->current  = $this->direction === self::BACKWARD ? ($this->last ?? null) : ($this->head ?? null);
		$this->position = $this->head ? ($this->direction === self::BACKWARD ? $this->length - 1 : 0) : -1;
	}

	public function current()
	{
		return $this->current;
	}

	public function key()
	{
		return $this->position;
	}

	public function next()
	{
		$this->current   = $this->direction === self::BACKWARD ? $this->current->prev : $this->current->next;
		$this->position += $this->direction === self::BACKWARD ? -1 : 1;
	}

	public function valid()
	{
		return $this->position != -1 && !is_null($this->current);
	}

	public function find(int $index)
	{
		if ($index < 0 || $index >= $this->length) throw new OutOfBoundsException();

		if ($index > floor($this->length / 2)) {
			$i       = $this->length - 1;
			$current = $this->last;

			while ($i > $index) {
				$current = $current->prev;
				--$i;
			}
		} else {
			$i       = 0;
			$current = $this->head;

			while ($i < $index) {
				$current = $current->next;
				++$i;
			}
		}

		return $current->data;
	}

	public function insert($data)
	{
		$node = new DoublyLinkedListNode($data);

		if ($this->length == 0)
			$this->head = $this->last = $node;
		else {
			$this->head->prev = $node;
			$node->next       = $this->head;
			$this->head       = $node;
		}

		++$this->length;
	}

	public function insertAt(int $index, $data)
	{
		if ($index < 0 || $index > $this->length) throw new OutOfBoundsException();

		if ($index == 0) return $this->insert($data);

		$current = $this->head;
		$i       = 0;
		$node    = new DoublyLinkedListNode($data);

		while ($i < $index - 1) {
			$current = $current->next;
			++$i;
		}

		$node->next    = $current->next;
		$current->next = $node;
		++$this->length;
	}

	public function insertLast($data)
	{
		if ($this->length == 0) return $this->insert($data);

		$node             = new DoublyLinkedListNode($data);
		$node->prev       = $this->last;
		$this->last->next = $node;
		$this->last       = $node;

		++$this->length;
	}

	public function delete()
	{
		if ($this->length == 0) return;

		$deletable  = $this->head;
		$this->head = $this->head->next;

		if (!is_null($this->head)) $this->head->prev = null;
		else $this->last = null;

		--$this->length;
		unset($deletable);
	}

	public function deleteAt($index)
	{
		if ($this->length == 0 || $index < 0 || $index >= $this->length) return;

		if ($index == 0) return $this->delete();

		if ($index == $this->length - 1) return $this->deleteLast();

		$current = $this->head;
		$i       = 0;

		while ($i < $index - 1) {
			$current = $current->next;
			++$i;
		}

		$deletable           = $current->next;
		$current->next       = $current->next->next;
		$current->next->prev = $current;

		--$this->length;
		unset($deletable);
	}

	public function deleteLast()
	{
		if ($this->length == 0) return;

		$deletable  = $this->last;
		$this->last = $this->last->prev;

		if (!is_null($this->last)) $this->last->next = null;
		else $this->head = null;

		--$this->length;
		unset($deletable);
	}

	public function length()
	{
		return $this->length;
	}

	public function __toString()
	{
		$result  = 'null <-> ';
		$current = $this->head;

		while (!is_null($current)) {
			$result .= $current->data . ' <-> ';
			$current = $current->next;
		}

		return $result . 'null';
	}

	public static function fromValues(...$values): self
	{
		$list = new self();

		foreach (array_reverse($values) as $value) {
			$list->insert($value);
		}

		return $list;
	}
}
