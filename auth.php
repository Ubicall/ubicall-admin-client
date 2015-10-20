<?php

function auth($username,$password)
{
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL,"https://designer.ubicall.com/auth/token");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,
	      "client_id=node-red-editor&grant_type=password&scope=*&username=".$username."&password=".$password);
//"client_id=node-red-editor&grant_type=password&scope=*&username=test&password=123456");

  // receive server response ...
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $server_output = curl_exec ($ch);

  curl_close ($ch);
  $server_output_arr=json_decode($server_output, true);
  $storage=str_replace('\\','',$server_output);
  $_SESSION['storage']=$storage;
  echo "<script>

    localStorage.setItem('auth-tokens', '".$storage."');
	</script>";
  return $server_output_arr;

}

function logout_auth($acess)
{ 
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL,"https://designer.ubicall.com/auth/revoke");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,
	      "token=".$acess);
//"client_id=node-red-editor&grant_type=password&scope=*&username=test&password=123456");

  // receive server response ...
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $server_output = curl_exec ($ch);

  curl_close ($ch);
  $server_output=json_decode($server_output, true);
  echo "<script>

    localStorage.removeItem('auth-tokens');
	</script>";
  return $server_output;

}

?>
