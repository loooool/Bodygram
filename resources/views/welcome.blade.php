<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="The next generation of Fitness Platform">
    <meta name="author" content="Bodygram">

    <link rel="shortcut icon" href="{{asset('assets/images/gym.png')}}">

    <title>Bodygram - The next generation of Fitness Platform</title>


    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/assets/landing/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Animate -->
    <link href="{{asset('/assets/landing/css/animate.css')}}" rel="stylesheet">

    <!-- Icon-font -->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/landing/css/themify-icons.css')}}">

    <!-- Custom styles for this template -->
    <link href="{{asset('/assets/landing/css/style.css')}}" rel="stylesheet">

</head>

<body>

<!-- Pre-loader -->
<div class="preloader">
    <div class="status">&nbsp;</div>
</div>

<div class="tagline">
    <div class="container">
        <div class="float-left">
            <div class="phone">
                <i class=" ti-mobile"></i> +976 95 52 00 73
            </div>
            <div class="email">
                <a href="mailto:#">
                    <i class=" ti-email"></i> tselmeg9090@gmail.com
                </a>
            </div>
        </div>
        <div class="float-right">
            <ul class="top_socials">
                <li><a href="javascript:void(0);"><i class=" ti-facebook"></i></a></li>
                <li><a href="javascript:void(0);"><i class=" ti-skype"></i></a></li>
                <li><a href="javascript:void(0);"><i class=" ti-twitter-alt"></i></a></li>
                <li><a href="javascript:void(0);"><i class=" ti-github"></i></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand logo" href="#">BODYGRAM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#how-it-work">BODYGRAM гэж юу вэ?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">Бидний систем</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pricing">Үнэ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#faq">Асуулт</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<div class="clearfix"></div>

<!-- HOME -->
<section class="home bg-img-1 parallax" data-stellar-background-ratio="0.5">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-wrapper text-center">
                    <h1 class="animated fadeInDown wow" data-wow-delay=".1s">BODYGRAM - Эрүүл амьдрал зөв зохион байгуулалт </h1>
                    <p class="animated fadeInDown wow" data-wow-delay=".2s">Bodygram нь Фитнесс клуб ажиллуулдаг болон фиттессээр хичээллэж хүн болгонд зориулагдсан цогц систем юм ,
                        <br/>Монгол дахь цор ганц цогц систем .</p>
                    <a href="{{url('login')}}" class="btn btn-primary btn-rounded w-lg animated fadeInDown wow" data-wow-delay=".4s">{{trans('form.login')}}</a>
                    {{--<a href="{{url('register')}}" class="btn btn-primary btn-rounded w-lg animated fadeInDown wow" data-wow-delay=".4s">{{trans('form.create')}}</a>--}}
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- END HOME -->

<!-- SERVICES -->
<section class="section" id="how-it-work">
    <div class="container">

        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="title zoomIn animated wow" data-wow-delay=".1s">BODYGRAM гэж юу вэ ?</h2>
                <p class="sub-title zoomIn animated wow" data-wow-delay=".2s">BODYGRAM нь фитнессд зориулсан олон хэсгээс бүрдсэн зөв менежмент оновчтой мэдээллийн систэм юм . </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="service-item animated fadeInLeft wow" data-wow-delay=".1s">
                    <i class=" ti-desktop"></i>
                    <div class="service-detail">
                        <h4>{{trans('landing.our_solution')}}</h4>
                        <p>Гадаад буй системтэй ижил үйлдлүүдтэй хүний ажлийг бүрэн хөнгөвчилж чадаж байгаагаараа давуу талтай юм.</p>
                    </div>
                    <!-- /service-detail -->
                </div>
                <!-- /service-item -->
            </div>
            <!-- /col -->

            <div class="col-md-4">
                <div class="service-item animated fadeInDown wow" data-wow-delay=".3s">
                    <i class=" ti-bar-chart-alt"></i>
                    <div class="service-detail">
                        <h4>{{trans('landing.data_analyze')}}</h4>
                        <p>Өөрийн байгууллагын бүхий л төрлийн анализ хийсэн мэдээллийг харах боломтой .</p>
                    </div>
                    <!-- /service-detail -->
                </div>
                <!-- /service-item -->
            </div>
            <!-- /col -->

            <div class="col-md-4">
                <div class="service-item animated fadeInRight wow" data-wow-delay=".5s">
                    <i class=" ti-server"></i>
                    <div class="service-detail">
                        <h4>{{trans('landing.time_saving')}}</h4>
                        <p>Маш олон ажлийг хөнгөвчилж дээд түвшинд хийгдсэн систем.</p>
                    </div>
                    <!-- /service-detail -->
                </div>
                <!-- /service-item -->
            </div>
            <!-- /col -->
        </div>
        <!--end row -->

    </div>
