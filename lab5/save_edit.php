<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
            if((isset($_POST['id']))&&(isset($_POST['index']))){
                $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
                $index = htmlentities(mysqli_real_escape_string($link, $_POST['index']));
                switch($index){
                    case "os":
                        if((isset($_POST['name']))&&(isset($_POST['type']))&&(isset($_POST['bit']))&&(isset($_POST['dev']))&&(isset($_POST['num']))){
                            $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
                            $type = htmlentities(mysqli_real_escape_string($link, $_POST['type']));
                            $bit = htmlentities(mysqli_real_escape_string($link, $_POST['bit']));
                            $dev = htmlentities(mysqli_real_escape_string($link, $_POST['dev']));
                            $num = htmlentities(mysqli_real_escape_string($link, $_POST['num']));
                            if((strlen($name)==0)||(strlen($type)==0)||(strlen($bit)==0)||(strlen($dev)==0)||(strlen($num)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "UPDATE $database.$index SET name = '$name', type = '$type', bit = '$bit', dev = '$dev', num = '$num' WHERE $database.$index.id = '$id'";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                    case "dm":
                        if((isset($_POST['name']))&&(isset($_POST['url']))){
                            $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
                            $url = htmlentities(mysqli_real_escape_string($link, $_POST['url']));
                            if((strlen($name)==0)||(strlen($url)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "UPDATE $database.$index SET name = '$name', url = '$url' WHERE $database.$index.id = '$id'";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                    case "dk":
                        if((isset($_POST['os_select']))&&(isset($_POST['dm_select']))&&(isset($_POST['date_s']))&&(isset($_POST['date_e']))&&(isset($_POST['cost']))&&(isset($_POST['keyoc']))){
                            $os_select = htmlentities(mysqli_real_escape_string($link, $_POST['os_select']));
                            $dm_select = htmlentities(mysqli_real_escape_string($link, $_POST['dm_select']));
                            $date_s = htmlentities(mysqli_real_escape_string($link, $_POST['date_s']));
                            $date_e = htmlentities(mysqli_real_escape_string($link, $_POST['date_e']));
                            $cost = htmlentities(mysqli_real_escape_string($link, $_POST['cost']));
                            $keyoc = htmlentities(mysqli_real_escape_string($link, $_POST['keyoc']));
                            if(($os_select=="")||($dm_select=="")||(strlen($keyoc)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "UPDATE $database.$index SET date_s = '$date_s' , date_e = '$date_e', os = '$os_select', dm = '$dm_select', cost='$cost' keyoc = '$keyoc'  WHERE $database.$index.id = '$id'";
                            echo $query;
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                }
            }
		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>