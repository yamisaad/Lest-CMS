          <?php if(Session::get('id')):?>
      <div class="title">Changement de mot de passe</div>
      <table id="member">
       <form action='<?php echo Helper::url('account','cspassword'); ?>' method='POST'>
        <tr><td>Ancien mot de passe :</td><td><input type="password"  name="password"/></td></tr>
        <tr><td>Nouveau Mot de passe :</td><td><input type="password"  name ="npassword"/></td></tr>
         <tr><td>Question Secréte  :</td><td><input type="text" name="question" /></td></tr>
        <tr><td>Repense Secréte  :</td><td><input type="text" name="reponse" /></td></tr>
        <tr><td>Captcha  :</td><td> <tr><td> <img src="<?php echo Helper::url('account','captcha'); ?> "/></td></tr>
        <tr><td>Repeter le Captcha :</td><td><input type="text" name="captcha" /></td></tr>
        <tr><td></td><td><input type="submit" name="submit" value="connexion"/></td></tr>
        </form>
    

        </table>
        <?php else:?>

        <div class="cader_red">Vous devez être connecté pour Votez !</div>
<?php endif; ?>


