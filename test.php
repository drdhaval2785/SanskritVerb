<?php
	$outfile = fopen("D:\\!sorting\\verboutput\\log1.txt", "w+");
	ob_start(function($x) use($outfile) {
		fwrite($outfile, $x);
		echo $x;
		return '';
	});
//	ob_start();
	echo "yes  it is writing 1\n";
	echo "yes  it is writing 2\n";
	ob_end_flush();
?>
