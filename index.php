<?php
@include 'header.php';
@include 'config.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TT World</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="style2.css"> -->
    <link rel="icon" href="photo/ttlogo.png">
    <script src="https://kit.fontawesome.com/78f762bd78.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

</head>
<body>


         <!-- Home section starts -->
    <section class="home" id="home">
        <div class="row">

            <div class="content">
                <h3>Upto 75% off</h3>
                <p>
                "Welcome to our table tennis shop! We offer a wide range of quality equipment for players of all levels.
                 From tables to rackets, balls to accessories,
                 we've got you covered. Our friendly staff is here to help you find the perfect gear. Elevate your game with us!"
                </p>
                <a href="allProduct.php" class="btn">Shop Now></a>
            </div>
            <div class="swiper item-slider">
                <div class="swiper-wrapper">
                <?php
                $select_product=mysqli_query($conn,"SELECT * FROM products where productType='Show_item'");
                    if(mysqli_num_rows($select_product)>0){
                        while($row= mysqli_fetch_assoc($select_product)){
                            echo' 

                <a href="#" class="swiper-slide"><img src="uploaded_img/'.$row['image'].'" alt=""></a>

               ';
                        }
                    }
                ?>
                </div>
            </div>
        </div>
</section>
    <!-- Home section ends -->
    <section>
    <div class="body2">
        <div #swiperRef="" class="slide-container swiper1 mySwiper">
        <div class="slide-content">
            <div class="card-wrapper1 swiper-wrapper">
            <?php
                $select_product=mysqli_query($conn,"SELECT * FROM products where quantity=0");
                    if(mysqli_num_rows($select_product)>0){
                        while($row= mysqli_fetch_assoc($select_product)){
                            echo'
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
        
                            <div class="card-image">
                                <img src="uploaded_img/'. $row['image'].'" alt="bat" class="card-img">
                            </div>
                            </div>

                            <div class="card-contant">
                            <h2 class="name">' .$row['productName']. '</h2>
                             <p class="description">' .$row['description']. '</p>
                             
                            
                             <a href="product.php?productType='.$row['productType'].'"><button class="btn">Viwe More</button></a>
                        </div>


                    </div>

    
                        ';
                    } 
                    }  ?>
                    
                    </div>
        </div>
        <!-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div> -->
    </div>
    </div>
    </section>

                <!-- <div class="card swiper-slide">
                  <div class="image-content">
                      <span class="overlay"></span>
    
                      <div class="card-image">
                          <img src="photo/rabar1.jpeg" alt="bat" class="card-img">
                      </div>
                  </div>
                  <div class="card-contant">
                      <h2 class="name">Rubbers</h2>
                      <p class="discription">"Elevate your spin and control with our table tennis rubbers.
                         Choose from a variety of rubbers designed for different playing style
                        s. Enhance your grip, precision, and power on the table with our high-quality rubbers."</p>
                      <button class="btn">Viwe More</button>
                    </div>
              </div>





<!-- featured items scetion stars -->

    

<section class="featured" id="featured">

<h1 class="heading"><span>Featured Table Tennis Items</span></h1>

<div class="swiper featured-slider">
    <div class="swiper-wrapper">
<?php
$select_product=mysqli_query($conn,"SELECT * FROM products where quantity>0");
if(mysqli_num_rows($select_product)>0){
    while($row= mysqli_fetch_assoc($select_product)){
        echo'

        <div class="swiper-slide box">
            <div class="icons">
                <a href="#" class="fa-solid fa-magnifying-glass"></a>
                <a href="#" class="fa-regular fa-heart"></a>
                <a href="#" class="fa-regular fa-eye"></a>
            </div>
            <div class="image">
                <img src="uploaded_img/'. $row['image'].'" alt="">
            </div>
            <div class="content">
                <h3>'.$row['productName'].'</h3>
                <div class="price">Rs.'.$row['price'].' <span>Rs.'.$row['OldPrice'].'</span></div>
                <a href="#" class="btn">Add to Cart</a>
            </div>
        </div>
        ';
    }
  }
        ?>
        </div>

<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>

</div>

</section>
        <!--........................................................ icon.................................................. -->
    <section class="icons-container">

        <div class="icons">
            
            <i class="fa-solid fa-motorcycle"></i>
            <div class="content">
                <h3> Free dilivery</h3>
                <p> Free dilivery for purchases over RS.2000</p>
            </div>
            
        </div>

        
        <div class="icons">

            <i class="fa-solid fa-lock"></i>
            <div class="content">
                <h3>Secure Payments</h3>
                <p>100% secure payment methods</p>
            </div>
            
        </div>

        <div class="icons">
            
            <i class="fa-solid fa-rotate-right"></i>
            <div class="content">
                <h3>Easy Returns</h3>
                <p>Returns within 7 days</p>
            </div>
            
        </div>

        <div class="icons">
            
            <i class="fa-solid fa-phone"></i>
            <div class="content">
                <h3>24/7 hours service</h3>
                <p>Call us anytime</p>
            </div>
            
        </div>

    </section>

    <!-- icons section ends -->
 <!-- newsletter section starts -->

 <section class="newsletter">

    <form action="">
        <h3>Subscribe For Latest Updates</h3>
        <input type="email" name="" placeholder="Enter your email" class="box">
        <input type="submit" value="Subscribe" class="btn">
    </form>
