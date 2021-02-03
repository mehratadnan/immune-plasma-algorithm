<?php



?>



<!doctype html>
<html lang="en">
  <head>
  	<title>IPA</title>
    <meta charset="utf-8">
    <link rel="icon" href="images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<script src="plot.js"></script>
  </head>
  <body>
		
		<div class="alert " id="danger">
			<strong></strong> 
	  	</div>

		<div class="wrapper d-flex align-items-stretch">
				<nav id="sidebar">
					<div class="custom-menu">
						<button type="button" id="sidebarCollapse" class="btn btn-primary" >
				<i class="fa fa-bars"></i>
				<span class="sr-only">Toggle Menu</span>
				</button>
			</div>
				<div class="p-4">
					<img src="images/logo.png" class="img-fluid center1" alt="Responsive image" style="width: 50%;">
					<hr>
					<ul class="list-unstyled components mb-5">
					<li onclick="goto(this,1)" class=" active"><span class="fa fa-home mr-3 span"></span>About IPA</li>
					<hr>
					<li onclick="goto(this,2)"><span class="fas fa-code mr-3 span " style="font-size: 18px;"></span>Pseudo Code of IPA</li>
					<hr>
					<li onclick="goto(this,3)"><span class="fa fa-play-circle-o mr-3 span " style="font-size: 24px;margin-left: 3px;"></span>Run IPA Online</li>
					<hr>
					<li onclick="goto(this,4)"><span class="fa fa-download mr-3 span " style="font-size: 24px;margin-left: 3px;"></span>Download IPA</li>
					<hr>
					<li onclick="goto(this,5)"><span class="fas fa-users mr-3 span " style="font-size: 21px;margin-left: 3px;"></span>About Us</li>
					<hr>
					</ul>

				<div class="footer" style="bottom: 0px;position: absolute;">
					<p>
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
						All rights reserved  
					</p>
				</div>

			</div>
			</nav>

			<!-- Page Content  -->
			<div id="content" class="p-4 p-md-5 pt-5 slide content_men " style="font-size: 23px;color:#526272 !important;overflow: auto;height: 800px;text-align: justify;padding-top: 0px!important;padding-bottom: 0px!important;">
				<div id="content1" style="line-height: 1.8 !important;overflow: hidden;" >
					<hr>
					<img src="images/imu.png" class="img-fluid center" alt="Responsive image" style="width: 60%;">
					<hr>
					&nbsp;&nbsp;&nbsp;&nbsp;The recent global health crisis also known as the COVID-19 or coronavirus pandemic has attracted the researchers' attentions 
					to a treatment approach called immune plasma or convalescent plasma once more again. The main idea lying behind the immune plasma treatment is 
					transferring the antibody rich part 
					of the blood taken from the patients who are recovered previously to the critical individuals and its effciency has been proven by successfully 
					using against great influenza of 1918, H1N1 flu, MERS, SARS and Ebola. In this study, we modeled the mentioned treatment approach and introduced a 
					new meta-heuristic called Immune Plasma (IP) algorithm. The performance of the IP algorithm was investigated in detail and then compared with some 
					of the classical and state-of-art meta-heuristics by solving a set of numerical benchmark problems. Moreover, the capabilities of the IP algorithm 
					were also analyzed over complex engineering optimization problems related with the noise minimization of the electro-encephalography signal measurements. 
					The results of the experimental studies showed that the IP algorithm is capable of obtaining better solutions for the vast majority of the test problems 
					compared to other commonly used meta-heuristic algorithms.
					<hr>
				</div>

				<div id="content2" style="display: none;">
						<div style="overflow: hidden;">
						<hr>
							<h4 style="text-align:center"  > <b style="font-size:30px !important" >Pseudo Code of IPA.</b> </h4>
						<hr>
					

						<div class="col-sm-9" style="float: left;">
							<pre>
								<code class="code" >