</section>
<!-- END SERVICES -->

<!-- SCREENSHOTS -->
<section class="section bg-gray" id="features">
    <div class="container">

        <div class="row">
            <div class="col-sm-6">
                <div class="feature-detail">
                    <h2 class="title fadeIn animated wow" data-wow-delay=".1s">{{trans('landing.admin')}}</h2>
                    <p class="sub fadeIn animated wow" data-wow-delay=".2s">{{trans('landing.admin_description')}} </p>

                    <ul class="list-unstyled">
                        <li>
                            <i class=" ti-arrow-circle-right"></i> {{trans('landing.admin_section1')}}
                        </li>
                        <li>
                            <i class=" ti-arrow-circle-right"></i> {{trans('landing.admin_section2')}}
                        </li>
                        <li>
                            <i class=" ti-arrow-circle-right"></i> {{trans('landing.admin_section3')}}
                        </li>

                    </ul>

                    <a href="" class="btn btn-primary btn-rounded w-lg animated fadeInDown wow" data-wow-delay=".4s">{{trans('landing.contact_us')}}</a>
                </div>
            </div>

            <div class="col-sm-6">
                <img src="{{asset('/assets/landing/images/ss1.png')}}" class="img-fluid">
            </div>

        </div>
    </div>
</section>
<!-- END SCREENSHOTS -->

<!-- SCREENSHOTS -->
<section class="section" id="features1">
    <div class="container">

        <div class="row">

            <div class="col-md-5">
                <img src="{{asset('/assets/landing/images/ss3.png')}}" class="img-fluid screen-space">
            </div>

            <div class="col-md-6 ml-auto">
                <div class="feature-detail">
                    <h2 class="title fadeIn animated wow" data-wow-delay=".1s">{{trans('landing.reception')}}</h2>
                    <p class="sub fadeIn animated wow" data-wow-delay=".2s">{{trans('landing.reception_description')}} </p>

                    <ul class="list-unstyled">
                        <li>
                            <i class=" ti-arrow-circle-right"></i>{{trans('landing.reception_section1')}}
                        </li>
                        <li>
                            <i class=" ti-arrow-circle-right"></i>{{trans('landing.reception_section2')}}
                        </li>
                        <li>
                            <i class=" ti-arrow-circle-right"></i>{{trans('landing.reception_section3')}}
                        </li>

                    </ul>

                    <a href="" class="btn btn-primary btn-rounded w-lg animated fadeInDown wow" data-wow-delay=".4s">{{trans('landing.contact_us')}}</a>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="section bg-gray" id="features">
    <div class="container">

        <div class="row">
            <div class="col-sm-6">
                <div class="feature-detail">
                    <h2 class="title fadeIn animated wow" data-wow-delay=".1s">{{trans('landing.trainer')}}</h2>
                    <p class="sub fadeIn animated wow" data-wow-delay=".2s">{{trans('landing.trainer_description')}} </p>

                    <ul class="list-unstyled">
                        <li>
                            <i class=" ti-arrow-circle-right"></i> {{trans('landing.trainer_section1')}}
                        </li>
                        <li>
                            <i class=" ti-arrow-circle-right"></i> {{trans('landing.trainer_section2')}}
                        </li>
                        <li>
                            <i class=" ti-arrow-circle-right"></i> {{trans('landing.trainer_section3')}}
                        </li>

                    </ul>

                    <a href="" class="btn btn-primary btn-rounded w-lg animated fadeInDown wow" data-wow-delay=".4s">{{trans('landing.contact_us')}}</a>
                </div>
            </div>

            <div class="col-sm-6">
                <img src="{{asset('/assets/landing/images/ss4.png')}}" class="img-fluid">
            </div>

        </div>
    </div>
