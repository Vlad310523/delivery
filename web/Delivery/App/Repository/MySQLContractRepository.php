<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Delivery/App/Domain/Contract.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Delivery/App/Util/MySQLConnectionUtil.php');
require_once('ContractRepositoryInterface.php');
class MySQLContractRepository implements ContractRepositoryInterface
{
public function getContractList()
{
	$Conn = MySQLConnectionUtil::getConnection();
	$Contracts = array();
	$Query = 'SELECT number, agreed, supplier, title, note FROM contract';
	$Result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($result))
	{
		$Contract = new Contract($row['number'], $row['agreed'], $row['supplier'],
		$Row['title'], $row['note']);
		array_push ($contracts, $contract);
	}
	mysqli_close ($conn);
	return $contracts;
}
public function getContractByNumber ($number)
{
	$Conn = MySQLConnectionUtil::getConnection();
	$Contract = NULL;
	$Query = "SELECT number, agreed, supplier, title, note FROM contract WHERE number = {$ number}";
	$Result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($result))
	{
		$Contract = new Contract ($row['number'], $row['agreed'], $row['supplier'],
		$Row['title'], $row['note']);
		break;
	}
	mysqli_close($conn);
	if ($contract == NULL)
	{
		throw new Exception("Contract with number {$ number} does not exist!");
	}
	return $contract;
	}
public function create($contract)
{
	$Conn = MySQLConnectionUtil::getConnection();
	$Number = $contract-> getNumber();
	$Agreed = $contract-> getAgreed();
	$Supplier = $contract-> getSupplier();
	$Title = $contract-> getTitle();
	$Note = $contract-> getNote();
	$Query = "INSERT INTO contract (number, agreed, supplier, title, note) VALUES ({$number}, '{$agreed}', {$supplier}, '{$title}', '{$note}') ";
	$Result = mysqli_query($conn, $query);
	if (!$result)
	{
		throw new Exception(mysqli_error($conn));
	}
	mysqli_close($conn);
}
public function update($contract)
{
	$Conn = MySQLConnectionUtil::getConnection();
	$Number = $contract-> getNumber();
	$Agreed = $contract-> getAgreed();
	$Supplier = $contract-> getSupplier();
	$Title = $contract-> getTitle();
	$Note = $contract-> getNote();
	$Query = "UPDATE contract SET agreed = '{$agreed}', supplier = {$supplier}, title = '{$title}', note = '{$note}' WHERE number = {$number} ";
	$Result = mysqli_query($conn, $query);
	if (!$result)
	{
		throw new Exception(mysqli_error($conn));
	}
	mysqli_close($conn);
}
public function delete ($number)
{
	$Conn = MySQLConnectionUtil::getConnection();
	$Query = "DELETE FROM contract WHERE number = {$number}";
	$Result = mysqli_query($conn, $query);
	if (!$result)
	{
		throw new Exception(mysqli_error($conn));
	}
	mysqli_close($conn);
}
}
?>