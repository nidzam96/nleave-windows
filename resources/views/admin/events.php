<?php
// List of events
 $json = array();

 // Query that retrieves events

if (Auth::user()->id == '6') {
	# code...
	$requete = "SELECT * FROM leaves WHERE  (status = 'Approve') ORDER BY id";
}
else
{
	$requete = "SELECT * FROM leaves WHERE  (status = 'Approve' && user_id = 7) ORDER BY id"; 
}

 // connection to the database
 try {
 $bdd = new PDO('mysql:host=localhost;dbname=kakitangan', 'root', '');
 } catch(Exception $e) {
  exit('Unable to connect to database.');
 }
 // Execute the query
 $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

 // sending the encoded result to success page
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));

?>