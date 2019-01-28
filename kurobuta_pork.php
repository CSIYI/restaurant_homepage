<?php include('server.php') ?>

<?php
if( isset($_GET['command'])){
    RecentViews("Kurobuta Pork");
}

function RecentViews($id)
{   
    if(isset($_COOKIE['views']))
    {   
        
        $datastr = $_COOKIE['views'];
        $ids = explode('|',$datastr);
        if(count($ids )< 5){
            if(!in_array($id,$ids)){
                $datastr .= '|'.$id;
                setcookie("views",$datastr,time()+3600*7);
            }
        }
        else
        {
            if(!in_array($id,$ids))
            {
                $datastr = str_replace($ids[0].'|','',$datastr);
                $datastr .= '|'.$id;
                setcookie("views",$datastr,time()+3600*7);
            }
        }   
    }
    else
    {
        setcookie("views",$id,time()+3600*7);
        @$datastr = $_COOKIE['views'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Kurobuta Pork</title>
</head>
<body>

<h1>Kurobuta Pork</h1>
<img src="https://www.snakeriverfarms.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/s/r/srf-pork-collar-raw2.jpg" width="700" height="400" >
<p>Berkshire pigs, also known as Kurobuta, are a rare breed of pig originating from the English county of Berkshire that are bred and raised in several parts of the world, including England, Japan, the United States, Australia, and New Zealand.</p>

</body>
</html>

