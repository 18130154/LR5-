<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<?ob_end_clean();ob_clean();?>
<?require_once 'engine/library/tcpdf/tcpdf.php';?>
<?
    $array = array("N p/p", "Название", "Магазин", "Тип оборудования", "Разрядность", "Разработчик", "Кол-во польз.", "Ключ", "Дата приобретения", "Дата окончания", "url");
    ob_clean();
    error_reporting(E_ALL);
    ob_start();
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetAuthor('Баталова Лиана ПИ-319');
    $pdf->SetTitle('Операционные системы');
    $pdf->SetMargins(20, 30, 20);
    $pdf->SetFont('arial', '', 14, '', true);
    $pdf->AddPage();
    $pdf->SetXY(20, 50);
    $pdf->SetDrawColor(100, 100, 0);
    $pdf->SetTextColor(0, 0, 0);
    $html = '<h1>Операционные системы</h1><br>';
    $html .= "<table border='1' width='20%'>";
    $html .= "<tr>";
    for($i = 0; $i < count($array); $i++){
        $html .= "<th width='10%'>$array[$i]</th>";
    }
    $html .= "</tr>";
    $queryTab = "adv_dk_info";
    $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
    $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
    while ($row=mysqli_fetch_array($result)){
         $html .= "<tr align='center'>";
        for($i = 0; $i < count($row)/2; $i++){
            $text = $row[$i];
             $html .= "<td>$text</td>";
        }
		 $html .= "</tr>";
    }
    
    $html .= "";
    $html .= "";
    $html .= "</table>";
    
    
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    $pdf->Output('Auto.pdf', 'I');
?>
<?require_once 'engine/connection/connectionEnd.php';?>