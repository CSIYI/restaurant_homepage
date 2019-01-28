<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<title>Hot Pot Party</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, html {
height: 100%;
    font-family: "Inconsolata", sans-serif;
}
.bgimg {
    background-position: center;
    background-size: cover;
    background-image: url("https://img.grouponcdn.com/deal/2DKgXyrmbeJZ9wtykEEZnVQfgXaq/2D-1500x900/v1/c700x420.jpg");
    min-height: 75%;
}
.menu {
display: none;
}

.rate {
    float: right;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
#submit_text {
    margin-top: 3px;  
    float: right;
}

#review_div {
  border-radius: 25px;
  border: 2px solid #73AD21;
  padding: 20px; 
  width: 700px;
  height: 300px;
}

#submit_text {

    color: white;
    background-color: black;

}
.textarea {
   resize: none;
}
#last5 {
  border-radius: 25px;
  border: 2px solid #FFD700;
  padding: 20px; 
  
}
#most5 {
  border-radius: 25px;
  border: 2px solid #33E3FF;
  padding: 20px; 
  
}
#top5 {
  border-radius: 25px;
  border: 2px solid #B833FF;
  padding: 20px; 
  
}


</style>
<body>


<!-- Links (sit on top) -->
<div class="w3-top">
<div class="w3-row w3-padding w3-black">
<div class="w3-col s3">
<a href="#" class="w3-button w3-block w3-black">HOME</a>
</div>
<div class="w3-col s3">
<a href="#about" class="w3-button w3-block w3-black">ABOUT</a>
</div>
<div class="w3-col s3">
<a href="#menu" class="w3-button w3-block w3-black">SERVICE</a>
</div>
<div class="w3-col s3">
<a href="#where" class="w3-button w3-block w3-black">NEWS & CONTACT</a>
</div>

<div class="w3-col s3">
<a href="#where" class="w3-button w3-block w3-black">Users</a>
</div>

<div class="w3-col s3">
<a href="http://master.feiwang.tech/allcompanies.php" class="w3-button w3-block w3-black">Back to Main Page</a>
</div>

</div>
</div>

<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
<div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
<span class="w3-tag">Open from 2pm to 12am</span>
</div>
<div class="w3-display-middle w3-center">
<span class="w3-text-white" style="font-size:90px">Hot<br>Pot<br>Party</span>
</div>
<div class="w3-display-bottomright w3-center w3-padding-large">
<span class="w3-text-white">somewhere in the world, 2222</span>
</div>
</header>

<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">

<!-- About Container -->
<div class="w3-container" id="about">
<div class="w3-content" style="max-width:700px">
<h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">ABOUT Hot Pot Party</span></h5>
<p>Hot Pot Party was founded in Santa Clara by Amber who is a hot pot addict. She felt tired about waiting 3 hrs in the line of Haidilao each time . She decided to build a food line that not only provide fresh organic food and USDA Prime meat, but also provide door to door dilvery of all those food. The Hot Pot Party will provide all the soup base, hot pot, and dipping sauce as well. In this way, people can enjoy great hot pot at home without waiting in the line. Hot Party promised 30 minites devlivery time for every order. </p>
<p>Wish everybody could enjoy our service!</p>
<div class="w3-panel w3-leftbar w3-light-grey">
<p><i>"To give real service you must add something which cannot be bought or measured with money, and that is sincerity and integrity." Quoted by Douglas Adams </i></p>
<p>Best service to customer is our belief.</p>
</div>
<img src="http://iamafoodblog.com/wp-content/uploads/2018/02/how-to-make-chinese-hot-pot-at-home_-2w.jpg" style="width:100%;max-width:1000px" class="w3-margin-top">
<p><strong>Opening hours:</strong> everyday from 2pm to 12am.</p>
<p><strong>Address:</strong> Somewhere in the world, 2222, CA</p>
</div>
</div>

<!-- Menu Container -->
<div class="w3-container" id="menu">
<div class="w3-content" style="max-width:700px">

<h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">THE SERVICE</span></h5>
<p>We provide door to door delivery menu of all the following food, and comes with beef soup base, hot pot and seasame dipping souce.</p>
<div class="w3-row w3-center w3-card w3-padding">
<a href="javascript:void(0)" onclick="openMenu(event, 'Eat');" id="myLink">
<div class="w3-col s6 tablink">Eat</div>
</a>
<a href="javascript:void(0)" onclick="openMenu(event, 'Drinks');">
<div class="w3-col s6 tablink">Drink</div>
</a>
</div>

<div id="Eat" class="w3-container menu w3-padding-48 w3-card">
<h5><a href="kurobuta_pork.php?command=RecentViews&link=1">Kurobuta Pork </a></h5>
<p class="w3-text-grey">Assortment of fresh Kurobuta pork 7.50</p><br>

<h5><a href="premium_lamb_shoulder.php?command=RecentViews&link=2" >Premium Lamb Shoulder</a></h5>
<p class="w3-text-grey">Premium lam shoulder meat sliced in thin slices 7.00</p><br>

<h5><a href="seafood_combo.php?command=RecentViews&link=3">Seafood Combo</a></h5>
<p class="w3-text-grey">Assortment of the gresh seasonal seafood 10.50</p><br>

<h5><a href="noodles.php?command=RecentViews&link=4">Fresh Handmade Noodle</a></h5>
<p class="w3-text-grey">Hand pull noodles, taste great with soup base 5.50</p><br>

<h5><a href="cabbage.php?command=RecentViews&link=5">Napa Cabbage</a></h5>
<p class="w3-text-grey">Fresh napa cabbage 3.50</p>
</div>

<div id="Drinks" class="w3-container menu w3-padding-48 w3-card">
<h5><a href="wine.php?command=RecentViews&link=6">Wine</a></h5>
<p class="w3-text-grey">Fine Wine 2.50</p><br>

