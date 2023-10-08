<!DOCTYPE html>
<html lang="en">
    
    <head>
      <title>Mini Blog</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">
      <link rel="stylesheet" href="fonts/icomoon/style.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/magnific-popup.css">
      <link rel="stylesheet" href="css/jquery-ui.css">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="css/bootstrap-datepicker.css">
      <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
      <link rel="stylesheet" href="css/aos.css">
      <link rel="stylesheet" href="css/style.css">
      <script nonce="9cb6e2ff-401f-40d2-9886-2285b63d348b">(function(w,d){!function(a,b,c,d){a[c]=a[c]||{};a[c].executed=[];a.zaraz={deferred:[],listeners:[]};a.zaraz.q=[];a.zaraz._f=function(e){return async function(){var f=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:f})}};for(const g of["track","set","debug"])a.zaraz[g]=a.zaraz._f(g);a.zaraz.init=()=>{var h=b.getElementsByTagName(d)[0],i=b.createElement(d),j=b.getElementsByTagName("title")[0];j&&(a[c].t=b.getElementsByTagName("title")[0].text);a[c].x=Math.random();a[c].w=a.screen.width;a[c].h=a.screen.height;a[c].j=a.innerHeight;a[c].e=a.innerWidth;a[c].l=a.location.href;a[c].r=b.referrer;a[c].k=a.screen.colorDepth;a[c].n=b.characterSet;a[c].o=(new Date).getTimezoneOffset();if(a.dataLayer)for(const n of Object.entries(Object.entries(dataLayer).reduce(((o,p)=>({...o[1],...p[1]})),{})))zaraz.set(n[0],n[1],{scope:"page"});a[c].q=[];for(;a.zaraz.q.length;){const q=a.zaraz.q.shift();a[c].q.push(q)}i.defer=!0;for(const r of[localStorage,sessionStorage])Object.keys(r||{}).filter((t=>t.startsWith("_zaraz_"))).forEach((s=>{try{a[c]["z_"+s.slice(7)]=JSON.parse(r.getItem(s))}catch{a[c]["z_"+s.slice(7)]=r.getItem(s)}}));i.referrerPolicy="origin";i.src="../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(a[c])));h.parentNode.insertBefore(i,h)};["complete","interactive"].includes(b.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script>
   </head>
   <body>
      <div class="site-wrap">
         <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
               <div class="site-mobile-menu-close mt-3">
                  <span class="icon-close2 js-menu-toggle"></span>
               </div>
            </div>
            <div class="site-mobile-menu-body"></div>
         </div>
         <header class="site-navbar" role="banner">
            <div class="container-fluid">
               <div class="row align-items-center">
                  <div class="col-12 search-form-wrap js-search-form">
                     <form method="get" action="#">
                        <input type="text" id="s" class="form-control" placeholder="Search...">
                        <button class="search-btn" type="submit"><span class="icon-search"></span></button>
                     </form>
                  </div>
                  <div class="col-4 site-logo">
                     <a href="index-2.html" class="text-black h2 mb-0"><img src="{{url('/images/logo.png')}}" width="143px" alt="" srcset=""></a>
                  </div>
                  <div class="col-8 text-right">
                     <nav class="site-navigation" role="navigation">
                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                           <li><a href="/">Home</a></li>
                           <li><a href={{ route("register") }}>Register</a></li>
                           <li><a href={{ route("login") }}>Login</a></li>
                           <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
                        </ul>
                     </nav>
                     <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a>
                  </div>
               </div>
            </div>
         </header>


         @yield('content')




         <div class="site-footer">
            <div class="container">
               <div class="row mb-5">
                  <div class="col-md-4">
                     <h3 class="footer-heading mb-4">About Us</h3>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat reprehenderit magnam deleniti quasi saepe, consequatur atque sequi delectus dolore veritatis obcaecati quae, repellat eveniet omnis, voluptatem in. Soluta, eligendi, architecto.</p>
                  </div>
                  <div class="col-md-3 ml-auto">
                     <ul class="list-unstyled float-left mr-5">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Subscribes</a></li>
                     </ul>
                     <ul class="list-unstyled float-left">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Sports</a></li>
                        <li><a href="#">Nature</a></li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <div>
                        <h3 class="footer-heading mb-4">Connect With Us</h3>
                        <p>
                           <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                           <a href="#"><span class="icon-twitter p-2"></span></a>
                           <a href="#"><span class="icon-instagram p-2"></span></a>
                           <a href="#"><span class="icon-rss p-2"></span></a>
                           <a href="#"><span class="icon-envelope p-2"></span></a>
                        </p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 text-center">
                     <p>
                        Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>
                     </p>
                  </div>
               </div>
            </div>
         </div>

      </div>
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery-migrate-3.0.1.min.js"></script>
      <script src="js/jquery-ui.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/jquery.stellar.min.js"></script>
      <script src="js/jquery.countdown.min.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="js/bootstrap-datepicker.min.js"></script>
      <script src="js/aos.js"></script>
      <script src="js/main.js"></script>
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         
         gtag('config', 'UA-23581568-13');
      </script>
      <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"812eaff6a8cfb309","version":"2023.8.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
   </body>
</html>