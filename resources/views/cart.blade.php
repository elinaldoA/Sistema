<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
    <title>Sistema EA</title>
    <meta name="description" content="We are a tech oriented store with the best deals and products." />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="robots" content="follow, all" />

    <link rel="preconnect" href="https://images.jumpseller.com">
    <link rel="preconnect" href="https://cdnx.jumpseller.com">
    <link rel="preconnect" href="https://assets.jumpseller.com">

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />



    <!-- Facebook Meta tags for Product -->
    <meta property="fb:app_id" content="283643215104248" />

    <meta property="og:title" content="Bootstrap" />
    <meta property="og:type" content="website" />
    <meta property="og:image"
        content="https://images.jumpseller.com/store/bootstrap/logo/logo-bootstrap.jpg?1438701518" />


    <meta property="og:description" content="We are a tech oriented store with the best deals and products." />
    <meta property="og:url" content="https://bootstrap.jumpseller.com/cart" />
    <meta property="og:site_name" content="Bootstrap" />
    <meta name="twitter:card" content="summary" />


    <meta property="og:locale" content="en" />

    <meta property="og:locale:alternate" content="es_CL" />

    <meta property="og:locale:alternate" content="es_CO" />

    <meta property="og:locale:alternate" content="pt_BR" />

    <meta property="og:locale:alternate" content="pt_PT" />

    <meta property="og:locale:alternate" content="es_MX" />

    <meta property="og:locale:alternate" content="es" />





    <link rel="alternate" hreflang="en" href="https://bootstrap.jumpseller.com/cart" />

    <link rel="alternate" hreflang="es-CL" href="https://bootstrap.jumpseller.com/cl/cart" />

    <link rel="alternate" hreflang="es-CO" href="https://bootstrap.jumpseller.com/co/cart" />

    <link rel="alternate" hreflang="pt-BR" href="https://bootstrap.jumpseller.com/br/cart" />

    <link rel="alternate" hreflang="pt-PT" href="https://bootstrap.jumpseller.com/pt/cart" />

    <link rel="alternate" hreflang="es-MX" href="https://bootstrap.jumpseller.com/mx/cart" />

    <link rel="alternate" hreflang="es" href="https://bootstrap.jumpseller.com/es/cart" />



    <link rel="canonical" href="https://bootstrap.jumpseller.com/cart">

    <script src="//assets.jumpseller.com/public/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://assets.jumpseller.com/store/bootstrap/themes/607236/app.css?1687821175" />
    <link rel="stylesheet" type="text/css"
        href="https://assets.jumpseller.com/store/bootstrap/themes/607236/color_pickers.min.css?1687821175" />

    <script type="application/ld+json">
