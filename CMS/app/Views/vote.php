           <?php if(Session::get('id')):?>
        <div class ="title"> Votez & gagnez  : <small class="date">Point par vote : <?php echo\Core\Core::get()->config['nmbvote']?></small></div>
       <div class="title"> <p>Si vous étes VIP : <?php echo\Core\Core::get()->config['nmbvotevip']?> Points</p></div>
        <p><a href="<?php echo Helper::url('account','voteaction'); ?>">Cliquer ici pour voter</a></p>
    <?php else:?>

        <div class="cader_red">Vous devez être connecté pour Votez !</div>
<?php endif; ?>