</section>
<!-- newsletter section ends -->

<!-- Arrivals section starts -->

<section class="arrivals" id="arrivals">

    <h1 class="heading"><span>New Arrivals</span></h1>

    <div class="swiper arrivals-slider">
        <div class="swiper-wrapper">
            <?php
                    $NewArrivals_select=mysqli_query($conn,"SELECT * FROM products WHERE quantity>0 ");
                    if(mysqli_num_rows($NewArrivals_select)>0){
                        while($row =mysqli_fetch_assoc($NewArrivals_select)){
                        echo '
            <a href="#" class=" swiper-slide box">
            <div class="image">
                <img src="uploaded_img/'. $row['image'].'" alt="">
                
            </div>
            <div class="content">
                <h3>'.$row['productName'] .'</h3>
                <div class="price">RS. '. $row['price'].'<span>RS. '. $row['OldPrice'].'</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div>
                <input type="submit" value="add card" class="btn">
                </div>
            </div>
            </a>
             '  ;
                        }
                    }
            ?>
            </div>
    </div>
</section>
            

            <!-- <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="arrivals/ball6.jpeg" alt="">
                </div>
                <div class="content">
                    <h3>DNS</h3>
                    <div class="price">RS.160 <span>RS.190</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                </a>


<!-- Arrivals section ends -->

<!-- deal section starts -->

<section class="deal">

    <div class="content">
        <h3>Deal of the Day</h3>
        <h1>Upto 50% Off</h1>
        <p>
            "Game On! Unbeatable Discounts Await for Table Tennis Enthusiasts.
             Get 50% Off on Rackets, Rubber, Tables, Balls, and Stylish Apparel.
             Don't Miss Out on This Smash-Hit Deal! Grab Your Gear and Ace the Savings Today!"
        </p>
        <a href="#" class="btn">Shop Now</a>
    </div>

    <div class="image">
        <img src="arrivals/deals.jpg" alt="">

    </div>
</section>
<!-- deal section ends -->

<!-- Reviews section starts -->

<section class="reviews" id="reviews">

    <h1 class="heading"><span>Customers Reviews</span></h1>

            <div class="swiper reviews-slider">
                <div class="swiper-wrapper">

                    <div class="swiper-slide box">
                        <img src="photo/img1.jpeg" alt="">
                        <h3>Bhashana Chamodhya</h3>
                        <p>
                            "I discovered this table tennis store while exploring the town, and it's now my go-to place for all things table tennis. From top-notch rackets to essential accessories,
                             you're sure to find something that enhances your game."
                          </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>

                       <div class="swiper-slide box">
                        <img src="photo/img3.jpeg" alt="">
                        <h3>Sevindu Punsara</h3>
                        <p>
                            
                             "I stumbled upon this table tennis store while wandering around town, and it's now my go-to place for gear. From top-notch rackets to cool accessories,
                                 you're sure to find something that elevates your game."
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-alt"></i>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <img src="photo/img2.jpeg" alt="">
                        <h3>Sathishkumar</h3>
                        <p>
                           
                            "This table tennis store is a paradise for table tennis enthusiasts like me. From high-quality rackets to premium balls,
                         they have it all. This place is worth the visit."
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <img src="photo/img4.jpeg" alt="">
                        <h3>Peheliya Dhanuka</h3>
                        <p>""This table tennis shop is a paradise for table tennis enthusiasts like me. From high-quality rackets to stylish table tennis apparel, they have it all.
                             This place is worth a visit for all your table tennis needs."
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <img src="photo/img5.jpeg" alt="">
                        <h3>Chamodh Jayasumana</h3>
                        <p>
                            
                            "This table tennis shop is a paradise for table tennis enthusiasts like me.
                             From professional paddles to high-quality balls, they have it all. This place is worth a visit for all your table tennis needs."
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-alt"></i>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <img src="photo/img6.jpeg" alt="">
                        <h3>Nuwandi Siriwardhana</h3>
                        <p>
                            "This table tennis store is a haven for ping pong enthusiasts like me. From top-quality rackets to colorful balls, they have it all.
                             This place is a must-visit for all your table tennis needs."
                        </p>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-alt"></i>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <img src="photo/img7.jpeg" alt="">
                        <h3>Helali Perera</h3>
                        <p>
                            "
                        </p>
                        "This table tennis store is a paradise for table tennis enthusiasts like me. From high-quality rackets to durable table tennis balls, they have it all. 
                        This place is worth a visit for all your table tennis needs."
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
        </div>
    </div>