[
  {
    "@context": "http://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [

        {
        "@type": "ListItem",
        "position": 1,
        "item": {
        "name": "Home",
        "@id": "/"
        }
        }
        ,

        {
        "@type": "ListItem",
        "position": 2,
        "item": {
        "name": "Cart"
        }
        }
    ]
  },
  {
    "@context": "http://schema.org/"

  }]
  </script>
    <!-- Autocomplete search -->
    <script src="//assets.jumpseller.com/public/autocomplete/algolia-autocomplete@1.7.1.js"></script>
    <script src="//assets.jumpseller.com/public/autocomplete/jumpseller-autocomplete@1.0.0.min.js"
        data-suggest-categories="false" defer="defer"></script>
    <script>
        // Listener for swatch clicks when product block swatches are enabled
        function updateCarouselFromSwatch(target) {
            const value = $(target).val(); // product option value id
            const block = $(target).closest('.product-block');
            if (block.find('.product-block-carousel').length === 0) return;

            // the owl-carousel library duplicates items when it is set to loop. This code updates all the duplicates inside the nearest carousel.
            const stage = $(target).closest('.owl-carousel .owl-stage');
            const productid = block.attr('data-productid');
            const blocks = stage.length === 0 ? block : stage.find(`.product-block[data-productid="${productid}"]`);

            // When we click on the same swatch option, do nothing.
            // When there is no variant image, show the fallback product image.
            // Use bootstrap carousel or fallback to just setting active class and toggle with css
            blocks.each(function() {
                const carousel = $(this).find('.product-block-carousel');
                const variant = carousel.find(`[data-color-option-value="${value}"]`);
                const fallback = carousel.find('.carousel-default-item');
                const item = variant.length === 0 ? fallback : variant;

                if (carousel.carousel) {
                    carousel.carousel(item.first().index());
                } else {
                    carousel.find('.active').removeClass('active');
                    item.first().addClass('active');
                }
            });
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Open+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Open+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: Open Sans !important;
        }

        .page-header,
        h2 {
            font-family: Open Sans !important;
        }

        .navbar-brand,
        .text-logo {
            font-family: Open Sans !important;
        }

        p,
        .caption h4,
        label,
        table,
        .panel,
        #contactpage>h2.success,
        #contactpage h2.error {
            font-size: 14px !important;
        }

        h2 {
            font-size: 30px !important;
        }

        .navbar-brand,
        .text-logo {
            font-size: 18px !important;
        }

        .navbar-left a {
            font-size: 14px !important;
        }
    </style>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JBWEC7QQTS"></script>
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        // custom dimensions (for OKRs metrics)
        let custom_dimension_params = {
            custom_map: {}
        };

        custom_dimension_params['custom_map']['dimension1'] = 'theme';
        custom_dimension_params['theme'] = "bootstrap";

        // Send events to Jumpseller GA Account
        gtag('config',
            'G-JBWEC7QQTS',
            Object.assign({}, {
                'allow_enhanced_conversions': true
            }, custom_dimension_params));

        // Send events to Store Owner GA Account
        let order_items = null;
    </script>
    <script src="https://files.jumpseller.com/javascripts/dist/jumpseller-2.0.0.js" defer="defer"></script>
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div id='top_components'>
        <div id='component-1408630' class='theme-component show'><!-- Navigation -->
            <div class="fixed-top">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <a href="{{route('loja')}}" title="Bootstrap" class="navbar-brand">
                            Sistema<sup>EA</sup>
                        </a>
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                            data-target="#navbarContainer" aria-controls="navbarContainer" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarContainer">
                            <div class="jumpseller-autocomplete autocomplete-mobile mt-3"
                                data-panel="popover fixed-top">
                                <form class="d-lg-none d-md-block search_mini_form search_mini_form_mobile"
                                    method="get" action="/search">
                                    <div class="input-group mb-3">
                                        <input type="text" value="" name="q"
                                            class="form-control form-control-sm" onFocus="javascript:this.value=''"
                                            placeholder="Search for products">
                                        <button type="submit" class="btn btn-secondary"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <ul id="navbarContainerMobile" class="navbar-nav d-lg-none">
                                <li class="nav-item  ">
                                    <a href="{{route('loja')}}" title="Inicio" class="level-1 trsn nav-link">Inicio</a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/sobre" title="Sobre" class="level-1 trsn nav-link">Sobre</a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/blog" title="Blog" class="level-1 trsn nav-link">Blog</a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/contato" title="Contato" class="level-1 trsn nav-link">Contato</a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav float-right nav-top">

                                <li class="active">
                                    <a id="cart-link" href="}}" class="trsn nav-link" title="View/Edit Cart">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span id="nav-bar-cart"><span class="cart-size">0</span> Produto(s)
                                            | R$ 0,00</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/customer/login" id="login-link" class="trsn nav-link"
                                        title="Login toBootstrap">
                                        <i class="fas fa-user"></i>
                                        <span class="customer-name">
                                            Login
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div class="jumpseller-autocomplete autocomplete-desktop" data-panel="popover fixed-top">
                                <form class="navbar-form float-right form-inline d-none d-lg-flex search_mini_form"
                                    method="get" action="/search">
                                    <input type="text" value="" name="q"
                                        class="form-control form-control-sm" onFocus="javascript:this.value=''"
                                        placeholder="Search for products">
                                    <button type="submit" class="btn btn-secondary btn-sm"><i
                                            class="fas fa-search"></i></button>
                                </form>
                            </div>
                            <ul class="social list-inline d-lg-none mt-3">

                            </ul>
                        </div>
                    </div>
                </nav>

                <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block">
                    <div class="container">
                        <div class="collapse navbar-collapse" id="navbarsContainer-2">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item  ">
                                    <a href="{{ route('loja') }}" title="Inicio"
                                        class="level-1 trsn nav-link">Inicio</a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/sobre" title="Sobre" class="level-1 trsn nav-link">Sobre</a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/blog" title="Blog" class="level-1 trsn nav-link">Blog</a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/contato" title="Contato" class="level-1 trsn nav-link">Contato</a>
                                </li>
                            </ul>
                            <ul class="social navbar-toggler-right list-inline">

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Page Content -->

            <section class="container">
                <div class="row">
                    <section class="col-12 d-none d-md-block">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('loja') }}" class="trsn" title="Go back to Home">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span>Carrinho</span>
                            </li>
                        </ol>
                    </section>
                </div>
            </section>


            <style>
                .navbar-dark,
                .navbar-dark .dropdown-menu {
                    background: rgba(52, 58, 64, 1);
                }

                .navbar-dark .nav-link,
                .navbar-dark .social a {
                    color: #FDFDFD !important;
                }

                .navbar-dark li:hover {
                    background: color-mix(in srgb, rgba(52, 58, 64, 1) 90%, #f1f1f1);
                }

                .navbar-light,
                .navbar-light .dropdown-menu {
                    background: rgba(248, 249, 250, 1);
                }

                .navbar-light li:hover {
                    background: color-mix(in srgb, rgba(248, 249, 250, 1) 90%, #090909);
                }

                .navbar-light .navbar-brand>h1,
                .navbar-light .navbar-brand>.text-logo,
                .navbar-light .nav-link,
                .navbar-light .navbar-collapse .social a {
                    color: #010101 !important;
                }

                .navbar-light .navbar-toggler {
                    border-color: color-mix(in srgb, rgba(248, 249, 250, 1) 80%, #090909);
                    color: color-mix(in srgb, rgba(248, 249, 250, 1) 10%, #090909)
                }
            </style>
        </div>
    </div>

    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-12">
                <h1 class="page-header">Adicionar ao carrinho</h1>
            </div>
        </div>
        <!-- /.row -->


        <div class="row">
            <section class="col-12">
                <div class="bg-info alert text-white">O carrinho de compras está vazio no momento. Você pode voltar e começar
                    adicionando produtos.</div>
                <a href="{{route('loja')}}" class="btn btn-link" title="&larr; Go back & Keep Shopping">&larr; Volte as compras</a>
            </section>
        </div>

    </div>

    <div id='bottom_components'>
        <div id='component-1408628' class='theme-component show'><!-- Footer -->
            <footer>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 order-2 order-md-1">
                            <p class="powered-by">&copy; 2023 Sistema<sup>EA</sup>. Todos os direitos reservados. <a
                                    href='#'
                                    title='Create Online Store' target='_blank' rel='nofollow'>Por Elinaldo Agostinho</a>.</p>
                        </div>
                        <div class="col-12 col-md-6 order-1 order-md-2">
                            <ul class="payment">

                                <li><span><img src="//assets.jumpseller.com/public/payment-logos/visa.svg"
                                            alt="Visa" height="30" width="56"></span></li>
                                <li><span><img src="//assets.jumpseller.com/public/payment-logos/mastercard.svg"
                                            alt="Mastercard" height="30" width="56"></span></li>
                                <li><span><img src="//assets.jumpseller.com/public/payment-logos/americanexpress.svg"
                                            alt="American Express" height="30" width="56"></span></li>
                                <li><span><img src="//assets.jumpseller.com/public/payment-logos/paypal.svg"
                                            alt="Paypal" height="30" width="56"></span></li>
                                <li><span><img src="//assets.jumpseller.com/public/payment-logos/mercadopago.svg"
                                            alt="MercadoPago" height="30" width="56"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <style>
                footer {
                    background: rgba(255, 255, 255, 1) !important;
                }

                footer p {
                    color: #010101 !important;
                }
            </style>
        </div>
    </div>
    <!-- /.container -->

    <!-- Css -->
    <link rel="stylesheet" href="//assets.jumpseller.com/public/fontawesome/5.15.4/all.css">


    <!-- Bootstrap Core JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha256-98vAGjEDGN79TjHkYWVD4s87rvWkdWLHPs5MC3FvFX4=" crossorigin="anonymous"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha256-VsEqElsCHSGmnmHXGQzvoWjWwoznFSZc6hs7ARLRacQ=" crossorigin="anonymous"></script>

    <!-- Script to Activate Tooltips -->
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
            $('.carousel').carousel()
        })
    </script>

    <script src="//cdn.jsdelivr.net/bootstrap.filestyle/1.1.0/js/bootstrap-filestyle.min.js"
        integrity="sha256-iKHE0eu0gUetTeiNYPYcZB+Ho39/1MYph+rhPazLhGQ=" crossorigin="anonymous"></script>
    <script src="https://assets.jumpseller.com/store/bootstrap/themes/607236/main.js?1687821175"></script>

</body>

</html>