1: Assign values to PS, D, NoD and NoR control parameters.
2: Set Xbest as the best individual of the PS individuals.
3: Select t<sub>max</sub> and set t<sub>cr</sub> to PS.
4: while t<sub>cr</sub> < t<sub>max</sub> do
<strong class="codetext" id="codetext_1">5: 		//Infection distribution
6: 		for k &larr; 1 ...PS do
7: 			if t<sub>cr</sub> < t<sub>max</sub> then
8:				t<sub>cr</sub> &larr; t<sub>cr</sub> + 1 and x<sub>k</sub><sup>inf</sup> infect x<sub>k</sub> with x<sub>m</sub> using Eq.(2)
9:				if f(x<sub>k</sub><sup>inf</sup>) < f(x<sub>k</sub>) then
10:					Update x<sub>k</sub> with x<sub>k</sub><sup>inf</sup> as described in Eq.(3)
11:					Update x<sub>best</sub> with x<sub>k</sub> if f(x<sub>k</sub>) < f(x<sub>k</sub>)
12:				end if
13:			 end if
14:		end for</strong>
<strong class="codetext" id="codetext_2">15: 	//Plasma transfer for critical individuals
16: 	doseControl[1 ...NoR] &larr; set each element to 1 
17:	dIndexes[1 ...NoD] &larr; get the indexes of the donors
18: 	rIndexes[1 ... NOR] &larr; get the indexes of the receivers
19: 	treatmentControl[1 ...NoR] &larr; set each element to 1
20: 	for i &larr; 1 ...NoR do
21:		k &larr; rIndexes[i] and m &larr; a random element from dIndexes
22: 		x<sub>k</sub><sup>rcv</sup> , x<sub>m</sub><sup>dnr</sup>  get the kth and mth individuals from the population
23:			while treatmentControl[i] == 1 do
24:				if t<sub>cr</sub> < t<sub>max</sub> then
25:					t<sub>cr</sub> &larr; t<sub>cr</sub> + 1 and x<sub>k</sub><sup>rcv-P</sup> &larr; plasma treatment to x<sub>k</sub><sup>rcv</sup> with x<sub>m</sub><sup>dnr</sup> using Eq.(4)
26:					if doseControl[i] == 1 then
27:						if f(x<sub>k</sub><sup>rcv-P</sup>) < f(x<sub>m</sub><sup>dnr</sup>) then
28:							doseControl[i] &larr; dose Control[i] +1
29:							Update x<sub>k</sub><sup>rcv</sup> with x<sub>k</sub><sup>rcv-P</sup>
30:						else
31:							Update x<sub>k</sub><sup>rcv</sup> with x<sub>m</sub><sup>dnr</sup>
32:							Set treatmentControl[i] to 0 for completing transfer
33:						end if
34:					else
35:						if f(x<sub>k</sub><sup>rcv-P</sup>) < f(x<sub>k</sub><sup>rcv</sup>) then
36: 						Update x<sub>k</sub><sup>rcv</sup> with x<sub>k</sub><sup>rcv-P</sup>
37:						else
38:							Set treatmentControl[i] to 0 for completing transfer
39:						end if
40:					end if
41:					Update x<sub>best</sub> with x<sub>k</sub><sup>rcv</sup> if f(x<sub>k</sub><sup>rcv</sup>) < f (x<sub>best</sub>)
42:				end if
43:			end while
44: 	end for</strong>
<strong class="codetext" id="codetext_3">45:	//Donor update
46: 	for i &larr; 1 ...NoD do
47:		if t<sub>cr</sub> < t<sub>max</sub> then
48:			t<sub>cr</sub> &larr; t<sub>cr</sub> + 1 and m &larr; dIndexes[i]
49:			x<sub>m</sub><sup>dnr</sup> &larr; get the mth individual from the population
50:			if (t<sub>cr</sub>/t<sub>max</sub>) < rand(0,1) then
51:				Update x<sub>m</sub><sup>dnr</sup> using Eq.(5)
52:			else
53:				Update x<sub>m</sub><sup>dnr</sup> using Eq.(1)
54:			end if
55:			Update x<sub>best</sub> with the x<sub>m</sub><sup>dnr</sup> if f(x<sub>m</sub><sup>dnr</sup>) < f(x<sub>best</sub>)
56:		end if
57: 	end for</strong>
58: end while
								</code>
							</pre>
						</div>
						
						<div class="col-sm-3" style="float: left;">
						<div class="imgdiv" id="codediv_1">
							<img src="images/a2.png" class="img-fluid centerimg" alt="Responsive image" style="width: 100%;">
							<div class="overlay">
								<div class="text">- An infection can disttibute easily between individuals of a population.</div>
							</div>
							<span class="badge">1</span>
						</div>
						<div class="imgdiv">
							<img src="images/a1.png" class="img-fluid centerimg" alt="Responsive image" style="width: 100%;">
							<div class="overlay">
								<div class="text">- As time goes by, some of the individuals recover quickly while some of them become critical.</div>
							  </div>
							  <span class="badge">2</span>
						</div>
						<div class="imgdiv" id="codediv_2">
							<img src="images/a6.png" class="img-fluid centerimg" alt="Responsive image" style="width: 100%;">
							<div class="overlay">
								<div class="text">- Some individuals who are recovered can be plasma donors for the critical patients.</div>
							  </div>
							  <span class="badge">3</span>
						</div>
						<div class="imgdiv">
							<img src="images/a4.png" class="img-fluid centerimg" alt="Responsive image" style="width: 100%;">
							<div class="overlay">
								<div class="text">- The blood taken from donors is used to obtain antibody rich plasma.</div>
							  </div>
							  <span class="badge">4</span>
						</div>
						<div class="imgdiv" id="codediv_3">
							<img src="images/a5.png" class="img-fluid centerimg" alt="Responsive image" style="width: 100%;">
							<div class="overlay">
								<div class="text">- The immune system of a critical individuals can be supported with the obtained plasma.</div>
							  </div>
							  <span class="badge">5</span>
						</div>
						<div class="imgdiv">
							<img src="images/a333.png" class="img-fluid centerimg" alt="Responsive image" style="width: 90%;margin-left: 5% !important;">
							<div class="overlay">
								<div class="text" style="margin-left: 20% !important;">- Unifected:blue <br>- Recovered:green<br> - Symptpmatic:yellow<br> - Critical:red</div>
							</div>
							<span class="badge">info</span>
						</div>

						</div>
					</div>
					<hr>

				</div>

				<div id="content3" style="line-height: 1.8 !important; display: none;" >
					<div style="overflow: hidden;">
					<hr>
						<h4 style="text-align:center"  > <b style="font-size:30px !important" >The Implementation For This Algorithm Is Shown In This Tool Which Was Written In JS.</b> </h4>
					<hr>
						<h2 style=" text-align:left;margin-left:10px" class="initial">Set initial parameters values </h2>
						<hr><br class="remove">
						<div class="col-sm-12" style="float: left;">
							<form >
							<div class="form-group col-sm-3" style="float: left;">
								<label for="usr" style="text-align:left">Population Size:</label>
								<input type="number" min="1" class="form-control" id="population_size" value="30">
							</div>
							<div class="form-group col-sm-3" style="float: left;">
								<label for="text" style="text-align:left">Dimension Size:</label>
								<input type="number" min="1" class="form-control" id="dimension_size" value="30">
							</div>
							<div class="form-group col-sm-3" style="float: left;">
								<label for="text" style="text-align:left">Donors Number:</label>
								<input type="number" min="1" class="form-control" id="donors_number" value="1">
							</div>
							<div class="form-group col-sm-3" style="float: left;">
								<label for="text" style="text-align:left">Receivers Number:</label>
								<input type="number" min="1" class="form-control" id="receivers_number" value="1">
							</div>
							<div class="form-group col-sm-3" style="float: left;">
								<label for="text" style="text-align:left">Number Of Executions </label>
								<input type="number" class="form-control"  min="1" id="max_run" value="1">
							</div>
							<div class="form-group col-sm-6" style="float: left;">
								<label for="sel1" style="text-align:left">Objective Function:</label>
								<select class="form-control" id="objective_function">
									<option selected value="sphere">Sphere</option>
									<option value="ackley">Ackley</option>
									<option value="griewank">Griewank</option>
									<option value="quartic">Quartic</option>
									<option value="rastrigin">Rastrigin</option>
									<option value="rosenbrock">Rosenbrock</option>
									<option value="step">Step</option>
									<option value="schwefel">Schwefel</option>
									<option value="schwefel_1_22">Schwefel_1_22</option>
									<option value="schwefel_1_21">Schwefel_1_21</option>
									<option value="schwefel_2_22">Schwefel_2_22</option>
									
								</select>
							</div>
							<div class="form-group col-sm-3" style="float: left;">
								<label for="sel1">Click to run IPA :</label>
								<a type="" class="btn btn-primary1" id="run" style="margin-top: 1px;">Run</a>
							</div>
							</form>

							
							<div class="form-group col-sm-12"  id="tablediv" style="float: left;">
								<div class="progress" style="display: none;">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
									aria-valuemin="0" aria-valuemax="100" id="progress-bar" style="width:0%">
										0%
									</div>
								</div>
								<hr><br>
								
							</div>
						</div>
						
					</div>


				</div>

				<div id="content4" style="line-height: 1.8 !important;display:none" >
					<strong>Coming Soon</strong>
				</div>
				
				<div id="content5" style="line-height: 1.8 !important;display:none;overflow:hidden" >
				<hr>
				<h4 style="text-align:center"  > <b style="font-size:30px !important" >Meet our team.</b> </h4>
				<hr>
				<div class="py-5 text-center text-info background-info center_team" style="">
					<div class="container">
						<div class="row">

							<div class="col-lg-4 col-md-6 p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle"  style="height:245px" width="200" src="SelçukAslan.jpg">
								<h4> <b style="font-size:20px" >Doç.Dr. SELÇUK ARSLAN</b> </h4>
								<p class="mb-0 p" style="font-size:16px;color:#526272;">NHBVÜ : ENGINEERING FACULTY / COMPUTER ENGINEERING</p>
								<p class="mb-0" style="font-size:14px;color:#d6a549">selcukaslan@nevsehir.edu.tr</p>
							</div>

							<div class="col-lg-4 col-md-6 p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" style="height:245px"  width="200" src="SercanDEMİRCİ.jpg">
								<h4> <b style="font-size:20px" >Dr. Öğretim Üyesi Sercan DEMİRCİ</b> </h4>
								<p class="mb-0 p" style="font-size:16px;color:#526272">OMÜ : ENGINEERING FACULTY / COMPUTER ENGINEERING</p>
								<p class="mb-0" style="font-size:14px;color:#d6a549">sercan.demirci@omu.edu.tr</p>
							</div>
							
							<div class="col-lg-4 col-md-6 p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle"  style="height:245px" width="200" src="MohamedAliwi.jpg">
								<h4> <b style="font-size:20px" >Mohamed ALIWI</b> </h4>
								<p class="mb-0 p" style="font-size:16px;color:#526272;">OMÜ : ENGINEERING FACULTY / COMPUTER ENGINEERING</p>
								<p class="mb-0" style="font-size:14px;color:#d6a549">mohamed.aliwi@bil.omu.edu.tr</p>
							</div>

							<div class="col-lg-4 col-md-6 p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle"  style="height:245px" width="200" src="SerhatCelil.jpeg">
								<h4> <b style="font-size:20px" >Serhat Celil İLERİ</b> </h4>
								<p class="mb-0 p" style="font-size:16px;color:#526272;">NHBVÜ : ENGINEERING FACULTY / COMPUTER ENGINEERING</p>
								<p class="mb-0" style="font-size:14px;color:#d6a549">celil.ileri@bil.omu.edu.tr</p>
							</div>

							<div class="col-lg-4 col-md-6 p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" style="height:245px"  width="200" src="adnanmehrat.jpg">
								<h4> <b style="font-size:20px" >Adnan MEHRAT</b> </h4>
								<p class="mb-0 p" style="font-size:16px;color:#526272">OMÜ : ENGINEERING FACULTY / COMPUTER ENGINEERING</p>
								<p class="mb-0" style="font-size:14px;color:#d6a549">adnan.mehrat@bil.omu.edu.tr</p>
							</div>
							
							<div class="col-lg-4 col-md-6 p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle"  style="height:245px" width="200" src="SadatDuraki.png">
								<h4> <b style="font-size:20px" >Sadat DURAKI</b> </h4>
								<p class="mb-0 p" style="font-size:16px;color:#526272;">OMÜ : ENGINEERING FACULTY / COMPUTER ENGINEERING</p>
								<p class="mb-0" style="font-size:14px;color:#d6a549">sadat.duraki@bil.omu.edu.tr</p>
							</div>

						</div>

					</div>
				</div>      

					<br>
					<h2 style="text-align:center" class="content_header center_team"><strong id="number" style="color:#d6a549"> </strong> &nbsp; people around the world read about IPA</h2>
					<br>
					<div id='myDiv' style="overflow: auto;"><!-- Plotly chart will be drawn inside this DIV --></div>
				</div>
				
		
			</div>
		
		</div>
	
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script >
		var width = $(window).width();
		if (width < 700){
			$(".remove").remove();
		}
		$(window).resize(function() {
			var width = $(window).width();
			if (width < 700){
				$(".remove").remove();
			}
		});

		var try_fun=0;
		var last_slided_centent = 1 ;
		function goto(element,action) {
			if(action != last_slided_centent){
				$(".active").removeClass('active');
				$(element).addClass('active');
				$("#content"+last_slided_centent).slideUp("slow");
				$("#content"+action).slideDown("slow");
				last_slided_centent=action;
			}
		}

		$( ".imgdiv" ).hover(
			function() {
				if($(this).attr('id') == "codediv_1"){
					$("#codetext_1").addClass('codetexthover');
				}else if($(this).attr('id') == "codediv_2"){
					$("#codetext_2").addClass('codetexthover');
				}else if($(this).attr('id') == "codediv_3"){
					$("#codetext_3").addClass('codetexthover');
				}
			}, function() {
				$('.codetexthover').removeClass('codetexthover');
			}
		);


		$("#run").click(function(){
			var ctrl = 1 ;
			$(".form-control").each(function( index ) {
				if(!$(this).val()){
					ctrl=0;
					spy_alert("Please fill out fields");
				}
			});
			if(ctrl!=0){
				$("#progress-bar").css("width","0%");
				$("#progress-bar").text("0%");
				$("#progress-bar").parent().show();
				startWorker();

			}
		});

		function spy_alert(src){
			$("#danger").children().eq(0).text(src);
			$("#danger").fadeIn( "slow" );
			setTimeout(function(){ 
				$("#danger").fadeOut( "slow" );
			}, 3000);
		}

		var finish_fitnesses = [];
		var start_fitnesses = [];
		var w;
		function startWorker() {
			try_fun++;
			var for_progress = 0 ;
			var progress_value=0;
			var ctrl = 0 ;
console.time('Execution Time');
			var args = {method:"getparams",population_size:$("#population_size").val(),try_fun:try_fun,  dimension_size:$("#dimension_size").val(),donors_number:$("#donors_number").val(), receivers_number:$("#receivers_number").val(), max_run:$("#max_run").val(), objective_function_name:$("#objective_function").val()};
			if (typeof(Worker) !== "undefined") {
				if (typeof(w) == "undefined") {
				w = new Worker("worker.js");
				}
				w.postMessage({ "args": args });
				w.onmessage = function(event) {
					data = event.data ;
					data = data.split('_');
					if(data[0]=="table"){
						var str = "<div style='overflow: auto;col-sm-12'>"+data[1]+"</div>"
						$("#tablediv").append(str);
					}else if(data[0]=="progress"){
						var progress_value = parseInt(data[1]) * 100 / for_progress;
						if(progress_value>90){
							ctrl = 1;
							progress_value=100;
							$("#progress-bar").css("width",progress_value.toFixed()+"%");
							$("#progress-bar").text(progress_value.toFixed()+"%");
							setTimeout(function(){ 
								$("#progress-bar").css("width","0%");
								$("#progress-bar").text("0%");
							}, 1000);
						}
						if(ctrl==0){
							$("#progress-bar").css("width",progress_value.toFixed()+"%");
							$("#progress-bar").text(progress_value.toFixed()+"%");
						}
						
					}else if(data[0]=="max"){
						for_progress = parseInt(data[1]) * parseInt($("#max_run").val());
					}else if(data[0]=="start-fit"){
						start_fitnesses = data[1];
					}else if(data[0]=="end-fit"){
						finish_fitnesses = data[1];
					}else if (data[0]=="end"){
						stopWorker();
					}


				};
			} else {
				document.getElementById("tablediv").innerHTML = "Sorry! No Web Worker support.";
			}
console.timeEnd('Execution Time');

		}

		function stopWorker() {
			$("#progress-bar").parent().hide();
			w.terminate();
			w = undefined;
			start_fitnesses = JSON.parse(start_fitnesses) ;
			finish_fitnesses = JSON.parse(finish_fitnesses) ;
			console.log(finish_fitnesses);
			console.log(start_fitnesses);

			var arrayx = [];
			for (let index = 0; index <  parseInt($("#population_size").val()) ; index++) {
				arrayx[index] = index+1;
			}

			var array_for_average = [];
			

			for (let index = 0; index < start_fitnesses.length ; index++) {
				$("#tablediv").append('<br><div style="text-align:left;" class="content_header" >'+try_fun+'_'+index+'. Execution: </div><br>');
				var start_fitnesses1=start_fitnesses[index]+"";
				start_fitnesses1=start_fitnesses1.split(',');
				var finish_fitnesses1=finish_fitnesses[index]+"";
				finish_fitnesses1=finish_fitnesses1.split(',');

				if(start_fitnesses.length>1){
					array_for_average[index] = finish_fitnesses1.slice(0); ;
				}

				var min_of_start = min(start_fitnesses1);
				var min_of_end = min(finish_fitnesses1);

				points(arrayx,start_fitnesses1,min_of_start+1,start_fitnesses1[min_of_start],'Fitnesses Befor Processing','Individual','Start'+index+try_fun);

				points(arrayx,finish_fitnesses1,min_of_end+1,finish_fitnesses1[min_of_end],'Fitnesses After Processing','Individual','End'+index+try_fun);
			}
			
			var average = [];
			if(start_fitnesses.length>1){
				for (let index = 0; index < parseInt($("#population_size").val())  ; index++) {
					average[index]=0;
					let index1 =0;
					for ( index1 ; index1 < array_for_average.length ; index1++) {
						average[index] += parseFloat(array_for_average[index1][index]);
					}
					average[index] = (average[index]/index)
				}
			}

			if(start_fitnesses.length>1){
				$("#tablediv").append('<br><div style="text-align:left;" class="content_header">Average Of '+try_fun+'. Execution: </div><br>');
				var min_of_ave = min(average);
				points(arrayx,average,min_of_ave+1,average[min_of_ave],'Average Fitnesses','Individual','mid'+try_fun);
			}

			


			$("#tablediv").append('<br><hr><br>');

			
		}

		