</section>
 <!-- ///////////////////////footer////////////////// -->
   <section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Our Loacations</h3>
            <a href="#"> <i class="fas fa-map-marker-alt"> Mawanella</i></a>
            <a href="#"> <i class="fas fa-map-marker-alt"> Keagalle</i></a>
            <a href="#"> <i class="fas fa-map-marker-alt"> Kelaniya</i></a>
            <a href="#"> <i class="fas fa-map-marker-alt"> Kandy</i></a>
            <a href="#"> <i class="fas fa-map-marker-alt"> colombo</i></a>
        </div>
        <div class="box">
            <h3>Quick Link</h3>
            <a href="#"> <i class="fas fa-arrow-right"> home</i></a>
            <a href="#"> <i class="fas fa-arrow-right"> feqatured</i></a>
            <a href="#"> <i class="fas fa-arrow-right"> arrivals</i></a>
            <a href="#"> <i class="fas fa-arrow-right"> reviews</i></a>
        </div>
        <div class="box">
            <h3>Quick Link</h3>
            <a href="#"> <i class="fas fa-arrow-right"> account info</i></a>
            <a href="#"> <i class="fas fa-arrow-right"> ardered items</i></a>
            <a href="#"> <i class="fas fa-arrow-right"> privacy policy</i></a>
            <a href="#"> <i class="fas fa-arrow-right"> paymant methord</i></a>
            <a href="#"> <i class="fas fa-arrow-right"> our serivces</i></a>
        </div> 
        <div class="box">
            <h3>Contect info</h3>
            <a href="#"> <i class="fas fa-phone"> +94-766521915</i></a>
            <a href="#"> <i class="fas fa-phone"> +11-123654789</i></a>
            <a href="#"> <i class="fas fa-envelope"> nipunasudesh@gmail.com</i></a>
            <img src="photo/map.jpeg" class="map" alt="">
        </div> 
    </div>
    <div class="share">
        <h3>Share</h3>
        <a href="#"><i class="fa-brands fa-facebook"></i></i></a>
        <a href="#"><i class="fa-brands fa-twitter"></i></a>
        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
        <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
    </div>
 <div class="credit">Credit By <span>Nipuna Sudesh</span> all right reserved!</div>
   </section>

    




    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</body>
</html>

<script>
    var swiper = new Swiper(".item-slider", {
    loop:true,
    spaceBetween: 10,
    centeredSlides:true,
    autoplay:{
        delay:2000,
        disableOnInteraction: false,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      510: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });

  //   featured slide swiper
var swiper = new Swiper(".featured-slider", {
    spaceBetween: 10,
    loop:true,
    centeredSlides:true,
    autoplay:{
        delay:2000,
        disableOnInteraction: false,
    },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      450: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 4,
      },
    },
  });
  //   arrivals slide swipper
var swiper = new Swiper(".arrivals-slider", {
    spaceBetween: 10,
    loop:true,
    centeredSlides:true,
    autoplay:{
        delay:2000,
        disableOnInteraction: false,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });

//   reviews slider swiper
var swiper = new Swiper(".reviews-slider", {
    spaceBetween: 10,
    grabCursor: true,
    loop:true,
    centeredSlides:true,
    autoplay:{
        delay:7000,
        disableOnInteraction: false,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });

  function openLogin() {

    var loginPageUrl = 'login.php';


    window.open(loginPageUrl, '_blank');
}
document.getElementById('login-btn').addEventListener('click', openLogin);
///////////////////////////////////////////////////////////
var swiper = new Swiper(".slide-content", {
    slidesPerView: 3,
    autoplay:{
        delay:7000,
        disableOnInteraction: false,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
    centeredSlides: true,
    spaceBetween: 30,
    loop:true,
    fade:true,
    grabCursor:true,
    pagination: {
      el: ".swiper-pagination",
      type: "fraction",
      clickable:true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  var appendNumber = 4;
  var prependNumber = 1;
  document
    .querySelector(".prepend-2-slides")
    .addEventListener("click", function (e) {
      e.preventDefault();
      swiper.prependSlide([
        '<div class="swiper-slide">Slide ' + --prependNumber + "</div>",
        '<div class="swiper-slide">Slide ' + --prependNumber + "</div>",
      ]);
    });
  document
    .querySelector(".prepend-slide")
    .addEventListener("click", function (e) {
      e.preventDefault();
      swiper.prependSlide(
        '<div class="swiper-slide">Slide ' + --prependNumber + "</div>"
      );
    });
  document
    .querySelector(".append-slide")
    .addEventListener("click", function (e) {
      e.preventDefault();
      swiper.appendSlide(
        '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>"
      );
    });
  document
    .querySelector(".append-2-slides")
    .addEventListener("click", function (e) {
      e.preventDefault();
      swiper.appendSlide([
        '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>",
        '<div class="swiper-slide">Slide ' + ++appendNumber + "</div>",
      ]);
    });
</script>