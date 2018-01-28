<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />
    <meta name="description" content="Интернет-магазин женской одежды в восточном стиле. Платья, блузки, кимоно и домашняя одежда. Индивидуальный восточный гороскоп."/>
    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" type="image/x-icon"/>

    <?php Yii::app()->clientScript->registerScriptFile('/js/common.js?2', CClientScript::POS_HEAD) ?>
    <?php Yii::app()->clientScript->registerScriptFile('/js/magiczoom.js', CClientScript::POS_HEAD) ?>
    <?php Yii::app()->clientScript->registerScriptFile('/js/social-likes.min.js', CClientScript::POS_HEAD) ?>
    <?php Yii::app()->clientScript->registerScriptFile('/js/jquery_lazyload-1.9.3/jquery.lazyload.js', CClientScript::POS_HEAD) ?>
    <?php Yii::app()->clientScript->registerScriptFile('/js/bootstrap-filestyle.min.js', CClientScript::POS_HEAD) ?>

    <!-- blueprint CSS framework -->
<!--    <link rel="stylesheet" type="text/css" href="--><!--?php //echo Yii::app()->request->baseUrl; ?><!--/css/screen.css" media="screen, projection" />-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<!--    <link rel="stylesheet" type="text/css" href="--><!--?php //echo Yii::app()->request->baseUrl; ?><!--/css/site.css?32" />-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/auth.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/magiczoom.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/social-likes_flat.css" />
    <?php if (strpos(Yii::app()->request->pathInfo, 'blog')!==false):?>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/blog.css?4" />
    <?php endif;?>
    <?php if (strpos(Yii::app()->request->pathInfo, 'horoscope')!==false):?>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/horoscope.css?6" />
    <?php endif;?>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="/css/core.css?3">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="/css/shortcode/shortcodes.css?5">
    <!-- Theme main style -->
    <link rel="stylesheet" href="/css/style.css?16">
    <!-- Responsive css -->
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="/css/custom.css">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <script src="/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter37654655 = new Ya.Metrika({ id:37654655, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/37654655" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
    <!-- GoogleAnalytics -->
    <script async>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-55669537-1', 'auto');
        ga('require', 'displayfeatures');
        ga('send', 'pageview');
    </script>
    <!-- /GoogleAnalytics -->
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">Вы используете <strong>устаревший</strong> браузер. Пожалуйста <a href="http://browsehappy.com/">обновите Ваш браузер</a> для улучшения отображения сайта.</p>
<![endif]-->

