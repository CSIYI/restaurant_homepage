<?php
if( isset($_GET['command'])){
    RecentViews("Iced Tea");
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
<title>Iced Tea</title>
</head>
<body>

<h1>Iced Tea</h1>
<img src="https://www.errenskitchen.com/wp-content/uploads/2014/08/lemon-Iced-Tea.jpg" width="700" height="400">
<p>Ied tea is a form of cold tea. Though usually served in a glass with ice, it can refer to any tea that has been chilled or cooled. It may be sweetened with sugar, syrup and/or apple slices. Iced tea is also a popular packaged drink. It can be mixed with flavored syrup, with multiple common flavors including lemon, raspberry, lime, passion fruit, peach, orange, strawberry, and cherry. While most iced teas get their flavor from tea leaves (Camellia sinensis), herbal teas are sometimes served cold and referred to as iced tea. Iced tea is sometimes made by a particularly long steeping of tea leaves at lower temperature (one hour in the sun versus 5 minutes at 180–212 °F/80–100 °C). This is known as sun tea.</p>

</body>
</html>