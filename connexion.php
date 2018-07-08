<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Hotline</title>

	<!-- CSS -->
   <link rel="stylesheet" href="css/base.css">
   <link rel="stylesheet" href="css/layout.css">
   <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</head>

<body>

   <!-- Header -->
   <header id="top" class="static" >
      <?php require('nav.php'); ?> 
   </header> <!-- Header End -->


   <!-- Container -->
   <section class="container">
 <center>
      <div class="row">
         <div class="col full">

         <h1> Hotline </h1>
	      <!-- form -->
               <form name="contactForm" id="contactForm" method="post">
					<fieldset>
                  <div>
						   <label for="cEmail">Email <span class="required">*</span></label>
						   <input name="cEmail" type="email" id="cEmail" size="35" value="" />
                  </div>

                  <div>
						   <label for="cPassword">Mot de passe<span class="required">*</span></label>
						   <input name="cPassword" type="password" id="cPassword" size="35" value="" />
                  </div>

                 
                  <button type="submit" name="cCnx">Connexion</button>
                  <button type="reset" >Annuler</button>
					</fieldset>
				   </form> <!-- Form End -->
     
             <?php
             require('/controller/connexionController.php');
             ?>
		   </p>
					
	  
	 </div>
</center>
   </section> <!-- Container End -->

   <!-- footer -->
   <footer>
 <?php require('footer.php'); ?> 
   </footer> <!-- Footer End-->


</body>

</html>