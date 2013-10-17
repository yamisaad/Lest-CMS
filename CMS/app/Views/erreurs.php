     <div class ="title"> Erreur : </div>
  
      
      <?php 
      if(isset($erreur)): 
      
      foreach($erreur as $erreurs):

      echo "<p>";
      echo($erreurs);
      echo "</p>";


        endforeach;


       endif; ?>