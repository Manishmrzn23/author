<?php
function alert_message($type,$message){
  $variable=  '<p class="alert '.$type.'" role="alert">'.$message.'</p>';
    return $variable;
}
?>