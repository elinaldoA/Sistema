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
    <meta property="og:url" content="https://bootstrap.jumpseller.com/cart" />
    <meta property="og:site_name" content="Bootstrap" />
    <meta name="twitter:card" content="summary" />

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






        added_items = [{
            "item_id": {{ $produto->id }},
            "item_name": "{{ $produto->nome }}",
            "discount": 0.0,
            "item_brand": null,
            "price": {{ $produto->preco }},
            "quantity": 1
        }];
        // add_to_cart - an item was added to a cart for purchase
        gtag('event', 'add_to_cart', {
            currency: 'REAL',
            items: added_items,
            value: '{{ $produto->id }}'
        });
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
                        <a href="https://bootstrap.jumpseller.com" title="Bootstrap" class="navbar-brand">
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
                                <li class="nav-item  ">
                                    <a href="{{ route('loja') }}" title="Inicio"
                                        class="level-1 trsn nav-link">Inicio</a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/about-us" title="About Us" class="level-1 trsn nav-link">Sobre</a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/blog" title="Blog" class="level-1 trsn nav-link">Blog</a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/contact" title="Contact" class="level-1 trsn nav-link">Contato</a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav float-right nav-top">
                                <li class="active">
                                    <a id="cart-link" href="{{ route('cart.add', ['produto' => $produto]) }}"
                                        class="trsn nav-link" title="View/Edit Cart">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span id="nav-bar-cart"><span class="cart-size">1</span> Produto(s)
                                            | R$ {{ $produto->preco }}</span>
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
                                <li class="nav-item  ">
                                    <a href="{{ route('loja') }}" title="Inicio"
                                        class="level-1 trsn nav-link">Inicio</a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/about-us" title="About Us" class="level-1 trsn nav-link">Sobre</a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/blog" title="Blog" class="level-1 trsn nav-link">Blog</a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/contact" title="Contact" class="level-1 trsn nav-link">Contato</a>
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
                                <span>Adcionar ao Carrinho</span>
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
                <h1 class="page-header">Adicionar ao Carrinho</h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Cart Table -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <form id="cart-update-form" action="{{ route('cart.update', ['produto' => $produto]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th class="mob-hide"></th>
                                    <th class="mob-hide">Preço unitário</th>
                                    <th class="table-qty">Qt</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tr>
                                <td class="text-center mob-hide">
                                    <a href="{{ route('show', ['produto' => $produto]) }}" class="trsn" title="{{ $produto->nome }}">
                                        <img src="/storage/image/{{ $produto->image }}" width="100px"
                                            alt="{{ $produto->nome }}" title="{{ $produto->nome }}">
                                    </a>
                                </td>
                                <td>
                                    <h3>{{ $produto->nome }}</h3>
                                </td>
                                <td class="mob-hide">
                                    <span class="order-product-price">R${{ $produto->preco }}</span>
                                </td>
                                <td>
                                    <select class="select select-qty form-control" name="149506641" title="Qty"
                                        onchange="$('#cart-update-form').submit();return false;">

                                        <option value="1" selected="selected">1</option>

                                        <option value="2">2</option>

                                        <option value="3">3</option>

                                        <option value="4">4</option>

                                        <option value="5">5</option>

                                        <option value="6">6</option>

                                        <option value="7">7</option>

                                        <option value="8">8</option>

                                        <option value="9">9</option>

                                        <option value="10">10</option>

                                        <option value="11">11</option>

                                        <option value="12">12</option>

                                        <option value="13">13</option>

                                        <option value="14">14</option>

                                        <option value="15">15</option>

                                        <option value="16">16</option>

                                        <option value="17">17</option>

                                        <option value="18">18</option>

                                        <option value="19">19</option>

                                        <option value="20">20</option>

                                        <option value="21">21</option>

                                        <option value="22">22</option>

                                        <option value="23">23</option>

                                        <option value="24">24</option>

                                        <option value="25">25</option>

                                        <option value="26">26</option>

                                        <option value="27">27</option>

                                        <option value="28">28</option>

                                        <option value="29">29</option>

                                        <option value="30">30</option>

                                        <option value="31">31</option>

                                    </select>
                                </td>
                                <td>
                                    <span class="order-product-subtotal">R${{ $produto->preco }}</span>
                                </td>
                                <td clas="text-right">
                                    <a href="{{route('cart.remove', ['produto' => $produto])}}" class="cart-product-remove"
                                        title="Remove Product">
                                        <i class="fas fa-times-circle"></i>
                                    </a>
                                </td>
                            </tr>

                        </table>
                    </div>
                </form>
            </div>
            <!-- Cart Options -->
            <div class="col-lg-4 mb-4">
                <div class="row">

                    <div class="col-12 cart-estimate">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h2 class="card-title">Custo estimado de envio</h2>
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    <div id="estimate_shipping">
                                        <form action="/cart/estimate" accept-charset="UTF-8"
                                            id="estimate_shipping_form" autocomplete="off" method="post">
                                            <!-- Country -->
                                            <label for="estimate_shipping_country">País</label>
                                            <select name="estimate[country]" id="estimate_shipping_country"
                                                class="select">
                                                <option value=""></option>
                                                <option value="BR" selected="selected">Brasil</option>
                                            </select>
                                            <!-- Region -->
                                            <label for="estimate_shipping_region">Região</label>
                                            <select name="estimate[region]" id="estimate_shipping_region"
                                                class="select">
                                                <option value="00">Selecione</option>
                                                <option value="01">Acre</option>
                                                <option value="02">Alagoas</option>
                                                <option value="03">Amapá</option>
                                                <option value="04">Amazonas</option>
                                                <option value="05">Bahia</option>
                                                <option value="06">Ceará</option>
                                                <option value="08">Espírito Santo</option>
                                                <option value="07">Federal District</option>
                                                <option value="29">Goiás</option>
                                                <option value="13">Maranhão</option>
                                                <option value="14">Mato Grosso</option>
                                                <option value="11">Mato Grosso do Sul</option>
                                                <option value="15">Minas Gerais</option>
                                                <option value="16">Pará</option>
                                                <option value="17">Paraíba</option>
                                                <option value="18">Paraná</option>
                                                <option value="30">Pernambuco</option>
                                                <option value="20">Piauí</option>
                                                <option value="22">Rio Grande do Norte</option>
                                                <option value="23">Rio Grande do Sul</option>
                                                <option value="21">Rio de Janeiro</option>
                                                <option value="24">Rondônia</option>
                                                <option value="25">Roraima</option>
                                                <option value="26">Santa Catarina</option>
                                                <option value="27">São Paulo</option>
                                                <option value="28">Sergipe</option>
                                                <option value="31">Tocantins</option>
                                            </select>
                                            <!-- Municipality -->
                                            <label for="estimate_shipping_municipality"
                                                style="display: none;">Município</label>
                                            <select name="estimate[municipality]" id="estimate_shipping_municipality"
                                                class="select" style="display: none;"></select>
                                            <!-- Postal -->

                                            <!-- Other Fields -->
                                            <div class="estimate_shipping_buttons">
                                                <input id="estimate_shipping_button" type="submit"
                                                    value="Estimar frete e impostos" />
                                            </div>
                                        </form>

                                        <!-- Postal JS -->

                                        <!-- Municipality JS -->
                                        <!-- CSS pseudo elements on selects can't be hidden with Javascript -->
                                        <style>
                                            .municipality-hide:after,
                                            .municipality-hide:before {
                                                display: none;
                                            }
                                        </style>
                                        <script>
                                            // define new Rule for Municipality field
                                            const municipality_rule_source =
                                                '[{"dependency":"country","value":["AR","CL","CO","PE","MX","IE","GR"],"function":"municipality_change"}]';
                                            var municipality_rule = municipality_rule_source == 'null' ? {} : JSON.parse(municipality_rule_source)[0];

                                            // define array of functions to be called
                                            if (rules_functions === undefined) {
                                                var rules_functions = [];
                                            }
                                            rules_functions.push(municipality_rule['function']);

                                            // define Municipality Rule function
                                            window[municipality_rule['function']] = function() {
                                                if (municipality_rule['value'].indexOf($("select[name*=" + municipality_rule['dependency'] + "]").val()) > -
                                                    1) {
                                                    $('label[for=estimate_shipping_municipality], select#estimate_shipping_municipality').show();
                                                    $('select#estimate_shipping_municipality').parent('div').show();
                                                    $("select#estimate_shipping_municipality").removeClass("municipality-hide").parent().removeClass(
                                                        "municipality-hide");

                                                    if ($('#estimate_shipping_municipality').val() == null) {
                                                        Jumpseller.getMunicipalities('#estimate_shipping_municipality', $('select#estimate_shipping_region')
                                                            .val(), $('select#estimate_shipping_country').val(), null);
                                                    }
                                                } else {
                                                    $('label[for=estimate_shipping_municipality], select#estimate_shipping_municipality').hide();
                                                    $('select#estimate_shipping_municipality').parent('div').hide();
                                                    $("select#estimate_shipping_municipality").addClass("municipality-hide").parent().addClass(
                                                        "municipality-hide");
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cart-discount col-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h2 class="card-title">Tem um código de desconto?</h2>
                            </div>
                            <div class="card-body">
                                <form action="/cart/coupon" accept-charset="UTF-8" id="coupon_form"
                                    autocomplete="off" method="post"> <input id="coupon_code" name="code"
                                        type="text" class="text" />
                                    <input id="set_coupon_code_button" type="submit" value="Aplicar" />

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 cart-totals">
                        <table class="table table-striped">
                            <tr class="totals">
                                <td colspan="1" class="text-left">Frete</td>
                                <td colspan="1" class="text-right">R$0,00</td>
                            </tr>
                            <tr class="totals key">
                                <td colspan="1" class="text-left"><strong>Total</strong></td>
                                <td colspan="1" class="text-right"><strong>R${{ $produto->preco }}</strong></td>
                            </tr>
                        </table>
                        <div class="text-center cart-actions">
                            <a href="{{route('checkout', ['produto' => $produto])}}"
                                class="btn btn-primary btn-block" title="Seguir para o pagamento">Seguir para o
                                pagamento</a>
                            <a href="{{ route('loja') }}" class="btn btn-link btn-block"
                                title="&larr; Continuar Comprando">&larr;
                                Continuar comprando</a>
                        </div>
                    </div>
                </div>
            </div>
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
                                    title='Create Online Store' target='_blank' rel='nofollow'>Por Elinaldo
                                    Agostinho</a>.</p>
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
