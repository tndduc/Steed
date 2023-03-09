<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <script src="https://github.com/chartjs/Chart.js/blob/master/docs/scripts/utils.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<link rel="shortcut icon" href="http://localhost/steed/public/images/Web_f/logo/steed1.png">
    
    <?php if (isset($data['title'])){
        echo '<title>'.$data['title'].'</title>';      
        
    };    
    ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="http://localhost/steed/public/css/main.css">
    
    <script src="http://localhost/steed/public/js/main.js"></script>
    
    

</head>


<header class="bg">
    <div class="navbar">
        <div class="navbar__logo">
            <a href="http://localhost/steed/"><img src="http://localhost/steed/public/images/Web_f/logo/dared.png" alt="Logo"></a>
        </div>
        <div class="navbar__content nav__pc">
            <ul class="none-list">
                <li><a class="nav__link" href="http://localhost/steed/admin_steed/">Statistical</a></li>
                <li><a class="nav__link" href="http://localhost/steed/product">Product</a></li>
                <li><a class="nav__link" href="http://localhost/steed/admin_steed/register">+ Create Admin</a></li>
            </ul>
        </div>


        <div class="navbar__icon">
            <ul class="none-list">
                <li><button class="search_btn "><i class="fas fa-search "></i></button></li>
                <li class="user__tab nav__pc" id="user_tab">
                <?php 
                        if(isset($data['check_log'])){
                            if($data['check_log']=='none_login'){
                       
                                echo'<a class="user__name nav__pc" href="http://localhost/steed/admin_steed/login">Login</a>';
                            }else{
                                echo '
                                <div class="menu1 xt-ct-menu">
                                    <div class="xtlab-ctmenu-item"> '.$data['check_log'].' <i class="fas fa-sort-down"></i></div>
                                    <div class="xtlab-ctmenu-sub">
                                        <a href="#">Me <i class="fas fa-user"></i></a>
                                        <a href="#">Setting <i class="fas fa-cog"></i></a>
                                        <a href="http://localhost/steed/admin_steed/login/logout">Logout <i class="fas fa-sign-out-alt"></i></a>
                                    </div>
                                </div>
                                ';
                            }
                        }
                    
                    ?>
                    
                </li>
                <li>
                    <label for="nav-mb" class="btn__mb "><i class="fas fa-bars icon_nav"></i></label>
                   
                </li>
            </ul>

        </div>

    </div>
    <input type="checkbox" name="" class="check_nav" id="nav-mb">
    <div class="search_modal navbar ">
        <div class="search__content">
            <span id="search">Search</span>
            <form action="" class="form_search">
                <button class="search__go"><i class="fas fa-search "></i></button>
                <input type="text" name="search">
            </form>
            <span class="close">&times;</span>
        </div>
    </div>
    

    <label for="nav-mb" class="nav__mobile-full">
        
        <div class="nav-mobile">
            <div class="nav-mobile_user">
                <img class="user_avatar" src="https://image.freepik.com/free-vector/coconut-logo_8855-150.jpg" alt="">
                <a class="user__name" href="">
                    <h2>User Name</h2>
                    <span>View Profile</span>
                </a>
            </div>
            <div class="nav-mobile__content">
                <ul class="none-list  ">
                    <li><a class="nav__link" href="">Men</a></li>
                    <li><a class="nav__link" href="">Women</a></li>
                    <li><a class="nav__link" href="">Product</a></li>
                    <li><a class="nav__link" href="">Sale Off</a></li>
                </ul>
            </div>
            <div class="nav-mobile__icon">
                <ul class="none-list">
                    <li><button><i class="fas fa-shopping-bag "></i></button></li>
                    <li class="user__tab nav__pc" id="user_tab">
                        <img class="user_avatar nav__pc" src="https://image.freepik.com/free-vector/coconut-logo_8855-150.jpg" alt="">
                        <a class="user__name nav__pc" href="">User Name</a>
                        <i class="fas fa-sort-down user__more nav__pc"></i>
                    </li>
                    <li>
                        <i class="fas fa-bars icon_nav"></i>
                    </li>
                </ul>
            </div>
        </div>
    </label>
    
    </div>
    <div class="hover-cart">

    </div>
    
</header>   
<div class="space"></div>
