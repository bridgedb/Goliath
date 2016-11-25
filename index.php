<?php 
// web/index.php
require_once __DIR__.'/vendor/autoload.php';

//use Silex\Provider\FormServiceProvider;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$app = new Silex\Application();

$app['debug'] = true;
$app['defaultSpecie'] = "Human";


$app->get('/', function () use ($app){
	//return Hello();
	//$dsl = getDataSourceList();
	

	$dsl1 = supportedMapping($app['defaultSpecie'], 1);
	ksort($dsl1, SORT_STRING);

	$dsl2 = supportedMapping($app['defaultSpecie'], 2);
	ksort($dsl2, SORT_STRING);


	$speciesArray = getSpeciesList();
	$species = array();
	foreach($speciesArray as $specie => $name){
		$species[] = $specie;
	}
	asort($species);
	

	$exampleSet = "1053_at\n1007_s_at\n117_at";


	return render("index.php", array( "species"=>$species, "dsl2"=>$dsl2, "dsl1"=>$dsl1, "exampleSet"=>$exampleSet, "defaultSpecie"=>"Human" ));
});


$app->post('/ajax/detectSpecie', function (Request $request) {
	//var_dump($request);
	//$detectedSpecies = detectSpecies($speciesList, $id);
	//$idList = "1053_at"; 
	$idList = $request->get("idList");

	//$species = "1053_at,117_at";
	$idList = explode("\n", $idList);

	//$species = str_replace("\n", "\n* ", $species);
	//return $species;

	//$specieList = explode("\n", $species);

	$result = detectSpecie($idList);

	//var_dump($result);
	return $result;

//	return implode("\n", $result);
//	return $result;

//	return "";
/*	if(sizeof($result)==0) return "no species";
	else if(sizeof($result)==1) return $result[0];
	else return implode("\n", $detectedSpecies);*/
});


$app->get('/ajax/detectSpecies/{id}', function ($id) {
	//var_dump($request);
	//$detectedSpecies = detectSpecies($speciesList, $id);

	$result = detectSpecies("", $id);
	if(sizeof($result)==0) return "no species";
		else return implode(" - ", $detectedSpecies);
});


$app->post('/ajax/convertIdList', function (Request $request) use ($app){
	//var_dump($request);

	$idList = $request->get("idList");
	$idList = explode("\n", trim($idList) );

        $specie = $request->get("specie");

	$idTypeFrom   = $request->get("idTypeFrom");
	$idTypeTo   = $request->get("idTypeTo");

	// . " " . $idType;
	//var_dump($idList);
	
	if($idTypeFrom==="auto")
		return convertList($specie, $idTypeFrom, $idTypeTo, $idList);
	else
		return convertBatchList($specie, $idTypeFrom, $idTypeTo, $idList);

	//return render("index.php");
});

$app->get('/ajax/supportedSourceDataSources/{organism}', function ($organism) use ($app){
	$supported =  supportedMapping($organism, 1);

	ksort($supported);

	$result = "";
	foreach($supported as $key => $elem){
		$result .= $key . "\t" . $elem . "\n";
	}

	$result = "Auto detect\tauto\n".$result;

	return trim($result);
});
$app->get('/ajax/supportedTargetDataSources/{organism}', function ($organism) use ($app){
	$supported =  supportedMapping($organism, 2);

	ksort($supported);

	$result = "";
	foreach($supported as $key => $elem){
		$result .= $key . "\t" . $elem . "\n";
	}

	return trim($result);
});


$app->get('/ajax/supportedMappingList/{organism}', function ($organism) use ($app){
	$supported =  supportedMapping($organism);

	$result = "";
	foreach($supported as $elem){
		$result .= $elem[0] . "\t" . $elem[1] . "\n";
	}

	return $result;
});




$app->get('/ajax/getIdType/{id}', function ($id) use ($app){
	$idType = getIdType($id);
	//return $app->json($idType);
	//return $idType.",".getDataSourceFromCode($computedIdTypeFrom);
	return $idType.",".getDataSourceFromCode($computedIdTypeFrom);
	//return render("index.php");
});


$app->run();


function render($page, $pagevar){
	ob_start();
	foreach($pagevar as $key => $elem){
		${$key} = $elem;
	}
	include("template/".$head);
	include("template/".$page);
	return ob_get_clean();
}
