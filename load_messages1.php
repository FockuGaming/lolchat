	<?php 
	$bdd = new PDO('mysql:host=Mysqlserver;dbname=DatabaseName', 'Username', 'Password');
 $allmsg = $bdd->query('SELECT id, champname, message, image FROM msg1 ORDER BY id DESC LIMIT 0 , 10');
    while ($msg = $allmsg->fetch()) {
	$avatar = $msg['champname'].".png";
  if (isset($_POST['del'])) {
  $delete = "DELETE FROM `b7_17278646_chat`.`msg1` WHERE `msg1`.`id` = ".$msg['id']."";
  $bdd->exec($delete);
    
}
      $chars = array(":)", ":D", "--'","O_O");
    $icons = array('<img src="Smileys/smile.png" />', '<img src="Smileys/happy.png"/>', '<img src="Smileys/embarased.png"/>','<img src="Smileys/impressed.png"/>');
    $msg['message'] = str_replace($chars, $icons, $msg['message']);   
    ?>
    
              <div class="msg">
      <font color="blue"><b><?= $msg['champname'] ?></b><br/></font>
<div class="avatar"><img src="http://ddragon.leagueoflegends.com/cdn/7.4.1/img/champion/<?php echo $avatar; ?>" draggable="false" height="60" width="60"/></div>
         <font color="black"><p><b><?= $msg['message'] ?></b></p></font>
			<div><img src="<?= $msg['image'] ?>"></img></div><br/>
        
      </div>
    <br/>
    <?php 
    }
    ?>
