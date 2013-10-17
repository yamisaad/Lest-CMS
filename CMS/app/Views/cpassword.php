     <div class ="title">Mot de passe oubliée :</div>
     <div class ="title"><p>Pour recevoir votre nouveau mot de passe entrer les bon identifiants</p></div>

  <?php 
      if(isset($erreurs)): 
      
      foreach($erreurs as $erreur):

      echo "<p>";
      echo($erreur);
      echo "</p>";

        endforeach;
       endif;  
       ?>
       <table>
       <form action='<?php echo Helper::url('account','cpassword',1); ?>' method='POST'>
        <tr><td>Question Secréte :</td><td><input type="text" name="question"  /></td></tr>
        <tr><td>Repense Secréte  :</td><td><input type="text" name="reponse" /></td></tr>
        <tr><td>Captcha  :</td><td> <tr><td> <img src="<?php echo Helper::url('account','captcha'); ?> "/></td></tr>
        <tr><td>Repeter le Captcha :</td><td><input type="text" name="captcha"  /></td></tr>
        <tr><td></td><td><input type="submit" name="submit" value="connexion"/></td></tr>
        </form>
    

        </table>

