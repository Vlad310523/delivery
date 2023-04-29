<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/Delivery/App/Controller.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Delivery/App/Domain/Contract.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Delivery/App/Repository/MySQLContractRepository.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Delivery/App/Service/ContractService.php');
if (!isset($_SESSION ['username']))
{
	$controller->redirect('login');
}
$repository = new MySQLContractRepository();
$service = new ContractService($repository);
?>
<!DOCTYPE html>
<html>
<head>
<title>Contracts</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<nav class = "navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="./">Delivery</a>
<div class = "collapse navbar-collapse" id = "navbarSupportedContent">
<ul class = "navbar-nav mr-auto">
<li class = "nav-item active">
<a class="nav-link" href="./contracts.php"> Contracts </a>
</li>
</ul>
<form class = "form-inline my-2 my-lg-0" action = "logout.php" method = "post">
<button class = "btn btn-outline-primary my-2 my-sm-0" type = "submit"> Logout </button>
</Form>
</Div>
</Nav>
<Div class = "row my-3 mx-1">
<Div class = "col-4">
<Ul class = "list-group">
<Li class = "list-group-item active"> Contracts </li>
<?php foreach($service->getAllContracts() as $contract) {?>
<Li class = "list-group-item">
<a href="contracts.php?details=<?=$contract->getNumber()?>">
#<?=$contract->getNumber()?>, <?=$contract->getAgreed()?>, <?=$contract->getSupplier()?>
</a>
</Li>
<?php } ?>
</Ul>
</Div>
<Div class = "col-8">
<?Php
if (isset ($_GET['details']))
{
try
{
$contract = @ $service->getContractByNumber($_GET['details']);
?>
<Form>
<Div class = "form-group row">
<Label for = "contractNumber" class = "col-sm-2 col-form-label"> Contract number </label>
<Div class = "col-sm-10">
<Input type = "text" readonly class = "form-control-plaintext" id = "contractNumber" value =
"<?=$contract->getNumber()?>">
</Div>
</Div>
<Div class = "form-group row">
<Label for = "contractDate" class = "col-sm-2 col-form-label"> Contract date </label>
<Div class = "col-sm-10">
<Input type = "text" readonly class = "form-control-plaintext" id = "contractDate" value =
"<?=$contract->getAgreed()?>">
</Div>
</Div>
<Div class = "form-group row">
<Label for = "supplier" class = "col-sm-2 col-form-label"> Supplier </label>
<Div class = "col-sm-10">
<Input type = "text" readonly class = "form-control-plaintext" id = "supplier" value = "<?=Htmlspecialchars($contract->getSupplier())?>">
</Div>
</Div>
<Div class = "form-group row">
<Label for = "title" class = "col-sm-2 col-form-label"> Title </label>
<Div class = "col-sm-10">
<Input type = "text" readonly class = "form-control-plaintext" id = "title" value = "<?=Htmlspecialchars($contract->getTitle())?>">
</Div>
</Div>
<Div class = "form-group row">
<Label for = "note" class = "col-sm-2 col-form-label"> Note </label>
<Div class = "col-sm-10">
<Textarea class = "form-control" readonly rows = "5" id = "note"> <?=Htmlspecialchars($contract->getNote())?> </Textarea>
</Div>
</Div>
</Form>
<a class="btn btn-warning" href="#" role="button"> Edit </a>
<a class="btn btn-danger" href="#" role="button"> Remove </a>
<?php
}
catch (Exception $e)
{
?>
<Div class = "alert alert-danger" role = "alert"> <?=$E->getMessage()?> </Div>
<?php
}
}
else
{
?> <a class="btn btn-success" href="#" role="button">New contract </a> <?php
}
?>
</Div>
</Div>
</Body>
</Html>