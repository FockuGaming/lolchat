<?php

$bdd = new PDO('mysql:host=MySqlserver;dbname=DatabaseName', 'Username', 'Password');
$limit = 6;

$image = $nomDestination;
if(isset($_POST['envoi_message'])) {



    if(isset($_POST['champname'],$_POST['message']) AND !empty($_POST['champname']) AND !empty($_POST['message'])) { 
  $champname = htmlspecialchars($_POST['champname']);
  $message = htmlspecialchars($_POST['message']);
	 

         $ins = $bdd->prepare('INSERT INTO msg(champname, message) VALUES (?,?)'); 
         $ins->execute(array($champname, $message));
     
}
$nomOrigine = $_FILES['monfichier']['name'];
$elementsChemin = pathinfo($nomOrigine);
$extensionFichier = $elementsChemin['extension'];
$extensionsAutorisees = array("jpeg", "png", "jpg", "gif");
if ((in_array($extensionFichier, $extensionsAutorisees))) {
        
    // Copie dans le repertoire du script avec un nom
    // incluant l'heure a la seconde pres 
    $repertoireDestination = dirname(__FILE__)."/";
    $nomDestination = $champname.".".$extensionFichier;

    if (move_uploaded_file($_FILES["monfichier"]["tmp_name"],$repertoireDestination.$nomDestination)) {
        $insertimg = $bdd->prepare("UPDATE msg SET image = ? WHERE message = ?");
      $insertimg->execute(array($nomDestination, $message));;
      
  
      } 
}
}



?>
<html>
<head>
  <title>Chat</title>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css" media="all" />  
<style>
body {
  font-family: "Open sans", "Segoe UI", "Segoe WP", Helvetica, Arial, sans-serif;
  color: #7F8C9A;
  background: #FCFDFD;
}
.avatar {
	 width: 60px;
    height: 60px;
    border-radius: 100%;
    background-color: rgba(255,255,255,0.9);


	}
.msg {
	 border-width:1px 2px 3px 2px;
 border-style:solid dotted;
 border-color:black black;
 padding:0 10px;
	
	}
.textzone {
    position: fixed;
    bottom: 0px;
    left: 0px;
    right: 0px;
    width: 100%;
    height: 120px;
    z-index: 99;
    background: #fafafa;
    border: none;
    outline: none;
    padding-left: 55px;
    padding-right: 55px;
    color: #666;
    font-weight: 400;
	 border-width:1px 2px 3px 2px;
 border-style:solid dotted;
 border-color:black black;
 padding:0 10px;
}
textarea {
	  bottom: 10px;
    left: 20px;
	 right: 20px;
    z-index: 99;
    background: #fafafa;
	 resize: none;
  margin-top: 10px;
  margin-left: 2px;
  width: 250px;
  height: 50px;
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.07);
  border-color: -moz-use-text-color #FFFFFF #FFFFFF -moz-use-text-color;
  border-image: none;
  border-radius: 6px 6px 6px 6px;
  border-style: none solid solid none;
  border-width: medium 1px 1px medium;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12) inset;
  color: #555555;
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 1em;
  line-height: 1.4em;
  padding: 5px 8px;
  transition: background-color 0.2s ease 0s;
}


textarea:focus {
    background: none repeat scroll 0 0 #FFFFFF;
    outline-width: 0;
}
.more { 
		 width: 70px;
    
	 height: 20%;
} 
.select-style {
    padding: 0;
    margin: 0;
    border: 1px solid #ccc;
    width: 150px;
    border-radius: 3px;
    overflow: hidden;
    background-color: #fff;

    background: #fff url("http://www.scottgood.com/jsg/blog.nsf/images/arrowdown.gif") no-repeat 90% 50%;
}

.select-style select {
    padding: 5px 8px;
    width: 130%;
    border: none;
    box-shadow: none;
    background-color: transparent;
    background-image: none;
    -webkit-appearance: none;
       -moz-appearance: none;
            appearance: none;
}

.select-style select:focus {
    outline: none;
}
.submit {

background: #e6e6e6;

color: #00000;

border: 1px solid #eee;

border-radius: 20px;

box-shadow: 5px 5px 5px #eee;

}

.submit:hover {

background: #595959;

color: #fff;

border: 1px solid #eee;

border-radius: 20px;

box-shadow: 5px 5px 5px #eee;

}

.file {
  position: fixed;
}
.file label {
  background: #595959;
  padding: 5px 20px;
  color: #fff;
  font-weight: bold;
  font-size: .9em;
  transition: all .4s;
}
.file input {
  position: absolute;
  display: inline-block;
  left: 0;
  top: 0;
  opacity: 0.01;
  cursor: pointer;
}
.file input:hover + label,
.file input:focus + label {
  background: #a6a6a6;
  color: #999999;
}

.del {
  position: fixed;
}

/* Useless styles, just for demo styles */




</style>

</head>
<body>
<div align="left">
  <form class="del"  method="POST">
              <input type="submit" value="delete" class="submit" name="del"/></form></div>
        <div id="messages">
    <?php
    $allmsg = $bdd->query('SELECT id, champname, message, image FROM msg ORDER BY id DESC LIMIT 0, 10');
    while ($msg = $allmsg->fetch()) {
	$avatar = $msg['champname'].".png";
  if (isset($_POST['del'])) {
  $delete = "DELETE FROM `b7_17278646_chat`.`msg` WHERE `msg`.`id` = ".$msg['id']."";
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
			<div><img src="<?=$msg['image'] ?>"></img></div><br/>

      </div>
    <br/>
    <?php
    }
    ?>
    </div><br>
 <br><br><br><br>

       <div id="down"></div>

    <div  class="textzone">
  <form method="POST" enctype="multipart/form-data" >
  <div class="select-style">
      <select name="champname">
		<option>--Select Champion--</option>
      <?php
$champnames = $bdd->query('SELECT champion FROM lolfb ORDER BY champion');
while($d = $champnames->fetch()) {?>
         <option><?= $d['champion'] ?></option>
         <?php } ?>
      </select>
  </div>
  <textarea placeholder="Your Message yo" name="message" rows="20" cols="40" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
<div class="file">
      <label for="monfichier">Image</label>
      <input type="file" name="monfichier" /> </div>
 <input type="submit" value="submit" class="submit" name="envoi_message"/>
  </form>
</div>
<script>
setInterval('load_messages()', 5000);
function load_messages() {
  $('#messages').load('load_messages.php');
}
</script>


</body>
</html>

