<?php
	$n = $_POST['size'];		

	$ms = create_magic_square($n);
        echo '<table>';
	for($i = 0; $i < $n; $i++) {
                echo '<tr>';
		for($j = 0; $j < $n; $j++)
			echo '<td align="center"> '.$ms[$i][$j].' </td>';
		echo "</tr>";
	}
        echo '</table>';

	
	function create_magic_square($N) {
		$sol = array();
		$ss = (($N-1)/2);
		$nn = 1;
		for($i=0; $i<$N; $i++)
			for($j=0; $j<$N; $j++) {
				$x = (-$ss+$i+$j+$N) % $N;
				$y = ($ss+$i-$j+$N) % $N;
				$sol[$x][$y] = $nn++;
			}

 	       return $sol;
	} 

    
?>