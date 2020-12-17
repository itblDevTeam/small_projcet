<?PHP
//header('Content-Type: text/html; charset=utf-8'); 
$PCC=
"(DESCRIPTION =
(ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
(CONNECT_DATA =(SERVER = DEDICATED)(SERVICE_NAME = orcl)
)
)";
$conn = ocilogon( "PCC", "pcc",$PCC,"WE8ISO8859P15");

?>