</section>
<section class="section" id="features1">
    <div class="container">

        <div class="row">

            <div class="col-md-5">
                <img src="{{asset('/assets/landing/images/tab2.png')}}" class="img-fluid screen-space">
            </div>

            <div class="col-md-6 ml-auto">
                <div class="feature-detail">
                    <h2 class="title fadeIn animated wow" data-wow-delay=".1s">{{trans('landing.member')}}</h2>
                    <p class="sub fadeIn animated wow" data-wow-delay=".2s">{{trans('landing.member_description')}} </p>

                    <ul class="list-unstyled">
                        <li>
                            <i class=" ti-arrow-circle-right"></i>{{trans('landing.member_section1')}}
                        </li>
                        <li>
                            <i class=" ti-arrow-circle-right"></i>{{trans('landing.member_section2')}}
                        </li>
                        <li>
                            <i class=" ti-arrow-circle-right"></i>{{trans('landing.member_section3')}}
                        </li>
                        <li>
                            <i class=" ti-arrow-circle-right"></i>{{trans('landing.trainer_section3')}}
                        </li>

                    </ul>

                    <a href="" class="btn btn-primary btn-rounded w-lg animated fadeInDown wow" data-wow-delay=".4s">{{trans('landing.contact_us')}}</a>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- END SCREENSHOTS -->
<!-- END SCREENSHOTS -->

<!-- HOME -->
<section class="fun-facts bg-img-2 parallax" data-stellar-background-ratio="0.5">
    <div class="bg-overlay"></div>
    <div class="container">

        <div class="row text-center">
            <div class="col-md-3 col-sm-3 facts">
                <i class="ti-pencil-alt"></i>
                <h1><span class="counter">12</span> </h1>
                <h4>Фитнесс ашиглаж байна</h4>
            </div>
            <!-- /facts-1 -->
            <div class="col-md-3 col-sm-3 facts">
                <i class="ti-timer"></i>
                <h1> <span class="counter">361</span> </h1>
                <h4>Ашигласан өдөр дунджаар</h4>
            </div>
            <!-- /facts-2 -->
            <div class="col-md-3 col-sm-3 facts">
                <i class="ti-briefcase"></i>
                <h1 class="counter">94</h1>
                <h4> ажилтан</h4>
            </div>
            <!-- /facts-3 -->
            <div class="col-md-3 col-sm-3 facts">
                <i class=" ti-user"></i>
                <h1 class="counter">532</h1>
                <h4>Нийт гишүүд</h4>
            </div>
            <!-- /facts-4 -->
        </div>
    </div>
</section>
<!-- END HOME -->

<!-- PRICING -->
<section class="section" id="pricing">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="title zoomIn animated wow" data-wow-delay=".1s">Системийн үнэ</h1>
                <p class="sub-title zoomIn animated wow" data-wow-delay=".2s">Хямд олон үйлдэл таньд хүрж байна. </p>
            </div>
        </div>
        <!-- end row -->

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">

                    <!-- Pricing Item -->
                    <div class="col-md-4">
                        <div class="pricing-item animated fadeInLeft wow" data-wow-delay=".3s">
                            <div class="pricing-item-inner">
                                <div class="pricing-wrap">

                                    <div class="pricing-num pricing-num-pink">
                                        <sup>₮</sup>60К
                                    </div>
                                    <div class="pr-per">
                                        1 сар
                                    </div>

                                    <!-- Pricing Title -->
                                    <div class="pricing-title">
                                        Удирдах Ажилтан
                                    </div>
                                    <!-- Pricing Features -->
                                    <div class="pricing-features">
                                        <ul class="sf-list pr-list">
                                            <li>Үнэ хямд </li>
                                            <li>График</li>
                                            <li>Бүхий л мэдээлэл</li>
                                            <li>Ажилтны мэдэлээл</li>

                                        </ul>
                                    </div>

                                    <!-- Button -->
                                    <div class="pr-button">
                                        <a href="" class="btn btn-primary btn-rnd">БҮРТГҮҮЛЭХ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Pricing Item -->

                    <!-- Pricing Item -->
                    <div class="col-md-4">
                        <div class="pricing-item main animated fadeInLeft wow" data-wow-delay=".5s">
                            <div class="ribbon"><span>АЛДАРТАЙ</span></div>
                            <div class="pricing-item-inner">
                                <div class="pricing-wrap">

                                    <div class="pricing-num">
                                        <sup>₮</sup>60К
                                    </div>
                                    <div class="pr-per">
                                        1 сар
                                    </div>

                                    <!-- Pricing Title -->
                                    <div class="pricing-title">
                                        Ня-Бо хэсэг
                                    </div>
                                    <!-- Pricing Features -->
                                    <div class="pricing-features">
                                        <ul class="sf-list pr-list">
                                            <li>Бүхий л ня-бо хэсэг орсон </li>
                                            <li>Маш олон ажил хөнгөвчилнө</li>
                                            <li>График</li>
                                            <li>Цаг хугацааг хэмнэнэ</li>

                                        </ul>
                                    </div>
                                    <!-- Button -->
                                    <div class="pr-button">
                                        <a href="" class="btn btn-primary btn-rnd">БҮРТГҮҮЛЭХ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Pricing Item -->

                    <!-- Pricing Item -->
                    <div class="col-md-4">
                        <div class="pricing-item animated fadeInLeft wow" data-wow-delay=".7s">
                            <div class="pricing-item-inner">
                                <div class="pricing-wrap">

                                    <div class="pricing-num pricing-num-yellow">
                                        <sup>₮</sup>110К
                                    </div>
                                    <div class="pr-per">
                                        1 сар
                                    </div>

                                    <!-- Pricing Title -->
                                    <div class="pricing-title">
                                        DOUBLE багц
                                    </div>
                                    <!-- Pricing Features -->
                                    <div class="pricing-features">
                                        <ul class="sf-list pr-list">
                                            <li>2 хэсгийг багтаасан</li>
                                            <li>Хямд </li>
                                            <li>Бүрэн хэмжээний дата</li>
                                            <li>Нэмэлт дата график</li>

                                        </ul>
                                    </div>
                                    <!-- Button -->
                                    <div class="pr-button">
                                        <a href="" class="btn btn-primary btn-rnd">БҮРТГҮҮЛЭХ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Pricing Item -->

                </div>
            </div>
        </div>
    </div>
