<?php


function decode_url()
{   
$servername = "128.199.246.40";
$username = "root";
$password = "test123$";
$database = "Tinyurltable";
$conn = new mysqli($servername, $username, $password,$database);
$i=0;
    $aurl = array();
    $surl_st = $_GET['uni_code'];
      $sql = "SELECT url,uni_code FROM URLTables";
    $result = $conn->query($sql);
      if($result ->num_rows > 0) 
         while ($row = $result->fetch_assoc())
         { 
              $t = $row["uni_code"];
             if($surl_st == $t)
             {    
                 
                 $url = $row["url"];
                 $l1 = strlen($url);
                 
                 while($i<3)
                 {
                     $aurl[$i] = $url[$i];
                      $i++;
                 }
                 //echo "<br>";
                 $durl = implode("",$aurl);
                 if($durl == "www")
                 {
                    $burl = "http://" .$url;
             header("HTTP/1.1 301 Moved Permanently");
               header( "Location: $burl");
                 }
               else{
                   header("HTTP/1.1 301 Moved Permanently");
               header( "Location: $url");
                   
              }  
               
                 //return Redirect::to($url);
                 //echo "<script type='text/javascript'>window.location = '$url'</script>";
                 //exit();
                 //RewriteCond %{REQUEST_URI} /index.php
             }
         }
    else
    {
        echo "No shortened URL found";
    }
    echo "<br>";
}

decode_url();

$conn->close();
?>