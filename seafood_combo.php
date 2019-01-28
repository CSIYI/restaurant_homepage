<?php
if( isset($_GET['command'])){
    RecentViews("Seafood Combo");
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
<title>Seafood Combo</title>
</head>
<body>

<h1>Seafood Combo</h1>
<img src="http://sleepeatmove.com/wp-content/uploads/2013/02/Uncooked-Seafood-6.jpg" width="700" height="400">
<p>Fresh seasonal seafood combo composed of shrimp, big scallops, and fish.</p>

</body>
</html>