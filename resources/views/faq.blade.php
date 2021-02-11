<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ env("APP_NAME","") }}</title>
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('/app/css/common_page.css') }}"/>
        <link rel="stylesheet" href="{{ asset('/app/css/font-awesome.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('/app/css/venobox.css') }}"/>
    </head>
<body class="bgDark">
<div id="app" class="otrComponent">
<header class="appHeader">
    <a href="{{ url('/dashboard') }}" class="app_header_logo"><img src="{{asset('/app/images/icons/logo-white.png')}}" alt="Persistent & Share Cart" /></a>
  <ul class="cstNav">
      <li class="nav_items"><a href="{{ url('/faq') }}">FAQ</a></li>
      <li class="nav_items"><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
  </ul>
</header>
<div class="cstContainer">
<div class="faq_box">  
        <div class="rp_accord_main_wrapper">
            <div class="rp_accord_box_wrapper">
                <div class="card-body">
                    <h4 class="card-title">Frequently Asked Questions</h4>              
                    <ul class="accordion" id="accordion">
                        <li class="accordion__item is-open">
                            <div class="accordion__link js-accordion-link"><span class="acTitle">How to disable default image zoom option of Shopify theme?</span></div>
                            <ul class="accordion__submenu js-accordion-submenu" style="display: none;">
                                <li class="accordion__submenu-item">
                                    Go to online store >> Choose theme, on which you want to disable product image zoom option and click on "Customize" button > find "Products page" on the top left side
                                    <a href="{{ asset('/app/images/thumbnails/theme_1.png') }}" class="venobox info" data-title="PORTFOLIO TITTLE" data-gall="gall12"><img src="{{ asset('/app/images/thumbnails/theme_1.png') }}" alt="vp_img"></a>
                                    >> then open "products page" >> "Enable image zoom" and unchecked the box to disable default setting. then "save" changes.
                                    <a href="{{ asset('/app/images/thumbnails/theme_2.png') }}" class="venobox info" data-title="PORTFOLIO TITTLE" data-gall="gall12"><img src="{{ asset('/app/images/thumbnails/theme_2.png') }}" alt="vp_img"></a>
                                </li>
                            </ul>
                        </li>
                         <li class="accordion__item">
                            <div class="accordion__link js-accordion-link"><span class="acTitle">On which theme this app is compatible with?</span></div>
                            <ul class="accordion__submenu js-accordion-submenu" style="display: none;">
                                <li class="accordion__submenu-item">
                                    This app is compatible with the following themes- Debut, Brooklyn and Supply.
                                    <div class="faq__img"></div>
                                </li>
                            </ul>
                        </li>
                        <li class="accordion__item">
                            <div class="accordion__link js-accordion-link"><span class="acTitle">How to Increase Image Quality?</span></div>
                            <ul class="accordion__submenu js-accordion-submenu" style="display: none;">
                                <li class="accordion__submenu-item">
                                    Go to online store >> Choose theme, on which you want to Increase product image Quality and click on "Action" then "Edit code"
                                    <a href="{{ asset('/app/images/thumbnails/theme_6.png') }}" class="venobox info" data-title="PORTFOLIO TITTLE" data-gall="gall12"><img src="{{ asset('/app/images/thumbnails/theme_6.png') }}" alt="vp_img"></a>
                                    >> then you will see "Snippets" on your >> go to "media.liquid"
                                    <a href="{{ asset('/app/images/thumbnails/theme_5.png') }}" class="venobox info" data-title="PORTFOLIO TITTLE" data-gall="gall12"><img src="{{ asset('/app/images/thumbnails/theme_5.png') }}" alt="vp_img"></a>
                                    >>In the "media.liquid" find first Tag "img" after that replace img_url value like: 1296x1296 (big size)
                                    <a href="{{ asset('/app/images/thumbnails/theme_4.png') }}" class="venobox info" data-title="PORTFOLIO TITTLE" data-gall="gall12"><img src="{{ asset('/app/images/thumbnails/theme_4.png') }}" alt="vp_img"></a>
                                </li>
                            </ul>
                        </li>
                        <li class="accordion__item">
                            <div class="accordion__link js-accordion-link"><span class="acTitle">How does the zoom in & zoom-out work on mobile?<span></div>
                            <ul class="accordion__submenu js-accordion-submenu" style="display: none;">
                                <li class="accordion__submenu-item">
                                    It is as simple as work on other devices. Just click/pinch on the image to display on the full screen.
                                </li>
                            </ul>
                        </li>
                        <li class="accordion__item">
                            <div class="accordion__link js-accordion-link"><span class="acTitle">How to clean up our app code from your theme before Uninstall the app?</span></div>
                            <ul class="accordion__submenu js-accordion-submenu" style="display: none;">
                                <li class="accordion__submenu-item">
                                    Go to online store >> Choose theme, from which you want to clean up our app code and click on "Action" then "Edit code"
                                    <a href="{{ asset('/app/images/thumbnails/theme_6.png') }}" class="venobox info" data-title="PORTFOLIO TITTLE" data-gall="gall12"><img src="{{ asset('/app/images/thumbnails/theme_6.png') }}" alt="vp_img"></a>
                                    >> then go to "Layout" option >> "Theme.liquid" >> then open file and find below
                                    "{% include 'product_pinch_zoom' %}"
                                    then delete this line and save page
                                    <a href="{{ asset('/app/images/thumbnails/theme_7.png') }}" class="venobox info" data-title="PORTFOLIO TITTLE" data-gall="gall12"><img src="{{ asset('/app/images/thumbnails/theme_7.png') }}" alt="vp_img"></a>
                                    >> then go to "Snippets" option >> Find "product_pinch_zoom.liquid" and click on "Delete file"
                                    <a href="{{ asset('/app/images/thumbnails/theme_8.png') }}" class="venobox info" data-title="PORTFOLIO TITTLE" data-gall="gall12"><img src="{{ asset('/app/images/thumbnails/theme_8.png') }}" alt="vp_img"></a>
                                </li>
                            </ul>
                        </li>
                        <li class="accordion__item">
                            <div class="accordion__link js-accordion-link"><span class="acTitle">How to clean up our app code automatically from your theme before Uninstall the app??</span></div>
                            <ul class="accordion__submenu js-accordion-submenu" style="display: none;">
                                <li class="accordion__submenu-item">
                                    It's simple process. Go to Dashboard--> App Setup Menu--> Clean App Code--> Click on Clean Code button then It will remove our app code from your theme. If you need any help, please contact us at support@hubifyapps.com
                                    <a href="{{ asset('/app/images/thumbnails/theme_9.png') }}" class="venobox info" data-title="PORTFOLIO TITTLE" data-gall="gall12"><img src="{{ asset('/app/images/thumbnails/theme_9.png') }}" alt="vp_img"></a>
                                    <div class="faq__img"></div>
                                </li>
                            </ul>
                        </li>


                        <li class="accordion__item">
                            <div class="accordion__link js-accordion-link"><span class="acTitle">Does Zoom Magnifier work with product variants?</span></div>
                            <ul class="accordion__submenu js-accordion-submenu" style="display: none;">
                                <li class="accordion__submenu-item">
                                    Yes, Zoom Magnifier works with product variant images as per the customer selection.
                                    <div class="faq__img"></div>
                                </li>
                            </ul>
                        </li>
                        <li class="accordion__item">
                            <div class="accordion__link js-accordion-link"><span class="acTitle">Can I disable the Zoom Magnifier feature?</span></div>
                            <ul class="accordion__submenu js-accordion-submenu" style="display: none;">
                                <li class="accordion__submenu-item">
                                    Yes, you can enable-disable Zoom Magnifier storefront setting from the dashboard--> Go to App Setup--> Step 2 enable-disable setting as per your preferen.
                                    <div class="faq__img"></div>
                                </li>
                            </ul>
                        </li>
                        <li class="accordion__item">
                            <div class="accordion__link js-accordion-link"><span class="acTitle">How do I uninstall the App?</span></div>
                            <ul class="accordion__submenu js-accordion-submenu" style="display: none;">
                                <li class="accordion__submenu-item">
                                    Just simple, go to your App store and uninstall the App.
                                    <div class="faq__img"></div>
                                </li>
                            </ul>
                        </li>
                        <li class="accordion__item">
                            <div class="accordion__link js-accordion-link"><span class="acTitle">Can I get support from you directly?</span></div>
                            <ul class="accordion__submenu js-accordion-submenu" style="display: none;">
                                <li class="accordion__submenu-item">
                                    Yes, Just email us at support@hubifyapps.com and our team will help you with any queries like App installation, set up to match your theme, customisation, and troubleshooting any issues.
                                    <div class="faq__img"></div>
                                </li>
                            </ul>
                        </li>
                        <li class="accordion__item">
                            <div class="accordion__link js-accordion-link"><span class="acTitle">How much does this app cost?</span></div>
                            <ul class="accordion__submenu js-accordion-submenu" style="display: none;">
                                <li class="accordion__submenu-item">
                                    It is completely free for now. Just install it and utilise all amazing features.
                                    <div class="faq__img"></div>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
         </div>
 </div>
</div>
<footer class="cstFt">
    <a href="{{ url('faq') }}">FAQ</a>&nbsp;
    <a href="{{ url('privacy-policy') }}">Privacy Policy</a> | © {{ date("Y") }} {{ env("APP_NAME","") }}, All rights reserved</p>
</footer>
    <script type="text/javascript" src="{{ asset('/app/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/app/js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/app/js/venobox.js') }}"></script>
    <script>
        /* 09. VENOBOX JS */
        $('.venobox').venobox({
            numeratio: true,
            titleattr: 'data-title',
            titlePosition: 'top',
            spinner: 'wandering-cubes',
            spinColor: '#007bff'
        });
    </script>
</body>
</html>