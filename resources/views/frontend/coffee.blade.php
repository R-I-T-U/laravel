<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee</title>

    <!-- SWIPER -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- Font Awesome CDN Link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS File Link  -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">

</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo">coffee <i class="fas fa-mug-hot"></i></a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#review">review</a>
            <a href="#book">book</a>
        </nav>

        <a href="#" class="btn">book a table</a>
    </header>

    <!-- HOME -->
    <section class="home" id="home">
        <div class="row">
            <div class="content">
                <h3>fresh coffee in the morning</h3>
                <a href="#" class="btn">buy one now</a>
            </div>

            <div class="image">
                <img src="{{asset('assets/frontend/image/home-img-1.png')}}" class="main-home-image" alt="">
            </div>
        </div>

        <div class="image-slider">
            <img src="{{asset('assets/frontend/image/home-img-1.png')}}" alt="">
            <img src="{{asset('assets/frontend/image/home-img-2.png')}}" alt="">
            <img src="{{asset('assets/frontend/image/home-img-3.png')}}" alt="">
        </div>
    </section>

    <!-- ABOUT -->
    <section class="about" id="about">
        <h1 class="heading">about us <span>why choose us</span></h1>

        <div class="row">
            <div class="image">
                <img src="{{asset('assets/frontend/image/about-img.png')}}" alt="">
            </div>

            <div class="content">
                <h3 class="title">what's make our coffee special!</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel rerum laboriosam reprehenderit ipsa id
                    repellat odio illum, voluptas, necessitatibus assumenda adipisci. Hic, maiores iste? Excepturi illo
                    dolore mollitia qui quia.</p>
                <a href="#" class="btn">read more</a>
                <div class="icons-container">
                    <div class="icons">
                        <img src="{{asset('assets/frontend/image/about-icon-1.png')}}" alt="">
                        <h3>quality coffee</h3>
                    </div>
                    <div class="icons">
                        <img src="{{asset('assets/frontend/image/about-icon-2.png')}}" alt="">
                        <h3>our branches</h3>
                    </div>
                    <div class="icons">
                        <img src="{{asset('assets/frontend/image/about-icon-3.png')}}" alt="">
                        <h3>free delivery</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- MENU -->
     <section class="menu" id="menu">
        <h1 class="heading">our menu <span>popular menu</span></h1>

        <div class="box-container">
            
        @foreach($coffees as $coffee)
                <a href="#" class="box">
                    <img src="{{ asset('assets/images/coffee/' . $coffee->image) }}" alt="{{ $coffee->title }}">
                    <div class="content">
                        <h3>{{ $coffee->title }}</h3>
                        <p>{{ $coffee->description }}</p>
                        <span>${{ number_format($coffee->price, 2) }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- REVIEW -->
    <section class="review" id="review">
        <h1 class="heading">reviews <span>what people says</span></h1>

        <div class="swiper review-slider">
            <div class="swiper-wrapper">
            @foreach($reviews as $review)
                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                   
                    <img src="{{ asset('assets/customer_images/' . $review->image) }}" alt="{{ $review->name }}">
                    <div class="stars">
                        
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>{{ $review->description }}</p>
                    <h3>{{$review->name}}</h3>
                    <span>{{$review->job_position}}</span>
                </div>
            @endforeach   
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- BOOK -->
    <section class="book" id="book">
        <h1 class="heading">booking <span>reserve a table</span></h1>

        <form action="">
            <input type="text" placeholder="Name" class="box">
            <input type="email" placeholder="Email" class="box">
            <input type="number" placeholder="Number" class="box">
            <textarea name="" placeholder="Message" class="box" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>
    </section>

    <!-- FOOTER -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>our branches</h3>
                <a href="#"><i class="fas fa-arrow-right"></i> india</a>
                <a href="#"><i class="fas fa-arrow-right"></i> USA</a>
                <a href="#"><i class="fas fa-arrow-right"></i> france</a>
                <a href="#"><i class="fas fa-arrow-right"></i> africa</a>
                <a href="#"><i class="fas fa-arrow-right"></i> japan</a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="#home"><i class="fas fa-arrow-right"></i> home</a>
                <a href="#about"><i class="fas fa-arrow-right"></i> about</a>
                <a href="#menu"><i class="fas fa-arrow-right"></i> menu</a>
                <a href="#review"><i class="fas fa-arrow-right"></i> review</a>
                <a href="#book"><i class="fas fa-arrow-right"></i> book</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fas fa-phone"></i> +123-456-7890</a>
                <a href="#"><i class="fas fa-phone"></i> +111-222-3333</a>
                <a href="#"><i class="fas fa-envelope"></i> coffee@gmail.com</a>
                <a href="#"><i class="fas fa-envelope"></i> Perú, Lima</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fab fa-facebook-f"></i> facebook</a>
                <a href="#"><i class="fab fa-twitter"></i> twitter</a>
                <a href="#"><i class="fab fa-instagram"></i> instagram</a>
                <!-- <a href="#"><i class="fab fa-linkedin"></i> linkedin</a> -->
               
            </div>
        </div>

        <div class="credit">created by <span>mr. web designer</span> | all rights reserved</div>
    </section>


    <!-- SWIPER -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- Custom JS File Link  -->
    <script src="{{asset('assets/frontend/js/script.js')}}"></script>

</body>

</html>