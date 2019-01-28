<?php
if( isset($_GET['command'])){
    RecentViews("Soda");
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
<title>Soda</title>
</head>
<body>

<h1>Soda</h1>
<img src="https://www.phillymag.com/wp-content/uploads/sites/3/2016/06/soda-tax-philadelphia-940x540.jpg" width="700" height="400">
<p>A glass of cola served with ice cubes
A soft drink (see Terminology for other names) is a drink that typically contains carbonated water (although some lemonades are not carbonated), a sweetener, and a natural or artificial flavoring. The sweetener may be a sugar, high-fructose corn syrup, fruit juice, a sugar substitute (in the case of diet drinks), or some combination of these. Soft drinks may also contain caffeine, colorings, preservatives, and/or other ingredients.</p>

</body>
</html>