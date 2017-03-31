<?php
 error_reporting (E_ALL);

//$command = escapeshellcmd('testpythonfile.py');
//$output = shell_exec($command);
//echo $output;

//$mystring = system('python testpythonfile.py', $retval);
//
////echo $mystring;
//echo $retval;

$pyscript = 'testpythonfile.py';
$python = 'C:\Users\Hitesh\AppData\Local\Programs\Python\Python36\python.exe';

$cmd='$pyscript $python';

exec($cmd, $output);


?>