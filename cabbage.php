<?php
if( isset($_GET['command'])){
    RecentViews("Cabbage");
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
<title>Napa Cabbage</title>
</head>
<body>

<h1>Napa Cabbage</h1>
<img src="https://static1.squarespace.com/static/56b2666cb09f951918d45a93/t/5b114abc2b6a28c2b52592e6/1527859907733/Napa+Cabbage+-Coleslaw-2013.jpg" width="700" height="400">
<p>Napa, nappa cabbage or Korean cabbage (Brassica rapa subsp. pekinensis or Brassica rapa Pekinensis Group) is a type of Chinese cabbage originating near the Beijing region of China, and is widely used in East Asian cuisine. Since the 20th century, it is also a widespread crop in Europe, the Americas and Australia. In much of the world, this is the vegetable referred to as "Chinese cabbage". In Australia it is referred to as "wombok".</p>

</body>
</html>