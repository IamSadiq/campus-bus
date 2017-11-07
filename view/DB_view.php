<?php
require '../controller/DB_controller.php';  
require_once 'header.php'; 
require 'news_menu.php';

// tell us that we r currently in the first page
$page = 0;
?>

<table id="news_table"><tr><td>

<!-- ¬¬¬¬¬¬¬¬¬¬¬¬¬¬TOP DIV¬¬¬¬¬¬¬¬¬¬¬¬¬ -->
<div class="news_container top">
<?php

//function Call to display top news
top_news();

?>

<h3 class = 'back_next_div' action = '<?php if($page > 0){ $page-=1;}elseif($page == 0){$page = $page;}?>'> Back </h3>
<h3 class = 'back_next_div' action = '<?php $page+=1;?>'> Next </h3>
<hr>

<!-- ¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬EDU DIV¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬ -->
<div class="news_container edu">
<?php 

//function call to display educational news
display_news("edu");

?>
</div>

<!-- ¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬ENTER DIV¬¬¬¬¬¬¬¬¬¬¬¬¬¬ -->
<div class="news_container enter">
<?php 

//function call to display entertainment news
display_news("enter");

?>
</div></td>
</tr></table>

<?php 


//updates the current page
$db_object->set_page($page);
include_once 'footer.php';

// FREE RESULT
//mysql_close($db_connection);
?>