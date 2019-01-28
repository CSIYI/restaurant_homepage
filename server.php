<?php
session_start();

// initializing variables
$firstname = "";
$lastname = "";
$home_address = "";
$home_phone = "";
$cell_phone = "";
$email    = "";


$errors = array(); 

$linkMap = array(
    "1" => "Kurobuta Pork",
    "2" => "Premium Lamb Shoulder",
    "3" => "Seafood Combo",
    "4" => "Fresh Handmade Noodle",
    "5" => "Napa Cabbage",
    "6" => "Wine",
    "7" => "Beer",
    "8" => "Juice",
    "9" => "Iced tea",
    "10" => "Soda",
);

$urlMap = array(
    "Kurobuta Pork" => "http://www.peanutchoco.com/kurobuta_pork.php?command=RecentViews&link=1",
    "Premium Lamb Shoulder" => "http://www.peanutchoco.com/premium_lamb_shoulder.php?command=RecentViews&link=2",
    "Seafood Combo" => "http://www.peanutchoco.com/seafood_combo.php?command=RecentViews&link=3",
    "Fresh Handmade Noodle" => "http://www.peanutchoco.com/noodles.php?command=RecentViews&link=4",
    "Napa Cabbage" => "http://www.peanutchoco.com/cabbage.php?command=RecentViews&link=5",
    "Wine" => "http://www.peanutchoco.com/wine.php?command=RecentViews&link=6",
    "Beer" => "http://www.peanutchoco.com/beer.php?command=RecentViews&link=7",
    "Juice" => "http://www.peanutchoco.com/juice.php?command=RecentViews&link=8",
    "Iced tea" => "http://www.peanutchoco.com/icedtea.php?command=RecentViews&link=9",
    "Soda" => "http://www.peanutchoco.com/soda.php?command=RecentViews&link=10",
);

$topFive = array();
$mostFive = array();

// connect to the database
//$db = mysqli_connect('localhost:3306', 'peanutch_siyicai', 'Happyeve123!', 'peanutch_WPDBU');
// 创建连接
$db = mysqli_connect("db-30bemv1qn.aliwebs.com", "30bemv1qn", "123456", "30bemv1qn");

// 检测连接
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

  //Top Five Visited
   $sql_top = "SELECT product, count FROM visit ORDER BY count DESC LIMIT 5";
   $top_five = mysqli_query($db, $sql_top);

   if ($top_five->num_rows > 0) {
        // output data of each row
        while($row = $top_five->fetch_assoc()) {
            //echo "product: " . $row["product"]. " - visit count: " . $row["count"]."<br>";
          $topFive[$row["product"]] = $row["count"];
          //print_r ($topFive);
        }
        $visitcont = json_encode($topFive);
        //print_r($visitcont);
    } else {
        echo "0 results";
    }
    //Top Five Popular
    $sql_pop = "SELECT product, AVG(rating) AS average FROM review GROUP BY product ORDER BY average DESC LIMIT 5";
    $top_pop = mysqli_query($db, $sql_pop);

    if ($top_pop->num_rows > 0) {
          while($row = $top_pop->fetch_assoc()) {
              //echo "product: " . $row["product"]. " - average review: " . round($row["average"], 2) ."<br>";
            $mostFive[$row["product"]]=round($row["average"], 2);
            
          }
          //print_r($mostFive);
          $highrate = json_encode($mostFive);
          //print_r($highrate);
      } else {
          echo "0 results";
      }


if(isset($_GET['link'])){
  $link = $_GET['link'];
  //echo $link;
  $linkName = $linkMap[$link];
  $url = $urlMap[$linkName];
  //echo $linkName."!!!!!";
   $sql = "UPDATE visit SET count = count+1 WHERE product = '$linkName'";
   $result = mysqli_query($db, $sql);
   $visit_sql = "SELECT count FROM visit WHERE product = '$linkName'";
   //echo $visit_sql;

   $visit_cnt = mysqli_query($db, $visit_sql);
   $visit_row = mysqli_fetch_assoc($visit_cnt);
   //echo $visit_row['count'];
   $info_visit = array(
      "product_name" => $linkName,
      "product_visit" => $visit_row['count'],
      "product_url" => $url,
      "company_name" => "Hot Pot Party",
   );
   print_r($info_visit);
   $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://master.feiwang.tech/RestHandleVisit.php");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($info_visit));

  $output = curl_exec($ch);
  echo $output;
  curl_close($ch);
     

}
    
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $home_address = mysqli_real_escape_string($db, $_POST['homeaddress']);
  $cell_phone = mysqli_real_escape_string($db, $_POST['cellphone']);
  $home_phone = mysqli_real_escape_string($db, $_POST['homephone']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "First name is required"); }
  if (empty($lastname)) { array_push($errors, "Last name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($home_address)) { array_push($errors, "Home address is required"); }
  if (empty($home_phone)) { array_push($errors, "Home phone is required"); }
  if (empty($cell_phone)) { array_push($errors, "Cell phone is required"); }
  

  if (count($errors) == 0) {

  	$query = "INSERT INTO users (first_name, last_name, email, home_address, home_phone, cell_phone) 
  			  VALUES('$firstname','$lastname', '$email', '$home_address','$home_phone','$cell_phone')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $firstname.$lastname;
  	$_SESSION['success'] = "You are now logged in";
    array_push($errors, "Registered succesfully!");

  }
}
if (isset($_POST['search_user'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $home_address = $_POST['homeaddress'];
  $cell_phone = $_POST['cellphone'];
  $home_phone = $_POST['homephone'];
  
  $user_check_query = "SELECT * FROM users WHERE first_name='$firstname' OR last_name='$lastname' OR email='$email'  OR home_phone='$home_phone' OR cell_phone='$cell_phone'";

  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {

      array_push($errors, $user['first_name']." ".$user['last_name']." "."already registered with the system");
  
  }

}

if (isset($_POST['review_submit'])){
  
  if(isset($_POST['rate'])){
    $rating = $_POST['rate'];   
  }
  $review_content = mysqli_real_escape_string($db, $_POST['review']);
  $product = $_POST['products'];
  
  if (empty($rating)) { array_push($errors, "Please rate!"); }
  if (empty($review_content)) { array_push($errors, "Please enter review"); }
  if (empty($product)) { array_push($errors, "Please choose a product."); }

  $query = "INSERT INTO review (product, rating, review) 
          VALUES('$product','$rating', '$review_content')";
  $review_sent = mysqli_query($db, $query);
  if ($review_sent) {

      array_push($errors, "Review sent!");
  
  }
  $rate_sql = "SELECT AVG(rating) AS average FROM review WHERE product = '$product'";
   $rate_cnt = mysqli_query($db, $rate_sql);
   $rate_row = mysqli_fetch_assoc($rate_cnt);
   //print_r ($rate_row);
   //print_r ($rate_row['average']);
   $info_rate = array(
      "product_name" => $product,
      "product_rating" => $rate_row['average'],
      "product_url" => $urlMap[$product],
      "company_name" => "Hot Pot Party",
   );
   echo $rating;
   print_r(json_encode($info_rate));
   $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://master.feiwang.tech/RestHandleRating.php");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($info_rate));

  $output = curl_exec($ch);
  echo $output;
  array_push($errors, $output);
  curl_close($ch);  

}
?>
