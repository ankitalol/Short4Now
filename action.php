<html>
     <link rel="stylesheet" type="text/css" href="/main.css">
    <link rel="stylesheet" type="text/css" href="/grid.css">
    <link rel="stylesheet" type="text/css" href="/normalize.css">

    <body>
    <header>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <div class="first-box"> 
        <div class = "container-fluid">
        <h1>Short4Now</h1>
        </div>
        </div>
    </header>
<div class = "container-fluid">
<br>
The length of the url input is
        

        <?php
function encode_url()
{
$servername = "128.199.246.40";
$username = "root";
$password = "test123$";
$database = "Tinyurltable";
$conn = new mysqli($servername, $username, $password,$database);
$l= strlen($_GET["unme"]) ;
$uname = $_GET["unme"];
    $arrlength = $l;
 echo ($l) ;
     echo "<br>"; 
    $i=0;     
 $site ="http://Short4Now";
        /* $lastid = $conn->insert_id;
        echo $lastid;
        $lone = $lastid++;*/
while ($l>=1)
{
    $surl = array();
    $charset = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9');
  $rem = $l % 62 ; 
  $l = $l/62;     
  $surl[$i] = $charset[$rem]; //echo $surl[$i];
 $i++;
}     
    $f=0;    
    
    $surl_str = implode("a",$surl);
    $sql = "SELECT url,uni_code FROM URLTables";
    $result = $conn->query($sql);
      if($result ->num_rows > 0) 
         while ($row = $result->fetch_assoc())
         { 
             if($uname == $row["url"])
             {               ++$f;
                 $surl_str = $row["uni_code"];
                 break;
             }
         }
           if($f==0)
        {
            $sql = "SELECT uni_code FROM URLTables";
            $result = $conn->query($sql);
    
        if($result ->num_rows > 0) 
            while ($row = $result->fetch_assoc())
            {
                if($surl_str==$row["uni_code"])
                {
                    $surl[$i]=rand(0,1000000);
                    $surl_str = implode("a",$surl);
                    break;
                }  
            }  
        }
 // echo "uni_code:" . $row["uni_code"]."<br>";
  
//$sql = "INSERT INTO URLTables(url,ulength,uni_code) VALUES('$uname',$l,'$surl')";
mysqli_query($conn,"INSERT INTO URLTables(url,length,uni_code) 
VALUES('$uname',$arrlength,'$surl_str')");
    /*if ($conn->query($sql) === TRUE) {echo "New record created successfully";} else {echo "Error: " . $sql . "<br>" . $conn->error;}*/  
    echo "<br>";   
    echo "Here is your shortened URL ";
    echo "<br>";
    echo "<input type ='text' size = '50' value = '$site/$surl_str'>";
}
encode_url(); 
   
         $conn->close();
       
   
?>
  

        </div>
    </body>
</html>
