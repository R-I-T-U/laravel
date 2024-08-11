<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$setting->website_name}}</title>

    <!-- SWIPER -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- Font Awesome CDN Link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS File Link  -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <link rel="shortcut icon" href="{{ asset('assets/setting/logos/' . $setting->favicon) }}" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>
        

        <!-- <i class="fas fa-mug-hot"></i> -->
        <a href="#" class="logo"> <img src="{{ asset('assets/setting/logos/' . $setting->logo) }}" alt="logo" height="30px"> {{$setting->website_name}}</a>


        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
            <a href="#review">review</a>
            <a href="#book">book</a>
        </nav>

        <a href="#book" class="btn">book a table</a>
    </header>

    <!-- HOME -->
    <section class="home" id="home">
        <div class="row">
            <div class="content">
                <h3>{{$setting->slogan}} </h3>
                <!-- <a href="#" class="btn">buy one now</a> -->
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
            <img src="{{ asset('assets/setting/logos/' . $setting->feature_image) }}" alt="feature_image">
            </div>

            <div class="content">
                <h3 class="title">{{$setting->desc_heading}} </h3>
                <p>{{$setting->description}} </p>
                <!-- <a href="#" class="btn">read more</a> -->
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

                    @if ($coffee->discount > 0)
                    <span style="text-decoration: line-through;">Rs{{ number_format($coffee->price, 2) }}</span>&nbsp;&nbsp;&nbsp;
                    <span>
                        Rs{{ number_format($coffee->price - $coffee->discount, 2) }}
                    </span>
                    @else
                    <span>Rs{{ number_format($coffee->price, 2) }}</span>
                    @endif

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
                        @for ($i = 0; $i < $review->rating; $i++)
                            <i class="fas fa-star"></i>
                            @endfor
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

        <form action="{{ route('backend.reservation.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" class="box" required>
            @error('name')
            <span style="color:red;">{{$message}}</span>
            @enderror
            <input type="email" name="email" placeholder="Email" class="box" required>
            @error('email')
            <span style="color:red;">{{$message}}</span>
            @enderror
            <input type="number" name="phone" placeholder="Phone Number" class="box" required>
            @error('phone')
            <span style="color:red;">{{$message}}</span>
            @enderror
            <textarea name="message" placeholder="Message" class="box" id="" cols="30" rows="10" required></textarea>
            @error('message')
            <span style="color:red;">{{$message}}</span>
            @enderror
            <input type="submit" value="Send Message" class="btn">

        </form>

    </section>

    <!-- FOOTER -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>our branches</h3>
                <a href="#"><i class="fas fa-arrow-right"></i> {{$setting->branch1}} </a>
                <a href="#"><i class="fas fa-arrow-right"></i> {{$setting->branch2}} </a>
                <a href="#"><i class="fas fa-arrow-right"></i> {{$setting->branch3}} </a>
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
                <a href="#"><i class="fas fa-phone"></i> {{$setting->phone1}} </a>
                @if($setting->phone2)
                <a href="#"><i class="fas fa-phone"></i> {{ $setting->phone2 }}</a>
                @endif


                <a href="#"><i class="fas fa-envelope"></i> {{$setting->email}} </a>
                <a href="#"><i class="fas fa-envelope"></i> {{$setting->address}} </a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                @if($setting->facebook_link)
                <a href="{{$setting->facebook_link}} "><i class="fab fa-facebook-f"></i> facebook</a>
                @endif
                @if($setting->twitter_link)
                <a href="{{$setting->twitter_link}} "><i class="fab fa-twitter"></i> twitter</a>
                @endif
                @if($setting->insta_link)
                <a href="{{$setting->insta_link}} "><i class="fab fa-instagram"></i> instagram</a>
                @endif
                <!-- <a href="{{$setting->facebook_link}} "><i class="fab fa-facebook-f"></i> facebook</a>
                <a href="{{$setting->twitter_link}} "><i class="fab fa-twitter"></i> twitter</a>
                <a href="{{$setting->insta_link}} "><i class="fab fa-instagram"></i> instagram</a> -->
                <!-- <a href="#"><i class="fab fa-linkedin"></i> linkedin</a> -->

            </div>
        </div>

        <!-- <div class="credit">created by <span>mr. web designer</span> | all rights reserved</div> -->
    </section>


    <!-- SWIPER -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- Custom JS File Link  -->
    <script src="{{asset('assets/frontend/js/script.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the previous page or to a specific URL
                    window.location.href = "{{ url()->previous() }}"; // Use this if you want to go back
                    // Alternatively, you can refresh the page if needed:
                    // location.reload();
                }
            });
            @elseif(session('error'))
            Swal.fire({
                title: 'Error!',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the previous page or to a specific URL
                    window.location.href = "{{ url()->previous() }}"; // Use this if you want to go back
                    // Alternatively, you can refresh the page if needed:
                    // location.reload();
                }
            });
            @endif
        });
    </script>

</body>


</html>