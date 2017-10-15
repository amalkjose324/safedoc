<?php
if (isset($_FILES['files']) && !empty($_FILES['files'])) {
  $no_files = count($_FILES["files"]['name']);
  $success_count=0;
  for ($i = 0; $i < $no_files; $i++) {
    $extn=pathinfo($_FILES["files"]["name"][$i], PATHINFO_EXTENSION);
    if(strtolower($extn)=='pdf'){
      if ($_FILES["files"]["error"][$i] > 0) {
        echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
      }
      else {
        $fp = fopen($_FILES["files"]["tmp_name"][$i], 'r');
        fseek($fp, 0);
        $data = fread($fp, 5);
        if(strcmp($data,"%PDF-")==0)
        {
          $temp_name=basename($_FILES["files"]["tmp_name"][$i]);
          $temp_name=str_replace('php','',$temp_name);
          $time=str_replace('.','',microtime(TRUE));
          move_uploaded_file($_FILES["files"]["tmp_name"][$i], 'docs/pdf/' .$temp_name.''. $time.'.'.$extn);
          $success_count++;
        }
        fclose($fp);
      }
    }
  }
  echo $success_count;
}

/*
* End of script
*/
?>