function min(array){
	var min = parseFloat(array[0]);
	var index_of_min = 0 ;
	for (let index = 1; index < array.length; index++) {
		if(parseFloat(array[index]) < min){
			min=parseFloat(array[index]);
			index_of_min = index;
		}
	}
	return index_of_min;
}


function points(x,y,x1,y1,titley,titlex,des){
	$("#tablediv").append('<div id="'+des+'_'+try_fun+'" style="width:105%;" ></div>');
	
	var trace = {
		x:x,
		y:y,
		name: '',
		mode: 'markers+lines',
		marker: {
			size: [20],
		},
		textfont: {  family:  'art' }, line: { size: 10 ,color:'#526272',} ,marker: { size: 7 ,color:'#d6a549',}
	};
  
	var trace1 = {
		x:[x1],
		y:[y1],
		mode: 'markers',
		name: '',
		marker: {
			size: [20],
		},
		textfont: {  family:  'art' },marker: { size: 15 ,color:'#526272'}
	};

  var data = [trace,trace1];

  draw(titley,titlex,des,data);
}


function draw(titley,titlex,des,data){ 

  var layout = {  
	title: {
    text:'',
    font: {
      family: 'art',
      size: 24
    },
    xref: 'paper',
    x: 20,
  	},
    
    xaxis: {
      title: titlex,
      titlefont: {
        family: 'art',
        size: 20,
        color: '#526272'
      },
      tickfont: {
        family: 'art',
        size: 14,
        color: '#526272'
      },
      exponentformat: 'e',
      showexponent: 'all',
      autorange:true,

    },
    yaxis: {
      title: titley,
      titlefont: {
        family: 'art',
        size: 20,
        color: '#526272'
      },
      showticklabels: true,
      tickangle: 'auto',
      tickfont: {
        family: 'art',
        size: 12,
        color: '#526272'
      },
      exponentformat: 'e',
      showexponent: 'all',
      autorange:true,
    },  
  
  };
  var config = {responsive: true}
  
  Plotly.newPlot(des+'_'+try_fun, data, layout,config);
  
}

