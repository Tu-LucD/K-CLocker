<?php
    setcookie("page", 0, time()+3600, "/", "", 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="KCLocker.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K&C Locker</title>    
</head>
<body>
    <?php
        include_once('navbar.php');        
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        
            switch($page)
            {
                case 'home':
                    include_once('home.php');
                break;
                case 'about':
                    include_once('about.php');
                break;
                case 'contact':
                    include_once('contact.php');
                break;
                case 'products':
                    include_once('products.php');
                break;
                case 'login':
                    include_once('login.php');
                break;
                case 'createAccount':
                    include_once('createAccount.php');
                break;
                case 'insert':
                    include_once('ProductInsertion/insertProductsForUsOnly.php');
                break;
                case 'dashboard':
                    include_once('dashboard.php');
                break;
                case 'confirm':
                    include_once('feedbackConfirmed.php');
                break;
                case 'productDetails':                    
                    include_once("productDetails.php");
                case 'editProducts':
                    include_once('editProducts.php');
                break;
                case 'accounts':
                    include_once('accounts.php');
                break;
                case 'promotions':
                    include_once('promotions.php');
                break;
                case 'editProfile':
                    include_once('editProfile.php');
                break;
                case 'adminDashboard':
                    include_once('adminDashboard.php');
                break;
                case 'viewOrder':
                    include_once('viewOrder.php');
                break;
                default:
                    break;
            }
        }
        else include_once('home.php');
        
    ?>
</body>
</html>