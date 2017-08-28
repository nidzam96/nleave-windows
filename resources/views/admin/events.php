<?php
// List of events
 $json = array();

 $host     = getenv('DB_HOST');
 $dbname   = getenv('DB_DATABASE');
 $username = getenv('DB_USERNAME');
 $password = getenv('DB_PASSWORD');

 // Query that retrieves events
 $requete = "SELECT * FROM leaves WHERE (status = 'Approve')";

 // connection to the database
 try {
 $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $username, $password);
 // $bdd = new PDO('mysql:host=localhost;dbname=nazrolhr', 'root', '');
 // $bdd = new PDO({{ DB_HOST }};{{ DB_DATABASE }}, {{ DB_USERNAME }}, {{ DB_PASSWORD }});
 } catch(Exception $e) {
  exit('Unable to connect to database.');
 }
 // Execute the query
 $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

 // sending the encoded result to success page
 echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));

?>