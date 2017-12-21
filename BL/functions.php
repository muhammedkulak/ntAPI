<?php
function base64_to_file($data, $output_file) {
	$ifp = fopen ( $output_file, "wb" );
	$result = fwrite ( $ifp, base64_decode ( $data ) );
	fclose ( $ifp );
	return $result;
}
function GetBetween($var1="",$var2="",$pool){
    $temp1 = @strpos($pool,$var1)+strlen($var1);
    $result = substr($pool,$temp1,strlen($pool));
    $dd=strpos($result,$var2);
    if($dd == 0){
        $dd = strlen($result);
    }

    return substr($result,0,$dd);
}
?>
