<html>
<head></head>


<body>
<?php

require('/controller/mainController.php');
///require('/model/dao/general_issues_reporting.php');


$dao= new general_issues_reporting();
$controller= new mainController ($dao);  


echo"<table>";
echo "<tr><td>Issues resolved</td> $controller->issues_new <td></td> </tr>";
echo"</table>";
?>



</body>
</html>