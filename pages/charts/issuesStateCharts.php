<!DOCTYPE HTML>
<html>
<head>
  
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
  <div id="chartContainer" style="height: 300px; width: 100%;">
  </div>
    <label class="radio-inline"><input type="radio" name="optradio" checked="checked" id="radiocolumn" onchange="chartrender();">Column</label>
    <label class="radio-inline"><input type="radio" name="optradio" id="radioline" onchange="chartrender();">Line</label>  
</body>



<script type="text/javascript">

  function charttype()
  {
     if(document.getElementById('radiocolumn').checked)
     {
      return "column";
     }
     else 
     {
      return "line";
     }
  }
  
  function chartrender () {
    var chart = new CanvasJS.Chart("chartContainer", {            
      title:{
        text: "Issue States for this year"              
      },

      data: [  //array of dataSeries     
      { //dataSeries - first quarter
   /*** Change type "column" to "bar", "area", "line" or "pie"***/        
       type: charttype(),
       name: "First Quarter",
       dataPoints: [
       { label: "January", y: 182 },
       { label: "February", y: 292 },
       { label: "March", y: 100 },                                    
       { label: "April", y: 342 },
       { label: "May", y: 242 }
       ]
     },
     { //dataSeries - second quarter

      type: charttype(),
      name: "Second Quarter",                
      dataPoints: [
       { label: "January", y: 200 },
       { label: "February", y: 290 },
       { label: "March", y: 40 },                                    
       { label: "April", y: 300 },
       { label: "May", y: 90 }
      ]
    }
    ]
  });
  chart.render();
  }
  chartrender();
</script>



</html>