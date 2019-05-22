<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<?php
	require_once('auth.php');
?>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>
<div id="header" style="text-align: center; font-size: 20px; margin: 40px 0;"> Saisissez votre nom de société
</div>
<div id="mainmain">
<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='cashier') {
?>
<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">Argent</a>
<a href="sales.php?id=credit&invoice=<?php echo $finalcode ?>">Crédit</a>
<a href="../index.php">Logout</a>
<?php
}
if($position=='admin') {
?>
<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">Argent</a>
<a href="sales.php?id=credit&invoice=<?php echo $finalcode ?>">Crédit</a>
<a href="salesreport.php?d1=0&d2=0">Rapport des ventes</a>
<a href="collection.php?d1=0&d2=0">Rapport de collecte</a>
<a href="accountreceivables.php?d1=0&d2=0">Rapport sur les comptes débiteurs</a>
<a rel="facebox" href="select_customer.php">Registre Client</a>
<a href="products.php">Produits</a>
<a href="customer.php">Client</a>
<a href="supplier.php">Fournisseur</a>
<a href="purchaseslist.php">Achats</a>
<a href="../index.php">Déconnexion</a>
<?php
}
?>
<div class="clearfix"></div>
</div>
