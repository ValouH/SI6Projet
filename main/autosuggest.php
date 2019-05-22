<?php
   $db = new mysqli('localhost', 'root' ,'', 'sales');
	if(!$db) {
	
		echo 'Connexion à la base de donnée impossible.';
	} else {
	
		if(isset($_POST['queryString'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);
			
			if(strlen($queryString) >0) {
				$sddsdsd='credit';
				$query = $db->query("SELECT *  FROM sales WHERE type='$sddsdsd' AND name LIKE '$queryString%' LIMIT 10");
				if($query) {
				echo '<ul>';
					while ($result = $query ->fetch_object()) {
	         			echo '<li onClick="fill(\''.addslashes($result->invoice_number).'\');">'.$result->name.' - '.$result->invoice_number.'</li>';
	         		}
				echo '</ul>';
					
				} else {
					echo 'OOPS nous avons rencontré un probléme :(';
				}
			} else {
				// do nothing
			}
		} else {
			echo 'Il ne devrait pas y avoir d accès direct à ce script !';
		}
	}
?>