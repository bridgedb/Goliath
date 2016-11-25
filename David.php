<?php

//echo "aa";
//die();

//namespace \David

$data = "1007_s_at
1053_at
117_at
121_at
1255_g_at
1294_at
1316_at
1320_at
1405_i_at
1431_at
1438_at
1487_at
1494_f_at
1598_g_at";


$ctable["Affy"] = "X";


function hello(){
	return "hello";
}


function getHttp($url){
        // create curl resource 
        $ch = curl_init(); 
        // set url 
        curl_setopt($ch, CURLOPT_URL, $url); 
        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        // $output contains the output string 
        $output = curl_exec($ch); 
        // close curl resource to free up system resources 
        curl_close($ch);      

	//echo "-> ".$output ." <-";

	return $output;
}


//echo getHttp("webservice.bridgedb.org/Human/search/1007_s_at"); 


function getIdType($oid){
	$query = "webservice.bridgedb.org/Human/search/".$oid;
        $data = getHttp($query);

//	echo $data; 
//	die();
//	var_dump($data);

	$data = explode("\n", $data);

//	var_dump($data);

	foreach($data as $value){
		echo $value;

		list($id, $type) = explode("\t", $value);	
//		echo "<br>-".$id;
//		echo "<br>-".$type;
		if($id === $oid) return $type;
	}
	echo "false";

        return false;
}

function parseByType($type, $list){
	$result = array();
	foreach($list as $key => $elem){
		if($elem === $type)
			$result[$key] = $elem;
	}
	return $result;
}

function getIdSource($species, $idType, $id){
        $data = file_get_contents("http://webservice.bridgedb.org/Human/xrefs/$idType/$id");
	$data = explode("\n", $data);

	$result = array();

	foreach($data as $item){
		list($id, $type) = explode("\t", $item);
		$result[trim($id)] = trim($type);
	}

	//var_dump($result);

	return $result;
}




//$result = getIdSource("", "X", "1007_s_at");
//$r2 = parseByType("Ensembl", $result);


?>


<html>
<body>

<form action="" method="post">
<textarea type="text" name="idlist" cols=80 rows=30/>
1007_s_at
1053_at
117_at
121_at
1255_g_at
1294_at
1316_at
1320_at
1405_i_at
1431_at
1438_at
1487_at
1494_f_at
1598_g_at
</textarea>
<input type="submit">
</form>

<?php
if(isset($_POST["idlist"])){
	$data = $_POST["idlist"];

	$data = explode("\n", $data);

	$type = getIdType(trim($data[0]));
	
	echo "identified data type for ". $data[0] . " is " . $type;

	echo "<h2>Converting from $type to Ensembl</h2>";
	echo "<pre>";
	foreach($data as $element){
		$cList =getIdSource("", "X", trim($element));
		$result = parseByType("Ensembl", $cList); 

		echo $element . "\t\t";
		foreach($result as $key => $elem) echo $key . " ";

		echo "<br>";
	}
	echo "</pre>";
}
?>

</body>
</html>



