     <div class ="title"> Inscription : </div>
      <table id="member">
      
      <?php 
      if(isset($erreurs)): 
      
      foreach($erreurs as $erreur):

      echo "<p>";
      echo($erreur);
      echo "</p>";


        endforeach;


       endif; ?>
       <form action='<?php echo Helper::url('account','inscription',1); ?>' method='POST'>
        <tr><td>Nom de compte :</td><td><input type="text"  name ="username"/></td></tr>
        <tr><td>Mot de passe :</td><td><input type="password"  name="password"/></td></tr>
        <tr><td>Repeter le Mot de passe :</td><td><input type="password" name="rpassword"/></td></tr>
        <tr><td>Pseudo :</td><td><input type="text" name="pseudo"/></td></tr>
        <tr><td>Email :</td><td><input type="text" name="email" /></td></tr>
        <tr><td>Question Secréte :</td><td><input type="text" name="question"  /></td></tr>
        <tr><td>Repense Secréte  :</td><td><input type="text" name="reponse" /></td></tr>
        <tr><td>Captcha  :</td><td> <tr><td> <img src="<?php echo Helper::url('account','captcha'); ?> "/></td></tr>
        <tr><td>Repeter le Captcha :</td><td><input type="text" name="captcha"  /></td></tr>
        <tr><td></td><td><input type="submit" name="submit" value="connexion"/></td></tr>
        </form>
    

        </table>

