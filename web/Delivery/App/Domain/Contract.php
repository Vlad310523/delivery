<?php
class Contract
{
	private $number;
	private $agreed;
	private $supplier;
	private $title;
	private $note;
	public function __construct ($number, $agreed, $supplier, $title, $note)
	{
		if (empty($number))
		{
			throw new Exception('Contract number is not set!');
		}
		if (empty($supplier))
		{
			throw new Exception('Supplier is not set!');
		}
		if (empty($title))
		{
			throw new Exception('Contract title is not set!');
		}
		if (empty($note))
		{
			throw new Exception('Contract note is not set!');
		}
		$This-> number = $number;
		$This-> agreed = $agreed;
		$This-> supplier = $supplier;
		$This-> title = $title;
		$This-> note = $note;
	}
	public function getNumber()
	{
		return $this-> number;
	}
	public function getAgreed()
	{
		return $this-> agreed;
	}
	public function getSupplier()
	{
		return $this-> supplier;
	}
	public function getTitle()
	{
		return $this-> title;
	}
	public function getNote()
	{
		return $this-> note;
	}
}
?>