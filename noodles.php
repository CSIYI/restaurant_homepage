<?php
if( isset($_GET['command'])){
    RecentViews("Noodels");
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
<title>Fresh Handmade Noodles</title>
</head>
<body>

<h1>Fresh Handmade Noodles</h1>
<img src="https://st2.depositphotos.com/1804893/9747/i/950/depositphotos_97471070-stock-photo-handmade-noodles-and-ingredients.jpg" width="700" height="400">
<p>Noodles are a staple food in many cultures. They are made from unleavened dough which is stretched, extruded, or rolled flat and cut into one of a variety of shapes. While long, thin strips may be the most common, many varieties of noodles are cut into waves, helices, tubes, strings, or shells, or folded over, or cut into other shapes. Noodles are usually cooked in boiling water, sometimes with cooking oil or salt added. They are often pan-fried or deep-fried. Noodles are often served with an accompanying sauce or in a soup. Noodles can be refrigerated for short-term storage or dried and stored for future use. The material composition or geocultural origin must be specified when discussing noodles.</p>

</body>
</html>