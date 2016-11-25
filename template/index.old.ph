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
                        <div class="col-sm-10 col-sm-offset-1 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>ID List</h3>
						<div style="color:white;" id="idType"></div>
                            		<p></p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-spinner"></i>
                        		</div>
                            </div>
                            <div class="form-bottom contact-form">
			                    <form id="idForm" role="form" action="assets/contact.php" method="post">
			                        <div class="form-group col-md-6">

			                            <label class="sr-only" for="contact-message">Id List</label>
			                            <textarea name="idList"  class="contact-message form-control" placeholder="Paste your ID list" id="idlist"><?=$exampleSet?></textarea>
			                          </div>
                                 			                        <div class="form-group col-md-6">
				                  <select id="idTypeTo" name="idTypeTo" class="form-control">
                                                      <?php
                                                      foreach($dsl as $k => $r):
                                                      ?>
                                                              <option value="<?=$r?>"><?=$k?></option>
                                                      <?php
                                                      endforeach;
                                                      ?>
                                                  </select>
			                          <label class="sr-only" for="contact-message">Id List</label>
			                          <textarea name="convertedIdForm" class="contact-message form-control" id="convertedIdList"></textarea>
			                        </div>
						<div class+"form-group">
				                        <button id="convertIds" type="button" class="btn">Convert</button>
						</div>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

	<?php
		echo Hello();
		echo "XXX";
	?>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        

	<script language="javascript">
		$('#idlist').on('paste', function () {
		  var element = this;
		  setTimeout(function () {
		    var text = $(element).val();
		    var aText = text.split('\n');
		    //alert(aText[0]);
		    call(aText[0]);
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
			//alert('');
				serializedData = $("#idForm").serialize();
				//alert(serializedData);
				$.ajax({url: 'ajax/convertIdList/X', type: 'post', contentType: 'application/x-www-form-urlencoded' , data : serializedData, success : function(data, textStatus, jqXHR) {
					//alert(data);
					$('#convertedIdList').val(data);
				}
			})
		});


		function call(id){
		        $.ajax({url: "ajax/getIdType/"+id, success: function(result){
					//alert(result);
					code = result.split(",");
					$('#idType').html("Based on the list first id, the id type is: "+code[1]);
					$('#idTypeFrom').val(code[0]);
    			}});
		}
		function call2(id){
			serializedData = $("#idForm").serialize();
		        $.ajax({url: "ajax/detectSpecies/", type: 'post', contentType: 'application/x-www-form-urlencoded', data: serializedData, success: function(result){
				//alert(serializedData);
				alert(result);
				//$('#idType').html("Based on the list first id, the id type is: "+result);
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


		$(function() {
        	    $('textarea[id$=idList]').scroll(function() {
	                $('textarea[id$=convertedIdList]')
                	.scrollTop($('textarea[id$=idList]').scrollTop());
        	    });
	        });

	</script>



        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
