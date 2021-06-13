<? 
$url = $_POST['url'];
$result = file_get_contents($url);
$text =  strip_tags($result);
$text2 = preg_replace('/[A-Za-z0-9]/', '',$text ); 
$text3 = preg_replace('/[^\p{L}\p{N}\s]/u', '', $text2);

 

 
function findMatch($text) {
    $text = mb_strtolower($text, 'UTF-8');
    preg_match_all('~\d+|[^\d\s,?\.]+~u', $text, $numbers);
    $values = array_count_values($numbers[0]);
    $result = '<table><tr><th>Значения'.
        '</th><th>Повторы</th></tr>';
    foreach ($values as $val => $sum) {
        if ($sum > 1) {
            $result .= '<tr><td>'. $val .'</td><td>'. $sum .'</td></tr>';
            $bool = true;
        }
    }
    $result .= '</table>';
   
    return (isset($bool) ? $result : false);
}

echo findMatch($text3);