</section>

<!-- END PRICING -->

<!-- FAQ -->
<section class="section bg-gray" id="faq">
    <div class="container">

        <div class="row">
            <div class="col-sm-12 text-center">
                <h1 class="title zoomIn animated wow" data-wow-delay=".1s">BODYGRAM</h1>
                <p class="sub-title zoomIn animated wow" data-wow-delay=".2s">Монгол улсыг илүү мэдээллээр хангаж ажлыг хурдан маш үр дүнтэй болгох. </p>
            </div>
        </div>
        <!-- end row -->

        <div class="row justify-content-center">
            <div class="col-md-5">
                <!-- Question/Answer -->
                <div class="animated fadeInLeft wow" data-wow-delay=".1s">
                    <h4 class="question" data-wow-delay=".1s">Яагаад BODYGRAM гэж?</h4>
                    <p class="answer">BODYGRAM нь таны фитнесс-д хэрэгтэй бүхий мэдээллийг автоматаар график болгон харуулж дараагын шийдлээ зөв гаргахад туслах бөгөөд дээд төвшинд хийгдсэн багц үйлдэлтэй систем юм.</p>
                </div>

                <!-- Question/Answer -->
                <div class="animated fadeInLeft wow" data-wow-delay=".3s">
                    <h4 class="question">Бусдаас ямар ялгаатай?</h4>
                    <p class="answer m-b-0">Таньд хэрэгтэй гэсэн мэдээлэл болгоныг таньд хүргэж үнэгүй зар сурталчилгаа.</p>
                </div>

            </div>
            <!--/col-md-5 -->

            <div class="col-md-5">
                <!-- Question/Answer -->
                <div class="animated fadeInRight wow" data-wow-delay=".2s">
                    <h4 class="question">Системийг ашигласнаар?</h4>
                    <p class="answer">Маш их цаг мөнгө хэмнэхээс гадна таны ширээний алтан хамтрагч байх болно.</p>
                </div>

                <!-- Question/Answer -->
                <div class="animated fadeInRight wow" data-wow-delay=".4s">
                    <h4 class="question">Яаж захиалах вэ?</h4>
                    <p class="answer m-b-0">Та захиалахыг хүссэг багцаа сонгоход л таньд BODYGRAM хүрэх юм.</p>
                </div>

            </div>
            <!--/col-md-5-->
        </div>

    </div>
</section>

<!-- END FAQ -->

<footer class="footer bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p class="copyright">2017 © BODYGRAM.</p>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</footer>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('/assets/landing/js/jquery.min.js')}}"></script>
<script src="{{asset('/assets/landing/js/popper.min.js')}}"></script>
<script src="{{asset('/assets/landing/js/bootstrap.min.js')}}"></script>
<!-- Jquery easing -->
<script type="text/javascript" src="{{asset('/assets/landing/js/jquery.easing.1.3.min.js')}}"></script>
<script src="{{asset('/assets/landing/js/SmoothScroll.js')}}"></script>
<script src="{{asset('/assets/landing/js/wow.min.js')}}"></script>
<script src="{{asset('/assets/landing/js/jquery.waypoints.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/landing/js/jquery.counterup.min.js')}}" type="text/javascript"></script>

<!--common script for all pages-->
<script src="{{asset('/assets/landing/js/jquery.app.js')}}"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>

</body>

</html>