<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<?require_once 'engine/class/table.php';?>
<html>
    <body>
		<?
            echo("<div>");
            $queryTab = "os";
            $headText = "Таблица операционные системы";
            $arrayTitle = array("№","Название", "Тип оборудования", "Разрядность", "Разработчик", "Кол-во пользователей", "Изменить", "Добавить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Запрос не может быть выполнен!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("</div>");
            
            $queryTab = "dm";
            $headText = "Таблица цифровые магазины";
            $arrayTitle = array("№","Название", "URL", "Изменить", "Добавить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Запрос не может быть выполнен!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("</div>");
            
            $queryTab = "dk_info";
            $headText = "Таблица цифровые ключи";
            $arrayTitle = array("№","Дата приобретения", "Дата окончания", "ОС", "Цифровой магазин", "Стоимость", "Ключ", "Изменить", "Добавить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("</div>");
            
            echo("</div>");
            
            echo("<div>");
            echo("<div> <a href='new.php?Index="."os"."'> Добавить  ОС</a>  </div>");
            echo("<div> <a href='new.php?Index="."dm"."'> Добавить  цифровой магазин</a>  </div>");
            echo("<div> <a href='new.php?Index="."dk"."'> Добавить цифровой ключ</a>  </div>");
            echo("</div>");
            
            echo("<div>");
            echo("<div> <a href='gen_pdf.php'> Показать pdf </a>  </div>");
            echo("<div> <a href='gen_xls.php'> Показать xls </a>  </div>");
            echo("</div>");
		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>