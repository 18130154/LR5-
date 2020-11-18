<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
			if(isset($_GET['Index'])){
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['Index']));
                switch($index){
                    case "os":
                        echo("<fieldset><legend>Добавить новую ОС</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        echo("Введите название: <input name='name' type='text'/> <br>");
                        echo("Введите тип оборудования: <input name='type' type='text'/> <br>");
                        echo("Введите разрядность: <input name='bit' type='text'/> <br>");
                        echo("Введите разработчика: <input name='dev' type='text'/> <br>");
                        echo("Введите количество пользователей: <input name='num' type='number' min='1' max='99999999' value='1'/> <br>");
                        echo("<input type='hidden' name='index' value='".$index."'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "dm":
                        echo("<fieldset><legend>Добавить новый цифровой магазин</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        echo("Введите имя: <input name='name' type='text'/> <br>");
                        echo("Введите url: <input name='url' type='text'/> <br>");
                        echo("<input type='hidden' name='index' value='".$index."'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "dk":
                        $queryTab_0 = "os";
                        $queryTab_1 = "dm";
                        $query_0 = "SELECT * FROM $database.$queryTab_0 ORDER BY $database.$queryTab_0.id ASC";
                        $query_1 = "SELECT * FROM $database.$queryTab_1 ORDER BY $database.$queryTab_1.id ASC";
                        $result_0 = mysqli_query($link, $query_0) or die("Не могу выполнить запрос!");
                        $result_1 = mysqli_query($link, $query_1) or die("Не могу выполнить запрос!");
                        echo("<fieldset><legend>Добавить новый цифровой ключ</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        
                        echo("Введите дату приобретения: <input name='date_s' type='date'/> <br>");
                        echo("Введите дату окончания: <input name='date_e' type='date'/> <br>");
                        
                        $id_0 = "os_select";
                        echo("<label for='$id_0'>Список разрешенных характеристик: </label>");
                        echo("<select id='$id_0' name='$id_0'>");
                        echo("<option value=''>--Please choose an option--</option>");
                        while ($row=mysqli_fetch_array($result_0)){
                            echo("<option value='$row[0]'> $row[0]. $row[1]</option>");
                        }
                        echo("</select><br>");
                        $id_1 = "dm_select";
                        echo("<label for='$id_1'>Список соответствующих значений: </label>");
                        echo("<select id='$id_1' name='$id_1'>");
                        echo("<option value=''>--Please choose an option--</option>");
                        while ($row=mysqli_fetch_array($result_1)){
                            echo("<option value='$row[0]'> $row[0]. $row[1]</option>");
                        }
                        echo("</select><br>");
                        
                        echo("Введите стоимость: <input name='cost' type='number' min='1' max='999999' value='1'/> <br>");
                        echo("Введите ключ: <input name='keyoc' type='text'/> <br>");
                        
                        echo("<input type='hidden' name='index' value='".$index."'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                }
			    
			}
		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>