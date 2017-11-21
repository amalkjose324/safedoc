<?php
$filename = $_POST[];
$contenttype = "application/force-download";
header("Content-Type: " . $contenttype);
header("Content-Disposition: attachment; filename=\"" . basename("abc.pdf") . "\";");
readfile("docs/pdf/".$filename);
exit();
?>
