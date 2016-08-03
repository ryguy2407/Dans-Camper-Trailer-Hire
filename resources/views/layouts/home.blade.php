@include('partials/header')

<div class="slideshowWrapper cycle-slideshow" data-cycle-pager="#adv-custom-pager" data-cycle-slides="div.slide" data-cycle-pager-template="">
    <div class="slide">
        <div class="background-bar"></div>
        <div class="container">
            <div class="row">
                <div class="six columns slideText">
                    <div class="title">
                        <h1 class="white" style="margin-bottom: 0px;margin-top: 0px;">MDC Camper</h1>
                        <h3 class="orange">from $50 per night</h3>
                    </div>
                    <div class="link">
                        <a class="button button-primary">BOOK NOW</a>
                    </div>
                </div>
                <div class="six columns camper" style="position:relative;">
                    <img src="images/MDC.png" alt="">
                </div>
            </div>
        </div>

        <div class="container camperText">
            <div class="row">
                <div class="six columns">
                    <p>
                        The original 'soft floor' camper, a great setup for families
                        and those looking for a good value holiday. Sleeps up
                        to ten people and very easy to setup.
                    </p>
                    <a class="button button-primary">FIND OUT MORE</a>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="slide">
        <div class="background-bar"></div>
        <div class="container">
            <div class="row">
                <div class="six columns slideText">
                    <div class="title">
                        <h1 class="white" style="margin-bottom: 0px;margin-top: 0px;">JAYCO Hawk</h1>
                        <h3 class="orange">from $65 per night</h3>
                    </div>
                    <div class="link">
                        <a class="button button-primary">BOOK NOW</a>
                    </div>
                </div>
                <div class="six columns camper" style="position:relative;">
                    <img src="images/hawk.png" alt="">
                </div>
            </div>
        </div>

        <div class="container camperText">
            <div class="row">
                <div class="six columns">
                    <p>
                        The original 'soft floor' camper, a great setup for families
                        and those looking for a good value holiday. Sleeps up
                        to ten people and very easy to setup.
                    </p>
                    <a class="button button-primary">FIND OUT MORE</a>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="slide">
        <div class="background-bar"></div>
        <div class="container">
            <div class="row">
                <div class="six columns slideText">
                    <div class="title">
                        <h1 class="white" style="margin-bottom: 0px;margin-top: 0px;">JAYCO Expanda</h1>
                        <h3 class="orange">from $95 per night</h3>
                    </div>
                    <div class="link">
                        <a class="button button-primary">BOOK NOW</a>
                    </div>
                </div>
                <div class="six columns camper" style="position:relative;">
                    <img src="images/expanda.png" alt="">
                </div>
            </div>
        </div>

        <div class="container camperText">
            <div class="row">
                <div class="six columns">
                    <p>
                        The original 'soft floor' camper, a great setup for families
                        and those looking for a good value holiday. Sleeps up
                        to ten people and very easy to setup.
                    </p>
                    <a class="button button-primary">FIND OUT MORE</a>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>

<div class="container">
    <div id="adv-custom-pager" class="row">
        <div class="four columns">
            <img src="images/MDC.png" alt="">
            <h2>MDC Campers</h2>
        </div>
        <div class="four columns">
            <img src="images/hawk.png" alt="">
            <h2>Jayco Hawk</h2>
        </div>
        <div class="four columns">
            <img src="images/expanda.png" alt="">
            <h2>Jayco Expanda</h2>
        </div>
    </div>
</div>

@include('partials/footer')