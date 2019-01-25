<?php

$ctable["Affy"] = "X";



function getDataSourceList(){
	$data["Affy"] = "X";
	$data["Ensembl"] = "En";
	$data["Chemspider"] = "Cs";
	$data["Enzyme Nomenclature"] = "E";
	$data["Rhea"] = "Rh";
	$data["KEGG Compound"] = "Ck";
	$data["EcoCyc"] = "Eco";
	$data["HMDB"] = "Cg";
	$data["KEGG Drug"] = "Ch";
	$data["Illumina"] = "Il";
	$data["UCSC Genome Browser"] = "Uc";
	$data["Rfam"] = "Rf";
	$data["PDB"] = "Pd";
	$data["UniGene"] = "U";
	$data["MACiE"] = "Ma";
	$data["LIPID MAPS"] = "Lm";
	$data["Wikidata"] = "Wd";
	$data["Wikipedia"] = "Wi";
	$data["PubChem-compound"] = "Cpc";
	$data["miRBase Sequence"] = "Mb";
	$data["KEGG Reaction"] = "Rk";
	$data["ChEBI"] = "Ce";
	$data["Uniprot-TrEMBL"] = "S";
	$data["Entrez Gene"] = "";
	$data["WikiGenes"] = "Wg";
	$data["OMIM"] = "Om";
	$data["GeneOntology"] = "T";
	$data["MetaCyc"] = "Mc";
	$data["InChIKey"] = "Ik";
	$data["KNApSAcK"] = "Cks";
	$data["HGNC"] = "H";
	$data["Reactome"] = "Re";
	$data["Agilent"] = "Ag";
	$data["RefSeq"] = "Q";
	$data["CAS"] = "Ca";
	$data["Unipathway"] = "Up";
	
	return $data;
}

function getDataSourceCode($datasource){
	$data = getDataSourceList();
	return $data[$datasource];
}

function getDataSourceFromCode($code){
	$data = getDataSourceList();
	foreach($data as $key => $elem){
		if($elem === $code) return $key;
	}
	return false;
}



/* get better name */
function isSupported($species, $origincode){
	$data = file_get_contents("http://webservices.bridgedb.org/$species/sourceDataSources");
	$supportedCodes = explode(",", $data);

	foreach($supportedCodes as $code){
		$data = file_get_contents("http://webservices.bridgedb.org/$species/isMappingSupported/$origincode/$code");
		
	}
}


function hello(){
	return "hello";
}


function postHttp($url, $postData){
        // create curl resource 
        $ch = curl_init(); 
        // set url 
        curl_setopt($ch, CURLOPT_URL, $url); 
        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        // $output contains the output string 
        $output = curl_exec($ch); 
        // close curl resource to free up system resources 
        curl_close($ch);      

	//echo "-> ".$output ." <-";

	return $output;
}


function getParallelHttp($aUrl){
	$nodes = $aUrl;
	$node_count = count($nodes);

	$curl_arr = array();
	$master = curl_multi_init();

	for($i = 0; $i < $node_count; $i++)
	{
	    $url =$nodes[$i];
	    $curl_arr[$i] = curl_init($url);
	    curl_setopt($curl_arr[$i], CURLOPT_RETURNTRANSFER, true);
	    curl_multi_add_handle($master, $curl_arr[$i]);
	}

	do {
	    curl_multi_exec($master,$running);
	} while($running > 0);


	for($i = 0; $i < $node_count; $i++)
	{
	    $results[] = curl_multi_getcontent  ( $curl_arr[$i]  );
	}

	return $results;
}


function getHttp2($url){
	return file_get_contents('http://'.$url);
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

	//echo " ->> $url -> ".$output ." <- ";

	return $output;
}




function getIdType2($id){
	return "ok";
}



function detectSpecie($idList){
//	return detectSpecies("", "1053_at");
//	return detectSpecies("", "117_at");

	$i = 0;
	$detectedSpecies = array();
//	foreach($idList as $oid){

		$species = detectSpecies($idList[0]);

		//var_dump($species);

/*		if($i==0){
			$detectedSpecies = $species;
		}

		$detectedSpecies = array_intersect($species, $detectedSpecies);

		if(sizeof($detectedSpecies)<=1){
			return $detectedSpecies; 
		}
		$i++;*/
//	}
	return $species;
}

