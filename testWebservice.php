<?php
	$client = new SoapClient("http://www.scadachaopraya.com/CPYProvider.asmx?wsdl",
			array(
			  "trace"      => 1,		// enable trace to view what is happening
			  "exceptions" => 0,		// disable exceptions
			  "cache_wsdl" => 0) 		// disable any caching on the wsdl, encase you alter the wsdl server
		  );

	$params = array(
			   'stn_id' => "1"
	);

	$data = $client->LastDataByID($params);

	print_r($data);

	echo "<hr>";

	echo $data->LastDataByIDResult;

	echo "<hr>";

	// display what was sent to the server (the request)
	echo "<p>Request :".htmlspecialchars($client->__getLastRequest()) ."</p>";

	echo "<hr>";

	// display the response from the server
	echo "<p>Response:".htmlspecialchars($client->__getLastResponse())."</p>";

?>