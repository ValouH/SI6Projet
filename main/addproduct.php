<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveproduct.php" method="post">
<div id="ac">
<span>Code Produit : </span><input type="text" name="code" /><br>
<span>Nom de Produit : </span><input type="text" name="name" /><br>
<span>Coût : </span><input type="text" name="cost" /><br>
<span>Prix : </span><input type="text" name="price" /><br>
<span>Fournisseur : </span>
<select name="supplier">
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM supliers");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['suplier_name']; ?></option>
	<?php
	}
	?>
</select><br>
<span>Quantité : </span><input type="text" name="qty" /><br>
<span>&nbsp;</span><input id="btn" type="submit" value="save" />
</div>
</form>