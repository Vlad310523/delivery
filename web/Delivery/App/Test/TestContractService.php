<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Delivery/App/Repository/MySQLContractRepository.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Delivery/App/Service/ContractService.php');
session_start();
$_SESSION['username'] = 'supply_mngr';
$_SESSION['password'] = 'supply';
class TestContractService
{
	private $repository;
	private $service;
	public function __construct()
	{
		$This-> repository = new MySQLContractRepository();
		$This-> service = new ContractService($this-> repository);
	}
	public function shouldReturnContractByNumber()
	{
		try
		{
			print_r($this-> service-> getContractByNumber(1));
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}
	}
	public function shouldThrowExceptionWhenGetContractByUndefinedNumber()
	{
		try
		{
			print_r($this->service->getContractByNumber(NULL));
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}
	}
	public function shouldThrowExceptionWhenGetContractByInexistentNumber()
	{
		try
		{
			print_r($this->service->getContractByNumber(-1));
		}
		catch (Exception $e)
		{
			echo $e->getMessage();
		}
	}
}
$Test = new TestContractService();
$Test-> shouldReturnContractByNumber();
$Test-> shouldThrowExceptionWhenGetContractByUndefinedNumber();
$Test-> shouldThrowExceptionWhenGetContractByInexistentNumber();
?>