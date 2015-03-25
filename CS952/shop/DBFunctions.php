<?php

function DBConnect(){
$connection = MakeConn('cyb14138', 'istratin');
return $connection;
}


function MakeConn($username, $password){
$conn = oci_connect($username, $password, '(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=devweb2014.cis.strath.ac.uk)(PORT=1521)) (CONNECT_DATA=(SERVER=DEDICATED) (SERVICE_NAME = XE)))');
  if (!$conn) {
    $e = oci_error();
    print htmlentities($e['message']);
    exit;
  }
return $conn;
}

function DBExecute($connection, $inquery){

$stid = oci_parse($connection, $inquery);
  if (!$stid) {
    $e = oci_error($connection);
    print htmlentities("Parse error: ");
    print htmlentities($inquery);
    print htmlentities($e['message']);
    exit;
  }

  $r = oci_execute($stid, OCI_DEFAULT);
  if (!$r) {
    $e = oci_error($stid);
    print htmlentities("Execute error: ");
    print htmlentities($inquery);
    echo htmlentities($e['message']);
    exit;
  }

return $stid;
}
?>