<!-- Body main wrapper start -->
<div class="wrapper">
    <!-- Start Header Style -->
    <header id="htc__header" class="htc__header__area header--one">
        <div class="header__top__area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                        <div class="ht__header__top__left">
                            <div class="htc__contact">
                                <a href="/about/contact"><i class="icon-call-out icons"></i>Свяжитесь с нами: <?= Yii::app()->params['phone'] ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">
                        <div class="logo">
                            <a href="/">
                                <img src="/data/i/logo.png" alt="<?= Yii::app()->params['domain'] ?>">
                            </a>
                        </div>
                    </div>
                    <div id='auth_buttons' class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                        <ul class="ht__header__right">
                            <li><a href="/blog">Блог</a></li>
                            <li><a href="/horoscope">Гороскоп</a></li>
                            <?php if (!Yii::app()->user->isGuest):?>
                                <li><a href="/customer">Аккаунт</a></li>
                            <?php endif;?>
                            <?php if (Yii::app()->user->isGuest):?>
                            <li><a class="button button_big button_icon button_right" href="#" data-toggle="modal" data-target="#auth_form">
                                    <span class="button__title">Вход</span>
                            </li></a>
                            <?php else: ?>
                            <li><a class="button button_big button_icon button_right">
                                    <span class="button__title logout">Выход</span>
                            </li></a>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Mainmenu Area -->
        <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
            <div class="container-fluid">
                <div class="row">
                    <div class="menumenu__container clearfix">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3"></div>
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-5">
                            <nav class="main__menu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li><a href="/dress">Платья</a></li>
                                    <li><a href="/blouse">Блузки</a></li>
                                    <li><a href="/kimono">Кимоно</a></li>
                                    <li><a href="/other">Разное</a></li>
                                    <li><a href="/reviews">Отзывы</a></li>
                                </ul>
                            </nav>
                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li><a href="/dress">Платья</a></li>
                                        <li><a href="/blouse">Блузки</a></li>
                                        <li><a href="/kimono">Кимоно</a></li>
                                        <li><a href="/other">Разное</a></li>
                                        <li><a href="/reviews">Отзывы</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-4">
                            <div class="htc__shopping__cart">
                                <?php if(isset(Yii::app()->cart->currentCart) && Yii::app()->cart->currentCart->count > 0) :?>
                                    <a class="cart__menu"><i class="icon-handbag icons"></i></a>
                                <?php else:?>
                                    <i class="icon-handbag icons"></i>
                                <?php endif;?>
                                <?php if(isset(Yii::app()->cart->currentCart->count) && Yii::app()->cart->currentCart->count > 0):?>
                                    <a><span class="htc__qua"><?= Yii::app()->cart->currentCart->count; ?></span></a>
                                <?php endif?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area"></div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>
    <!-- End Header Area -->
    <body class="main">
    <div class="body__overlay"></div>
    <!-- Start Offset Wrapper -->
    <div class="offset__wrapper">
        <?php $this->renderPartial('application.views.site.cart._cart_main_popup'); ?>
    </div>
    <!-- End Offset Wrapper -->
    <div class="page">
        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
        <?php endif;?>
        <div class="content">
            <?php if(!Cart::isWholesale()):?>
                <?php $this->renderPartial('application.views.site._horoscope_popup'); ?>
            <?php endif;?>
            <?php echo $content; ?>
            <?php $this->renderPartial('application.views.site._parser'); ?>
        </div>
    </div><!-- page -->
    <div class="getprice">
        <a href="/site/price">Скачать опт. прайс</a>
    </div>

    <!-- Start Footer Area -->
    <footer id="htc__footer">
        <!-- Start Footer Widget -->
        <div class="footer__container bg__cat--1">
            <div class="container">
                <div class="row">
                    <!-- Start Single Footer Widget -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="footer">
                            <h2 class="title__line--2">О нас</h2>
                            <div class="ft__details">
                                <p>У нас вы сможете не просто купить платье, а создать свой собственный образ и наполнить его особым смыслом.
                                    Ассортимент нашего магазина постоянно обновляется и пополняется новыми моделями на любой вкус и цвет.
                                    В нашем магазине, Вы без труда выберете интересный подарок для Вашего любимого человека, подруги или члена Вашей семьи.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->
                    <!-- Start Single Footer Widget -->
                    <div class="col-md-3 col-sm-6 col-xs-12 xmt-40">
                        <div class="footer">
                            <h2 class="title__line--2">О нас</h2>
                            <div class="ft__inner">
                                <ul class="ft__list">
                                    <li><a href="/about/contact">Контакты</a></li>
                                    <li><a href="/about/wholesale">Оптом</a></li>
                                    <li><a href="/about/offer">Публичня оферта</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->
                    <!-- Start Single Footer Widget -->
                    <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                        <div class="footer">
                            <h2 class="title__line--2">Помощь</h2>
                            <div class="ft__inner">
                                <ul class="ft__list">
                                    <li><a href="/about/order">Как сделать заказ</a></li>
                                    <li><a href="/about/shipping">Информация о доставке</a></li>
                                    <li><a href="/about/payment">Способы оплаты</a></li>
                                    <li><a href="/about/refund">Возврат товара</a></li>
                                    <li><a href="/about/sizes">Как выбрать размер</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->
                    <!-- Start Single Footer Widget -->
                    <div class="col-md-3 col-sm-6 col-xs-12 xmt-40 smt-40">
                        <div class="footer">
                            <h2 class="title__line--2">Мы в социальных сетях</h2>
                            <div class="ft__inner">
                                <div class="ft__social__link">
                                    <ul class="social__link">
                                        <li><a href="<?=Yii::app()->params['vkontakteLink']?>" target="_blank"><i class="zmdi zmdi-vk"></i></a></li>

                                        <li><a href="<?=Yii::app()->params['instagramLink']?>" target="_blank"><i class="zmdi zmdi-instagram"></i></a></li>

                                        <li><a href="<?=Yii::app()->params['odnoklassnikiLink']?>" target="_blank"><i class="zmdi zmdi-odnoklassniki"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Footer Widget -->
                </div>
            </div>
        </div>
        <!-- End Footer Widget -->
        <!-- Start Copyright Area -->
        <div class="htc__copyright bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="copyright__inner">
                            <p>Copyright © 2014 - <?= date('Y');?> by <?php echo Yii::app()->params['domain']; ?>. Developed by <a href="<?php echo Yii::app()->params['developerSite']; ?>"><?php echo Yii::app()->params['developer']; ?></a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area -->
    </footer>

    <?php $this->renderPartial('application.views.site.auth._auth', array('modelAuth'=>new User('registration'))); ?>
    <!-- End Footer Style -->