var keys = [];
var values = [];
function inc(total, num) {
  return total + num;
}

$.ajax({
	url: 'controller.php?method=run',
	async: false,
	success: function(data) {
		var obj = JSON.parse(data);
		for(let x = 0 ; x < obj.length ; x++){
			keys.push(obj[x].x);
			values.push(parseInt(obj[x].y));
		}
		$("#number").text(values.reduce(inc));
		var data = [{
			type: 'choropleth',
			locationmode: 'country names',
			locations: keys,
			z: values,
			colorbar: {
				title: 'MAX',
				thickness: 5
			},
			colorscale: [
              'blue'
         	],
			autocolorscale: true
		}];

		var layout = {
			
			width: 1400,
			height: 800,
		};
		var config = {responsive: true}
		Plotly.newPlot("myDiv", data, layout,config, {showLink: false});
	}
});






/*
$.ajax({
	url: 'controller.php?method=insert_data',
	async: false,
	success: function(data) {
		var obj = JSON.parse(data);
		Object.keys(obj).forEach(function(key) {
			keys.push(key);
			values.push(obj[key]);
		});

		var data = [{
			type: 'choropleth',
			locationmode: 'country names',
			locations: keys,
			z: values,
			colorbar: {
				title: 'MAX',
				thickness: 0.2
			},
			autocolorscale: true
		}];

		var layout = {
			title: '100 people around the world saw IPA',font: {
				family: 'art',
				size: 20
			},
			width: 1500,
			height: 800,
		};
		
		Plotly.newPlot("myDiv", data, layout, {showLink: false});

	}
});
	*/   

	
	

	


	</script>

  </body>
</html>