<h5><a href="beer.php?command=RecentViews&link=7">Beer</a></h5>
<p class="w3-text-grey">Fine Beer 4.50</p><br>

<h5><a href="juice.php?command=RecentViews&link=8">Juice</a></h5>
<p class="w3-text-grey">Fresh Food Juice 5.00</p><br>

<h5><a href="icedtea.php?command=RecentViews&link=9">Iced tea</a></h5>
<p class="w3-text-grey">Hot tea, except not hot 3.00</p><br>

<h5><a href="soda.php?command=RecentViews&link=10">Soda</a></h5>
<p class="w3-text-grey">Coke, Sprite, Fanta, etc. 2.50</p>
</div>
<br />
<div id = last5>
<strong>Last 5 Visited Items:

    <?php 
    if(isset($_COOKIE["views"])){
        $getViews = $_COOKIE["views"];
        echo $getViews;
    }        
    ?>
        
</strong>
</div>
<div id = most5>
<strong>Top 5 High Rate Items:

    <?php 
        $strMost = "";
        foreach ($mostFive as $key => $value)
        {
            $strMost.=$key." ".$value."|";
        } 
        echo $strMost;       
    ?>
        
</strong>
</div>
<div id = top5>
<strong>Top 5 Visited Items:

    <?php 
        $strTop = "";
        foreach ($topFive as $key => $value)
        {
            $strTop.=$key." ".$value."|";
        } 
        echo $strTop;        
    ?>
        
</strong>
</div>


<!-- Review-->


<div id = "review_div">     
    <div>
        <Strong>Product Review</Strong>
      <form method="post" action="index.php">
        <select name = "products">
          <option value="Kurobuta Pork">Kurobuta Pork</option>
          <option value="Premium Lamb Shoulder">Premium Lamb Shoulder</option>
          <option value="Seafood Combo">Seafood Combo</option>
          <option value="Fresh Handmade Noodle">Fresh Handmade Noodle</option>
          <option value="Napa Cabbage">Napa Cabbage</option>
          <option value="Wine">Wine</option>
          <option value="Beer">Beer</option>
          <option value="Juice">Juice</option>
          <option value="Iced Tea">Iced Tea</option>
          <option value="Soda">Soda</option>
        </select>
        <div class="rate">
            <input type="radio" id="star5" name="rate" value="5" />
            <label for="star5" title="text">5 stars</label>
            <input type="radio" id="star4" name="rate" value="4" />
            <label for="star4" title="text">4 stars</label>
            <input type="radio" id="star3" name="rate" value="3" />
            <label for="star3" title="text">3 stars</label>
            <input type="radio" id="star2" name="rate" value="2" />
            <label for="star2" title="text">2 stars</label>
            <input type="radio" id="star1" name="rate" value="1" />
            <label for="star1" title="text">1 star</label>
        </div>
        <textarea id="review_text" name="review" cols = "70" rows="5"></textarea>
        <input type="submit" name="review_submit" value="Send Review" id="submit_text" />
      </form>
    </div>
</div>
 

<?php include('errors.php') ?>


<img src="https://static1.squarespace.com/static/58ec26a8c534a568875304de/t/5a2c1d53e4966b5dad6d5b95/1512840617328/20171124-GH-TANGHOTPOT-1037.jpg?format=2500w" style="width:100%;max-width:1000px;margin-top:32px;">
</div>
</div>


<!-- Contact/Area Container -->
<div class="w3-container" id="where" style="padding-bottom:32px;">
<div class="w3-content" style="max-width:700px">
<h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide"> News about Hot Pot Party</span></h5>
<p>We just open a new branch in New York! Find us their and enjoy our great service!</p>

<p><span class="w3-tag">FYI!</span> We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggest criteria of them all, both look and taste.</p>
<p><strong>Contact Information</strong> Just leave a message here or shoot a email to <strong>
<?php
    echo file_get_contents("contact.txt");
?>

<div class= "login_form">
    <form  role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="text" name = "username" placeholder = "Username">
        <input type="password" name = "password" placeholder = "Password">
        <button type="sumit" name="login" >Login to see User List</button>
    </form>
</div>

<?php
    
    
    if(isset($_POST['login']) && $_POST['username'] != "" && $_POST['password'] != "")
    {

        if($_POST['username']=='admin' && $_POST['password'] == '1234')
        {
            echo '<a href="download.php">Download users.txt</a>';
        }else{
            echo 'You enter the wrong username and password';
        }
    }
?>
</strong> </p>

<form method="post" action="index.php">

    <input class="w3-input w3-padding-16 w3-border"type="text" name="firstname" placeholder="First Name">
    <br />
    <input class="w3-input w3-padding-16 w3-border"type="text" name="lastname" placeholder="Last Name">
    <br />
    <input class="w3-input w3-padding-16 w3-border"type="email" name="email" placeholder="Email">
    <br />
    <input class="w3-input w3-padding-16 w3-border"type="text" name="homeaddress" placeholder="Home Address">
    <br />
    <input class="w3-input w3-padding-16 w3-border"type="text" name="cellphone" placeholder="Cell Phone">
    <br />
    <input class="w3-input w3-padding-16 w3-border"type="text" name="homephone" placeholder="Home Phone">
    <br />
    <p><button class="w3-button w3-black" type="submit" name= "reg_user">Register</button>
        <button class="w3-button w3-black" type="Search" name= "search_user">Search</button>
    </p>
  </form>
</div>
</div>
<!--rate-->

<!--visit-->



<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
<p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>


<script>

// Tabbed Menu
function openMenu(evt, menuName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("menu");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
    }
    document.getElementById(menuName).style.display = "block";
    evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>



</body>
</html>