</div>
<!-- Body main wrapper end -->

<!-- Placed js at the end of the document so the pages load faster -->

<!-- All js plugins included in this file. -->
<?php Yii::app()->clientScript->registerScriptFile('/js/plugins.js', CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/js/slick.min.js', CClientScript::POS_END) ?>
<?php Yii::app()->clientScript->registerScriptFile('/js/owl.carousel.min.js', CClientScript::POS_END) ?>

<!-- Google Map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmGmeot5jcjdaJTvfCmQPfzeoG_pABeWo"></script>
<script>
    // When the window has finished loading create our google map below
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 12,

            scrollwheel: false,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(23.7286, 90.3854), // New York

            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.
            styles:
                [ {
                    "featureType": "all",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "saturation": 36
                        },
                        {
                            "color": "#000000"
                        },
                        {
                            "lightness": 40
                        }
                    ]
                },
                    {
                        "featureType": "all",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 17
                            },
                            {
                                "weight": 1.2
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 29
                            },
                            {
                                "weight": 0.2
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 18
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 19
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#141516"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    }
                ]
        };

        // Get the HTML DOM element that will contain your map
        var mapElement = document.getElementById('googleMap');

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);

        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(23.7286, 90.3854),
            map: map,
            title: 'Ramble!',
            icon: 'images/icons/map.png',
            animation:google.maps.Animation.BOUNCE

        });
    }
</script>

<!-- Waypoints.min.js. -->
<?php Yii::app()->clientScript->registerScriptFile('/js/waypoints.min.js', CClientScript::POS_END) ?>
<!-- Main js file that contents all jQuery plugins activation. -->
<?php Yii::app()->clientScript->registerScriptFile('/js/main.js', CClientScript::POS_END) ?>

<script>
    $( "#auth_buttons" ).on( "click", ".logout", function() {
        $.ajax({
            url: "/site/logout",
            success: function( data ) {
                window.location.reload();
            }});
    });
</script>

<!-- Код тега ремаркетинга Google -->
<!--------------------------------------------------
С помощью тега ремаркетинга запрещается собирать информацию, по которой можно идентифицировать личность пользователя. Также запрещается размещать тег на страницах с контентом деликатного характера. Подробнее об этих требованиях и о настройке тега читайте на странице http://google.com/ads/remarketingsetup.
--------------------------------------------------->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 976913656;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/976913656/?guid=ON&amp;script=0"/>
    </div>
</noscript>
</body>

</html>