function getSpeciesList(){
	$speciesList = array();
	$speciesList["Tuberculosis"] = "";
	$speciesList["Mosquito"] = "";
	$speciesList["Zebra fish"]  = "";
	$speciesList["Arabidopsis thaliana"] = "";
	$speciesList["Rice"] = "";
	$speciesList["Sea Squirt"]  = "";
	$speciesList["Barley"] = "";
	$speciesList["Frog"] = "";
	$speciesList["Soybean"] = "";
	$speciesList["Fruit fly"] = "";
	$speciesList["Horse"] = "";
	$speciesList["Rhesus Monkey"]  = "";
	$speciesList["Wine Grape"] = "";
	$speciesList["Yeast"] = "";
	$speciesList["Tomato"] = "";
	$speciesList["Rat"] = "";
	$speciesList["Human"] = "";
	$speciesList["Cow"] = "";
	$speciesList["Western Balsam Poplar"] = "";
	$speciesList["Chimpanzee"] = "";
	$speciesList["Indian Rice"] = "";
	$speciesList["Dog"] = "";
	$speciesList["Maize"] = "";
	$speciesList["Pig"] = "";
	$speciesList["Worm"] = "";
	$speciesList["Platypus"] = "";
	$speciesList["Chicken"] = "";
	$speciesList["Fusarium graminearum"]  = "";
	$speciesList["Bacillus subtilis"]  = "";
	$speciesList["Escherichia coli"]  = "";
	$speciesList["Black mold"]  = "";
	$speciesList["Mouse"]  = "";

	return $speciesList;
}

/**/
function supportedMapping($organism, $sourceType = 1, $source=""){

	$destiny = array();

//	$destiny[] = array("x","y");

	if($source==="" || $sourceType == 1 || $sourceType == 2){

		$queryType = $sourceType == 1 ? "source" : "target" ;


		$query = "webservice.bridgedb.org/$organism/".$queryType."DataSources";
		$list = getHttp($query);

		$data=explode("\n", trim($list));

		foreach($data as $elem){
			$destiny[$elem] = getDataSourceCode($elem);
	        }


	} else {
		$datasourcelist = getDataSourceList();
		foreach($datasourcelist as $code){
			$query = "webservice.bridgedb.org/$organism/isMappingSupported/$source/$code";
			$isCompatible = getHttp($query);
			//echo $isCompatible;
			if($isCompatible === "true"){
				$destiny[$code] = getDataSourceFromCode($code);
				//echo $code . " -> " . $isCompatible  . "<-  <br>";
			}
		}
	}

        return $destiny;
}


function detectSpecies($id){

	$speciesList = getSpeciesList();
	//echo "-> ".$id;

	$urls = array();
	$answers = array();

	$id = is_array($id)? $id[0] : $id;

	$i = 0;
	//var_dump($speciesList);
	foreach($speciesList as $specie => $code){
				//$url = "webservice.bridgedb.org/". $specie ."/search/".$id;
				$url = "webservice.bridgedb.org/Human/search/".$id;

				echo $url;

				$result = getHttp2($url); //$url);
				//echo $specie . " " .$result . " " . $url; //if($i++ >  30 )return;

				echo "$specie xx> ".$result . " <";

				if(sizeof(trim($result))>0){
					$aCodes = explode("\n", $result);
					foreach($aCodes as $rcode){
						//echo "comparing $result to $id | ";
						if( startsWith($rcode, $id."\t") ){
								echo "TRUE TRUE TRUE ";
								return $specie;
						}
					}
				}
	}
	return "from " . $id;
}


function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}


function detectSpecies_del($speciesList2, $id){

	$speciesList = getSpeciesList();
	//echo "-> ".$id;

	$detectedSpecies = array();
	foreach($speciesList as $specie => $code){
		//echo "-> ".getIdType($id, $specie) . "<br>";
		if(getIdType($id, $specie)!=false){
			//echo $specie . "<br>";
			$detectedSpecies[] = $specie;
		}
	}

	return $detectedSpecies;
}


