<?php
if( isset($_GET['command'])){
    RecentViews("Premium Lamb Shoulder");
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
<title>Premium Lamb Shoulder</title>
</head>
<body>

<h1>Premium Lamb Shoulder</h1>
<img src = "http://s3.amazonaws.com/kitgui/clients/a009f65654d241638cbb908f41f03f9b/files/ProductPages/Lamb-Rack-Chop-Frenched-Double-Bone.jpg" width="700" height="400">
<p>This part of the animal works hard, so the meat from a lamb’s shoulder is full of flavour. It takes a while to become tender, but this means it’s a great choice for stewing and slow-roasting. To maximise the flavour, cook lamb shoulder on the bone so the meat simply falls apart when pulled with a fork.</p>

</body>
</html>
