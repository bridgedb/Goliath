<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Goliath</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/local-style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

		<!-- Top menu -->
		<!--nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!--a class="navbar-brand" href="index.html">Bootstrap Contact Form Template</a-->
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<!--span class="li-text">
								Put some text or
							</span> 
							<a href="#"><strong>links</strong></a> 
							<span class="li-text">
								here, or some icons: 
							</span> 
							<span class="li-social">
								<a href="#"><i class="fa fa-facebook"></i></a> 
								<a href="#"><i class="fa fa-twitter"></i></a> 
								<a href="#"><i class="fa fa-envelope"></i></a> 
								<a href="#"><i class="fa fa-skype"></i></a>
							</span-->
						</li>
					</ul>
				</div>
			</div>
		</nav-->

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Goliath</strong> ID Converter</h1>
                            <div class="description">
                            	<p>
	                            	Please copy paste your ID list.<br/>
	                            	The system will try to guess your id type. 
					If it's not correct, please adjust accordingly.
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>ID List</h3>
						<div style="color:white;" id="idType"></div>
                            			<!--p></p-->
                        		</div>
                        		<div class="form-top-right has-spinner">
                        			<i id="activityIndicator" style="display:none"><img src="assets/img/loader.gif"></i>
						<!--i class="icon-spin icon-refresh"></i-->
                        		</div>
                                </div>
	                        <div class="form-bottom contact-form">
  				     <!--div class="btn-group" style="height:60px;">
                                                       <button type="button" class="btn btn-default btn-xs" aria-label="Edit list" id="editButton">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Power editor
                                                       </button>
					     </div-->

			                    <form id="idForm" role="form" action="assets/contact.php" method="post" style=Â"">
			                        <div class="form-group col-md-12">
			                            <label class="sr-only" for="contact-message">Id List</label>
			                            <textarea name="idList"  class="contact-message form-control" placeholder="Paste your ID list" id="idlist"><?=$exampleSet?></textarea>

						    <div class="row">
                                                     <label class="col-md-4 control-label" for="selectbasic" style="color:white;">Species</label>
                                                      <div class="col-md-8">
                                                      <select id="specie" name="specie" class="form-control">
                                                      <!--option id="specieauto" value="auto">Auto detect</option-->
                                                       <?php
                                                       foreach($species as $specie):
							       $bDefaultSpecie = $defaultSpecie === $specie ? "selected='selected'" : "";
                                                       ?>
                                                               <option <?=$bDefaultSpecie?> value="<?=$specie?>"><?=$specie?></option>
                                                       <?php
                                                       endforeach;
                                                       ?>
                                                      </select>
                                                      </div>
                                                   </div>

						    <div class="row">
						     <label class="col-md-4 control-label" for="selectbasic" style="color:white;">Convert from</label>
						      <div class="col-md-8">
						       <select id="idTypeFrom" name="idTypeFrom" class="form-control">
                                                               <!--option value="auto">Auto detect (single type Id)</option-->
                                                               <option value="auto">Auto detect multi type (each Id type can be different) </option>
                                                       <?php
                                                       foreach($dsl1 as $k => $r):
                                                       ?>
                                                               <option value="<?=$r?>"><?=$k?></option>
                                                       <?php
                                                       endforeach;
                                                       ?>
                                                      </select>
						      </div>
						   </div>
						   
						  
						  <div class="row">
						    <div class="form-group">
						     <label class="col-md-4 control-label" for="selectbasic" style="color:white;">Convert to</label>
						      <div class="col-md-8">
						       <select id="idTypeTo" name="idTypeTo" class="form-control">
                                                       <?php
                                                       foreach($dsl2 as $k => $r):
                                                       ?>
                                                               <option value="<?=$r?>"><?=$k?></option>
                                                       <?php
                                                       endforeach;
                                                       ?>
                                                       </select>
						      </div>
						     </div>
						   </div>
                                                </div>
						<div class="form-group">
					                     <button id="convertIds" type="button" class="btn">Convert</button>
						</div>

			                    </form>
				<div class="row"><!--row-->
       				   <div class="col-md-12" id="result" style="display:none;">
                                           <div aclass="btn-toolbar" role="toolbar" style="height:60px;">
						     <div class="btn-group">
                                                      <button type="button" class="btn btn-default btn-xs" aria-label="Copy list" id="copyButton">
                                                        <span class="glyphicon glyphicon-copy" aria-hidden="true"></span> Copy</button><button id="copyResultsMenu" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    								<span class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
  						      </button><ul class="dropdown-menu">
    							        <li><a href="#" id="copyResultsMenu1">Copy results</a></li>
  							        <li><a href="#" id="copyResultsMenu2">Copy 2 columns</a></li>
  						      </ul>
						     </div>
						     <div class="btn-group">
                                                      <button type="button" class="btn btn-default btn-xs" aria-label="Copy list" id="downloadButton">
                                                        <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download</button><button id="downloadResultsMenu" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    								<span class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
  						      </button><ul class="dropdown-menu">
    							        <li><a href="#" id="downloadResultsMenu1">Download results</a></li>
  							        <li><a href="#" id="downloadResultsMenu2">Download 2 columns</a></li>
  						      </ul>
						     </div>
                                                     <!--<input type="checkbox"/> Include original id column-->
                                           </div>
                                           <div id="copyAreaContainer" style="display:none;">
                                                     <textarea class="form-control col-md-12" rows="4" id="copyArea"></textarea>
                                           </div>
                                           <div class="table-responsive" id="resultContainer"></div>
       				   </div>
				</div><!--row-->
			     	</div>

                               </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/clipboard.min.js"></script>
        

	<script language="javascript">

		/* Convert List primitive functions  / model */

		var id_idList = [];
		var convertTo = "";


		var IdListSingleton = (function () {
	        var instance;
		

	        function createInstance() {
		        var object = new Object("I am the instance");
		        return object;
		}

		return {
	                  getInstance: function () {
        	    		if (!instance) {
	        	        	instance = createInstance();
                   	  	}
			  return instance;
		          }
		};
		})();



		function getConvertTo(){
			return convertTo;
		}

		function getIdList(){
			return id_idList;
		}
		

		function id_loadList(idList){

			/*truncate current existing list*/
			if(idList.length < id_idList.length){
				id_idList = id_idList.slice(0,idList.length-1);
			}
			
			/*check changes*/
			for(i=0; i<idList.length; i++){
				if(typeof id_idList[i] !== 'undefined'){
					if(id_idList[i].id != idList[i] || true)
						id_idList[i] = {id:idList[i], dataSource:null, dataDestination:null, convertedId:[] };
				}else{
						id_idList[i] = {id:idList[i], dataSource:null, dataDestination:null, convertedId:[] };
				}
			}

			return id_idList;
		}
		
		function id_remove(idIndex){
			idList[idIndex] = {id:null, convertedId:[]};
		}

		function id_set(idIndex, newId){
			idList[idIndex] = {id:newId, convertedId:[]};
		}

		function id_convertList(specie, idTypeFrom, idType){
				ids="";
				for(i=0; i < id_idList.length; i++){
					ids += id_idList[i].id;
					ids += i!=id_idList.length-1 ? "\n" : "";
				}

				serializedData = "specie="+specie+"&idList="+ids+"&idTypeFrom="+idTypeFrom+"&idTypeTo="+idType;

                                startActivityIndicator();
				$.ajax({url: 'ajax/convertIdList', type: 'post', contentType: 'application/x-www-form-urlencoded' , data : serializedData, success : function(data, textStatus, jqXHR) {
					stopActivityIndicator();

					//alert(data + " aaa");

					aData = data.split("\n");
					console.log(id_idList);
					console.log(data);
					for(i=0; i<aData.length; i++){
						conversion = aData[i].split("\t");

						id_idList[i].convertedId = new Array(0);

						if(conversion.length > 1 && conversion[1].trim().length>0)
							id_idList[i].dataSource = conversion[1];
						for(n=2; n < conversion.length; n++){
							if(conversion[n].trim().length>0)
								id_idList[i].convertedId.push(conversion[n]);
						}
						id_idList[i].dataDestiny = idType;
					}
					$('#convertedIdList').val(data);
					displayList();
				}
			})

		}



	        /* controller */
		
		
		function loadList(){			
			if($('#idlist').val().search("\t")>=0) alert("Data might be multi column. The data should only contain one element per line. Please check.");
			data  = $('#idlist').val().split("\n");
			return id_loadList(data);
		}

		function convertList(){						
			id_convertList($('#specie').val(), $('#idTypeFrom').val(), $('#idTypeTo').val());
		}

		function displayList(){
			idList = getIdList();

			table = "";
			dataType = "";
			for(i=0; i<idList.length; i++){
				//dataSource = idList[i].dataSource == null ? "<a href='#' data-toggle='tooltip' title='This id was not recognized'>?</a>" : idList[i].dataSource;
				
				id = idList[i].dataSource == null ? idList[i].id + " <sup><span data-toggle='tooltip' title='The id type was not recognized' class='glyphicon glyphicon-alert'></span></sup>" : idList[i].id;
				//id = id ==

				table += "<tr><td>"+id+"</td><td>"+idList[i].convertedId[0]+"</td><td></td></tr>";
			
				if(i==0)
					dataSource = idList[i].dataSource;
				else
					dataSource = idList[i].dataSource == dataSource ? dataSource : "<span data-toggle='tooltip' title='Several id types were recognized'>Mixed <sup><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span></sup></span>";
			}

			convertedDataSource = $("#idTypeTo").val();
			table = "<table class='table table-stripped'><thead><tr><th>"+dataSource+"</th><th>"+convertedDataSource+"</th><th></th></tr></thead><tbody>"+table+"</tbody></table>";
			
			//$("#idForm").slideUp("fast");
			$("#resultContainer").html(table);
			$("#result").slideDown("fast");
			
			$('body').tooltip({
			    selector: '[data-toggle=tooltip]'
			});

		}


		function generateDataToCopy(cols){
			idList = getIdList();
			dataTxt = "";
                        for(i=0; i<idList.length; i++){
				if(typeof idList[i].convertedId[0] === 'undefined'){
					dataTxt += "\n";
				} else {
					if(cols==1)
	                                	dataTxt += idList[i].convertedId[0]+"\n";
					else
						dataTxt += idList[i].id + "\t" + idList[i].convertedId[0]+"\n";
				}
                        }
			alert(dataTxt)
			$("#copyArea").val(dataTxt);
			return dataTxt;
		}

		function editList(){
			$("#idForm").slideDown("fast");
		}

		function displayCopyArea(){
			$("#copyAreaContainer").slideDown("fast");
			$("#copyArea").focus(function() {
	 		        var $this = $(this);
	 		        $this.select();

	 			// Work around Chrome's little problem
			        $this.mouseup(function() {
				        // Prevent further mouseup intervention
			                $this.unbind("mouseup");
			        	return false;
				});
			});
		}

		function supportedMapping(species, code){
			       $("#idTypeTo").html('');
			       $("#idTypeTo").html('<option>loading</option>');

			       $.ajax({url: 'ajax/supportedMappingList/'+species, type: 'get', success : function(data, textStatus, jqXHR) {
					selectData = [];
					result = data.split("\n");

				        $("#idTypeTo").html('');
					for(i=0; i < result.length; i++){
						aData = result[i].split("\t");
						$("#idTypeTo").append( $("<option value='"+aData[0]+"'>"+aData[1]+"</option>")  );
					}
					//alert("-> "+selectData.length); alert("--> "+selectData);
					//$("#idTypeTo").val(selectData);
                               }
                               })
		}


		function supportedMapping2(species, jqueryid, convertType){
			       $(jqueryid).html('');
			       $(jqueryid).html('<option>loading</option>');

				ws = "";
			        if(convertType==1){
					ws = "supportedSourceDataSources";
				}else if(convertType==2){
					ws = "supportedTargetDataSources";
				}

			       $.ajax({url: 'ajax/'+ws+'/'+species, type: 'get', success : function(data, textStatus, jqXHR) {
//alert();
					selectData = [];
					result = data.split("\n");

				        $(jqueryid).html('');
					for(i=0; i < result.length; i++){
						aData = result[i].split("\t");
						$(jqueryid).append( $("<option value='"+aData[1]+"'>"+aData[0]+"</option>")  );
					}
					//alert("-> "+selectData.length); alert("--> "+selectData);
					//$("#idTypeTo").val(selectData);
                               }
                               })
		}

		/*Support functions */

		function downloadFile(filename, text) {
		  var element = document.createElement('a');
		  element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
		  element.setAttribute('download', filename);

		  element.style.display = 'none';
		  document.body.appendChild(element);

		  element.click();

		  document.body.removeChild(element);
		}

		/* GUI */

		function startActivityIndicator(){
			$("#activityIndicator").show();
		}

		function stopActivityIndicator(){
			$("#activityIndicator").hide();
		}


		/* GUI event hooks */

		/*$('#idTypeFrom').on('change', function(){
			if($('#idTypeFrom').val()=='auto'){
				supportedMapping($('#specie').val(), '' );
			} else {
				supportedMapping($('#specie').val(), $("#idTypeFrom").val() );
			}
		});*/

		$('#specie').on('change', function(){
			supportedMapping2($('#specie').val(), "#idTypeFrom", 1);
			supportedMapping2($('#specie').val(), "#idTypeTo", 2);

			/*if($('#idTypeTo').val()=='auto'){
				supportedMapping($('#specie').val(), '' );
			} else {
				supportedMapping($('#specie').val(), $("#idTypeFrom").val() );
			}*/
		});


		$('#idlist').on('paste', function () {
		  var element = this;
		  setTimeout(function () {
		    var text = $(element).val();
		    var aText = text.split('\n');
		    //alert(aText[0]);
		    //call(aText[0]);
		    detectSpecie();
		    //call2(text);
		  }, 100);
		});

		$('#idlist').on('click', function (){
			//$(this).select();
		});

	        $('#convertedIdList').on('click', function (){
                        //$(this).select();
                });

		$('#convertIds').on('click', function(){
			convertList( loadList() );
			
		});

		$('#downloadButton').on('click', function(){
			data = generateDataToCopy(1);
			downloadFile("data.tsv",data);
		});

		$('#downloadResultsMenu1').on('click', function(){
			data = generateDataToCopy(1);
			downloadFile("data.tsv",data);
		});

		$('#downloadResultsMenu2').on('click', function(){
			data = generateDataToCopy(2);
			downloadFile("data.tsv",data);
		});


		clip = new Clipboard('#copyButton', {
   			 text: function(trigger) {
		        return generateDataToCopy(1);
		    }
		});


		clip.on('success', function(e){
			console.info('Action:', e.action);
			console.info('Text:', e.text);
			console.info('Trigger:', e.trigger);
			alert("copied");
		});

		clip.on('error', function(e){
			alert("not copied");
		});


		clip1 = new Clipboard('#copyResultsMenu1', {
   			 text: function(trigger) {
		        return generateDataToCopy(1);
		    }
		});
		clip1 = new Clipboard('#copyResultsMenu2', {
   			 text: function(trigger) {
		        return generateDataToCopy(2);
		    }
		});



		$('#editButton').on('click', function(){
			//alert('');
			editList();
		});

		/*$('#copyButton').on('click', function(){
			copyArea();
		});*/




		function call(id){
		        $.ajax({url: "ajax/getIdType/"+id, success: function(result){
					alert(result);
					
					//code = result.split(",");
					//$('#idType').html("Based on the list first id, the id type is: "+code[1]);
					//$('#idTypeFrom').val(code[0]);
    			}});

		}

		function detectSpecie(){
			serializedData = $("#idForm").serialize();
		        $.ajax({url: "ajax/detectSpecie", type: 'post', contentType: 'application/x-www-form-urlencoded', data: serializedData, success: function(result){
				alert(result);
				$("#autospecie").html("Auto detect: "+result);
    			}});

		}

		var loggui = [];
		var stack = 0;





		function showMessage(message){

			stack++;
			loggui.push(message);
			loggui.forEach(function(entry){
					
				}
			);
		}

		function removeMessagee(){
			
			stack--;
			loggui.remove();
		}


//		$(function() {
//        	    $('textarea[id$=idList]').scroll(function() {
//                $('textarea[id$=convertedIdList]')
//                	.scrollTop($('textarea[id$=idList]').scrollTop());
//        	    });
//	        });

	</script>



        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