function getIdType($oid, $species="Human"){
	$query = "webservice.bridgedb.org/$species/search/".$oid;

//	return "aa";

        $data = getHttp($query);

//	echo $data; 
//	die();
//	var_dump($data);

	$data = explode("\n", $data);

//	var_dump($data);

	foreach($data as $value){
		//echo $value;

		list($id, $type) = explode("\t", $value);	
//		echo "<br>-".$id;
//		echo "<br>-".$type;
		
		if($id === $oid){
			$dst = getDataSourceCode($type);
			 return $dst;
		}
	}
	//echo "false";

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



function convertId($specie, $idType, $id, $convertTo=null){
	$s = "http://webservice.bridgedb.org/$specie/xrefs/$idType/$id";

	if($convertTo!=null)
		$s = $s . "?dataSource=$convertTo";

	//echo $s;
        $data = file_get_contents($s);
	$data = explode("\n", $data);

	//var_dump($s);

	$result = array();

	foreach($data as $item){
		list($id, $type) = explode("\t", $item);
		$result[trim($id)] = trim($type);
	}

	//var_dump($result);

	return $result;
}



function convertBatchList($specie, $idTypeFrom, $idTypeTo, $idList){

		$ret = "";
		$retVal = "";

		//$specie = "Human";

	 	$s = "webservice.bridgedb.org/$specie/xrefsBatch/$idTypeFrom?dataSource=".$idTypeTo;

		$sidList = "";
	        foreach($idList as $id)  $sidList .= $id . "\n";

	       	$data = postHttp($s, $sidList);
		$result = $data;

        	$data = explode("\n", $data);

	        $r = "";
        	foreach($data as $item){
	                list($id, $type, $convertedList) = explode("\t", $item);
			$aConvertedList = explode(",", $convertedList);

			$sConvertedList = "";
			foreach($aConvertedList as $key => $convertedListItem) $sConvertedList = explode(":", $convertedListItem)[1];

               		$r .= $id . "\t" . $type  . "\t" . $sConvertedList . "\n";
        	}
		//error_log( "====". $s . "\t" . $result ); 
		
	        return trim($r);
}


function convertList($specie, $idTypeFrom, $idTypeTo, $idList){
		$ret = "";
		$retVal = "";
        	$data = $idList;

		//var_dump($idList);
	
        	//$type = getIdType(trim($data[0]));
	        //echo "identified data type for ". $data[0] . " is " . $type;
        	//echo "<h2>Converting from $type to Ensembl</h2>";
	        //echo "<pre>";
		$i = 0;
        	foreach($data as $element){
			$retVal .= $i == 0 ? "":"\n";
			$i++;
			
			if($idTypeFrom === "auto"){
				//$computedIdTypeFrom = getIdType(trim($element));
				$computedIdTypeFrom = getIdType( trim($element) ) ; //check if false
			} else {
				$computedIdTypeFrom = $idTypeFrom;
			}

                	$cList = convertId($specie, $computedIdTypeFrom, trim($element));

			//echo $cList;

			$dataSourceName = getDataSourceFromCode($idTypeTo);	
			$result = parseByType($dataSourceName, $cList);

			$res = "";
			//var_dump($cList);
                	foreach($result as $key => $elem){
						$res .= $key . "\t";
						//echo "(" .$key . " ". $elem.")";
			}
	       	        //$retVal .= $element . "\t" . $res . "\n";
	       	        $retVal .= $element . "\t" . getDataSourceFromCode($computedIdTypeFrom) . "\t" . $res;
        	}
	        //echo "</pre>";
//		return $idTypeFrom . " " .$idTypeTo . " " .$retVal;
		return trim($retVal);
//		return $cList;
}

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

//echo convertList("X", explode("\n", $data) );

//$result = getIdSource("", "X", "1007_s_at");
//$r2 = parseByType("Ensembl", $result);


?>
