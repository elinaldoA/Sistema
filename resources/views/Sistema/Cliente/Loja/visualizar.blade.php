<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->

<head>
    <title>Loja</title>
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
    <meta property="og:url" content="https://bootstrap.jumpseller.com/" />
    <meta property="og:site_name" content="Bootstrap" />
    <meta name="twitter:card" content="summary" />


    <meta property="og:locale" content="en" />

    <meta property="og:locale:alternate" content="es_CL" />

    <meta property="og:locale:alternate" content="es_CO" />

    <meta property="og:locale:alternate" content="pt_BR" />

    <meta property="og:locale:alternate" content="pt_PT" />

    <meta property="og:locale:alternate" content="es_MX" />

    <meta property="og:locale:alternate" content="es" />

    <link rel="canonical" href="https://bootstrap.jumpseller.com/">


    <script src="//assets.jumpseller.com/public/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://assets.jumpseller.com/store/bootstrap/themes/607236/app.css?1687821175" />
    <link rel="stylesheet" type="text/css"
        href="https://assets.jumpseller.com/store/bootstrap/themes/607236/color_pickers.min.css?1687821175" />


    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>


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
        "name": "Home"
        }
        }


    ]
  },
  {
    "@context": "http://schema.org/"
    ,

        "@type": "WebSite",
        "url": "https://bootstrap.jumpseller.com",
        "potentialAction": {
          "@type": "SearchAction",
          "target": {
            "@type": "EntryPoint",
            "urlTemplate": "https://bootstrap.jumpseller.com/search/{search_term_string}"
          },
          "query-input": "required name=search_term_string"
        }

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
                        <a href="{{ route('loja') }}" title="Sistema<sup>EA</sup>" class="navbar-brand">
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
                                            placeholder="Pesquisar produtos">
                                        <button type="submit" class="btn btn-secondary"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <ul id="navbarContainerMobile" class="navbar-nav d-lg-none">
                                <li class="nav-item  active">
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
                            <ul class="nav navbar-nav float-right nav-top">
                                <li>
                                    <a id="cart-link" href="{{ route('cart') }}" class="trsn nav-link"
                                        title="View/Edit Cart">
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
                                        placeholder="Pesquisar produtos">
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
                                <li class="nav-item  active">
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

    <div id='components'>
        <div id='component-1408633' class='theme-component show'>
            <div class="container-fluid px-0  mb-md-5 mb-4">
                <div class="component_slider" id="component_slider-1408633">
                    <div class="component_slider-1408633 owl-carousel">
                        <div class="item">
                            <div class="layer" style="background-color: #29123F; opacity: 0.2;"></div>
                            <div class="carousel-info">
                                <div class="carousel-info-inner px-md-0 px-4">
                                    <h2>Titulo</h2>
                                    <a href="" class="btn btn-primary" title="Add your own Sliders">
                                        conteúdo
                                    </a>
                                </div>
                            </div>
                            <img src="//assets.jumpseller.com/public/placeholder/themes/bootstrap/slider-demo.jpg"
                                alt="Welcome to Bootstrap">
                        </div>
                        <div class="item">
                            <div class="layer" style="background-color: #29123F; opacity: 0.2;"></div>
                            <div class="carousel-info">
                                <div class="carousel-info-inner px-md-0 px-4">
                                    <h2>Titulo 2</h2>
                                    <a href="" class="btn btn-primary" title="Add your own Sliders">
                                        Conteúdo 2
                                    </a>
                                </div>
                            </div>
                            <img src="//assets.jumpseller.com/public/placeholder/themes/bootstrap/slider-demo-2.jpg"
                                alt="Welcome to Bootstrap">
                        </div>

                    </div>
                </div>
            </div>

            <script>
                var autoHeight = $('.component_slider-1408633 .item').length != 1;
                $('.component_slider-1408633').owlCarousel({
                    items: 1,

                    loop: true,
                    dots: false,
                    margin: 0,
                    nav: true,
                    autoplay: true,

                    autoplayHoverPause: true,
                    navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"]
                })
            </script>
        </div>
        <div id='component-1408627' class='theme-component show'>
            <div id="featured-products-1408627" class="container">
                <!-- Products Section -->
                <div class="row ">
                    <div class="col-12">
                        <h2 class="page-header">Destaques</h2>
                    </div>
                    @forelse($produtos as $produto)
                        <!-- Featured Products -->
                        <div class="col-lg-3">
                            <div class="product-block" data-productid="224300">
                                <a href="{{ route('show', ['produto' => $produto->id]) }}">
                                    <img class="w-100 mb-3" src="/storage/image/{{ $produto->image }}" />
                                </a>
                                <div class="caption text-left">
                                    <h4><a
                                            href="{{ route('show', ['produto' => $produto->id]) }}">{{ $produto->nome }}</a>
                                    </h4>
                                    <div class="d-flex product-list-rating-container">
                                    </div>
                                    <div class="price-mob mb-2">
                                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div>
                            <div colspan="6">
                                <h4>Nenhum registro encontrado para listar</h4>
                            </div>
                        </div>
                    @endforelse
                </div>
                <nav aria-label="Navegação de página exemplo">
                    <ul class="pagination justify-content-center">
                        {!! $produtos->links() !!}
                    </ul>
                </nav>
                <!-- /.row -->
            </div>
        </div>
        <!--<div id='component-1408632' class='theme-component show'>
            <div id="latest-products-1408632" class="container">
                <div class="row ">
                    <div class="col-12">
                        <h2 class="page-header">Recentes</h2>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="product-block" data-productid="3514295">
                            <a href="#">
                                <img class="w-100 mb-3"
                                    src="" alt="-" />
                            </a>
                            <div class="caption text-left">
                                <h4><a href="#"></a></h4>
                                <div class="d-flex product-list-rating-container">
                                </div>
                                <div class="price-mob mb-2">
                                    R$
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!--<div id='component-1408626' class='theme-component show'>
            <div id="banners-1408626" class="container">
                <div class="banners row mx-n2 mb-md-5 mb-4">
                    <div class="col-12 col-md-4 my-3">
                        <a class="card border-0 shadow-sm trsn"
                            href="https://bootstrap.jumpseller.com/admin/themes/options/607236">
                            <img class="card-img-top"
                                src="//assets.jumpseller.com/public/placeholder/themes/bootstrap/placeholder-350x250.jpg"
                                alt="Add your banners">
                            <div class="card-body py-3 text-center">
                                <h6 class="mt-1">Add your banners</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 my-3">
                        <a class="card border-0 shadow-sm trsn"
                            href="https://bootstrap.jumpseller.com/admin/themes/options/607236">
                            <img class="card-img-top"
                                src="//assets.jumpseller.com/public/placeholder/themes/bootstrap/placeholder-350x250.jpg"
                                alt="Add your banners">
                            <div class="card-body py-3 text-center">
                                <h6 class="mt-1">Add your banners</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-4 my-3">
                        <a class="card border-0 shadow-sm trsn"
                            href="https://bootstrap.jumpseller.com/admin/themes/options/607236">
                            <img class="card-img-top"
                                src="//assets.jumpseller.com/public/placeholder/themes/bootstrap/placeholder-350x250.jpg"
                                alt="Add your banners">
                            <div class="card-body py-3 text-center">
                                <h6 class="mt-1">Add your banners</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <style>
                #component-1408626 .banners .card-body {
                    background-color: rgba(248, 249, 250, 1) !important;
                }

                #component-1408626 .banners .card-body h6 {
                    color: color-mix(in srgb, rgba(248, 249, 250, 1) 5%, #090909);
                }
            </style>
        </div>
        <div id='component-1408631' class='theme-component show'>
            <div id="latest-posts-1408631" class="container">
                <div class="blog_list row mb-md-5 mb-4 mx-n2 justify-content-center ">
                    <div class="col-12">
                        <h2 class="page-header">Blog</h2>
                    </div>
                    <div class="col-md-4 mb-4">
                        <a href="https://bootstrap.jumpseller.com/dualshock-4" title="The brand new Dualshock 4">
                            <div class="card shadow-sm">
                                <img class="img-fluid"
                                    src="https://cdnx.jumpseller.com/bootstrap/image/937208/thumb/550/280?1479218165"
                                    srcset="https://cdnx.jumpseller.com/bootstrap/image/937208/thumb/550/280?1479218165 1x,https://cdnx.jumpseller.com/bootstrap/image/937208/thumb/1100/560?1479218165 2x"
                                    alt="The brand new Dualshock 4" />
                                <div class="card-body">
                                    <span class="mb-0 trsn">The brand new Dualshock 4</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-4">
                        <a href="https://bootstrap.jumpseller.com/samsung-smartphones" title="Samsung Smartphones">
                            <div class="card shadow-sm">
                                <img class="img-fluid"
                                    src="https://cdnx.jumpseller.com/bootstrap/image/937252/thumb/550/280?1479219826"
                                    srcset="https://cdnx.jumpseller.com/bootstrap/image/937252/thumb/550/280?1479219826 1x,https://cdnx.jumpseller.com/bootstrap/image/937252/thumb/1100/560?1479219826 2x"
                                    alt="Samsung Smartphones" />
                                <div class="card-body">
                                    <span class="mb-0 trsn">Samsung Smartphones</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 text-center px-2">
                        <a href="https://bootstrap.jumpseller.com/blog" title="Blog"
                            class="btn btn-primary mt-3">Go to Blog</a>
                    </div>

                </div>

                <style>
                    #component-1408631 .blog_list .card {
                        border-color: #FFFFFF !important;
                    }

                    #component-1408631 .blog_list .card-body {
                        background-color: #FFFFFF !important;
                    }

                    #component-1408631 .blog_list .card-body span {
                        color: color-mix(in srgb, #FFFFFF 5%, #090909);
                    }

                    #component-1408631 .blog_list a:hover span {
                        color: color-mix(in srgb, #FFFFFF 50%, #090909);
                    }
                </style>

            </div>

        </div>
    </div>-->

        <div id='bottom_components'>
            <div id='component-1408628' class='theme-component show'><!-- Footer -->
                <footer>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-6 order-2 order-md-1">
                                <p class="powered-by">&copy; 2023 Sistema<sup>EA</sup>. Todos os direitos reservados.
                                    <a href='# title='Create Online Store' target='_blank' rel='nofollow'>Por
                                        Elinaldo
                                        Agostinho</a>.
                                </p>
                            </div>
                            <div class="col-12 col-md-6 order-1 order-md-2">
                                <ul class="payment">
                                    <li><span><img src="//assets.jumpseller.com/public/payment-logos/visa.svg"
                                                alt="Visa" height="30" width="56"></span></li>
                                    <li><span><img src="//assets.jumpseller.com/public/payment-logos/mastercard.svg"
                                                alt="Mastercard" height="30" width="56"></span></li>
                                    <li><span><img
                                                src="//assets.jumpseller.com/public/payment-logos/americanexpress.svg"
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
