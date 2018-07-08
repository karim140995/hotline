<!DOCTYPE HTML>  
<html>
<head>
     

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BFI issues dashboard</title>

   <!-- Bootstrap Core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet"> 

    <!-- Custom Fonts -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style>
    #chartContainer,#chartContainer1,#chartContainer2 {
				height: 280px;
				margin-top: 1rem;
				width: 100%;
			}
	#chartContainer3,#chartContainer4 {
				height: 400px;
				margin-top: 1rem;
				width: 100%;
			}
	.align-center {
				text-align: center;
			}
				
	</style>
	<script src="../../js/canvasjs.min.js"></script>
	<script type="text/javascript">

	<?php 

	    require('../../controller/DB.php');
	    require('../../model/dao/charts.php');


         
	    $dao=new charts();


        //Pie chart for issues
	    $issues_trackers= $dao->getIssuesTrackers();
	    
  		//Pie chart for Top devs
 		$topusers=$dao->getTopUsers();

	    $bugs;
	    $support;
	    $feature;


		while ($row = mysql_fetch_array($issues_trackers,MYSQLI_NUM))
		 {
	       switch($row[0])
	       {
	         case "Bug" :     $bugs=$row[1]; break;
	         case "Feature" : $feature=$row[1]; break ; 
	         case "Support" : $support=$row[1]; break ;
	       }

		 }
		$total=$bugs+$support+$feature; 
		$percentbugs=round(($bugs*100)/$total);
		$percentfeature= round(($feature*100)/$total);
		$percentsupport= round(($support*100)/$total);


		//Issues chart
		$year=date("Y");
		$nonResolvedIssues = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0);
		$ResolvedIssues = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0);

		for ($x = 1; $x <= 12; $x++) {
			$result1= $dao->getNonResolvedIssuesPerMonth($year,$x);
			$result2= $dao->getResolvedIssuesPerMonth($year,$x);
            while($nonResolvedIssues[$x] = mysql_fetch_array($result1,MYSQLI_NUM))
            {

            }
            while($ResolvedIssues[$x] = mysql_fetch_array($result2,MYSQLI_NUM))
            {

            }        
		}
		echo $nonResolvedIssues[1];

	 ?>

	window.onload = function () {
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			backgroundColor: "transparent",
			title:{
						fontSize: 70,
						horizontalAlign: "center",
						text: "<?php echo "$percentbugs%"; ?>",
						verticalAlign: "center"
            
			},
			data: [              
			{
				// Change type to "doughnut", "line", "splineArea", etc.
				type: "doughnut",
				dataPoints: [
				    { y: <?php echo $bugs; ?> },
					{ y: <?php echo $feature+$support ?> }
				]
			}
			]
		});
		var chart1 = new CanvasJS.Chart("chartContainer1", {
			animationEnabled: true,
			backgroundColor: "transparent",
			title:{
						fontSize: 70,
						horizontalAlign: "center",
						text: "<?php echo "$percentfeature%"; ?>",
						verticalAlign: "center"
                          
			},
			data: [              
			{
				// Change type to "doughnut", "line", "splineArea", etc.
				type: "doughnut",
				dataPoints: [
					{ y: <?php echo $feature;   ?>  },
					{ y: <?php echo $bugs+$support; ?>  }
				]
			}
			]
		});
		var chart2 = new CanvasJS.Chart("chartContainer2", {
			animationEnabled: true,
			backgroundColor: "transparent",
			title:{
						fontSize: 70,
						horizontalAlign: "center",
						text: "<?php echo "$percentsupport%"; ?>",
						verticalAlign: "center"
                          
			},
			data: [              
			{
				// Change type to "doughnut", "line", "splineArea", etc.
				type: "doughnut",
				dataPoints: [
					{ y: <?php echo $support;   ?>  },
					{ y: <?php echo $bugs+$feature; ?>  }
				]
			}
			]
		});

		var chart3 = new CanvasJS.Chart("chartContainer3", {
			animationEnabled: true,
			backgroundColor: "transparent",
			title:{
				text: "Top 10 Developpers"              
			},
			data: [              
			{
				// Change type to "doughnut", "line", "splineArea", etc.
				type: "column",
				dataPoints: [
				<?php 
				while ($row1 = mysql_fetch_array($topusers,MYSQLI_NUM))
		 		{
					echo "{ label:'$row1[0]'+' '+'$row1[1]' ,  y:$row1[2]  },";
				} 
				?>	
					
				]
			}
			]
		});
	    var chart4 = new CanvasJS.Chart("chartContainer4", { 
	      animationEnabled: true,
	      backgroundColor: "transparent",         
	      title:{
	        text: "Issues Statistics For This Year"              
	      },

	      data: [  //array of dataSeries     
	      { //dataSeries - first quarter
	 /*** Change type "column" to "bar", "area", "line" or "pie"***/        
	       type: "column",
	       name: "Non resolved Issues",
	       showInLegend: true,
	       dataPoints: [
	       { label: "January", y: <?php echo $nonResolvedIssues[1]; ?> },
	       { label: "February", y: <?php echo $nonResolvedIssues[2]; ?> },
	       { label: "March", y: <?php echo $nonResolvedIssues[3]; ?> },                                    
	       { label: "April", y: <?php echo $nonResolvedIssues[4]; ?> },
	       { label: "May", y: <?php echo $nonResolvedIssues[5]; ?> },
	       { label: "June", y: <?php echo $nonResolvedIssues[6]; ?> },
	       { label: "July", y: <?php echo $nonResolvedIssues[7]; ?> },
	       { label: "August", y: <?php echo $nonResolvedIssues[8]; ?> },
	       { label: "September", y: <?php echo $nonResolvedIssues[9]; ?> },
	       { label: "October", y: <?php echo $nonResolvedIssues[10]; ?> },
	       { label: "November", y: <?php echo $nonResolvedIssues[11]; ?> },
	       { label: "December", y: <?php echo $nonResolvedIssues[12]; ?> },
	       ]
	     },

	     { //dataSeries - second quarter

	      type: "column",
	      name: "Resolved issues", 
	      showInLegend: true,               
	      dataPoints: [
	       { label: "January", y: <?php echo $ResolvedIssues[1]; ?> },
	       { label: "February", y: <?php echo $ResolvedIssues[2]; ?> },
	       { label: "March", y: <?php echo $ResolvedIssues[3]; ?> },                                    
	       { label: "April", y: <?php echo $ResolvedIssues[4]; ?> },
	       { label: "May", y: <?php echo $ResolvedIssues[5]; ?> },
	       { label: "June", y: <?php echo $ResolvedIssues[6]; ?> },
	       { label: "July", y: <?php echo $ResolvedIssues[7]; ?> },
	       { label: "August", y: <?php echo $ResolvedIssues[8]; ?> },
	       { label: "September", y: <?php echo $ResolvedIssues[9]; ?> },
	       { label: "October", y: <?php echo $ResolvedIssues[10]; ?> },
	       { label: "November", y: <?php echo $ResolvedIssues[11]; ?> },
	       { label: "December", y: <?php echo $ResolvedIssues[12]; ?> },
	      ]
	    }
	    ],
	  });
		chart.render();
		chart1.render();
		chart2.render();
		chart3.render();
		chart4.render();
	}
</script>
</head>
<body>
<div class="container">
<div class="row">
	<div class="col-md-4">
		<div class="inview" id="chartContainer"></div>
		<h3 class="align-center">Bugs</h3>
	</div>
	<div class="col-md-4">
		<div class="inview" id="chartContainer1"></div>
		<h3 class="align-center">Feature</h3>
	</div>
	<div class="col-md-4">
		<div class="inview" id="chartContainer2"></div>
		<h3 class="align-center">Support</h3>
	</div>
</div>	

<div class="row">
		<div id="chartContainer3"></div>
</div>
<div class="row">
		<div id="chartContainer4"></div>
</div>
</div>	


</body>
</html>