<!-- ======= Hero Section ======= -->
<div id="hero" class="hero route bg-image" style="background-image: url({{isset($home['home-header-banner'])? asset('/storage/'.$home['home-header-banner']) : 'assets/img/hero-bg.jpg'}})">
    <div class="overlay-itro"></div>
    <div class="hero-content display-table">
        <div class="table-cell">
            <div class="container">
                <!--<p class="display-6 color-d">Hello, world!</p>-->
                <h1 class="hero-title mb-4">
                    @isset($home['home-header-banner_text'])
                        {{$home['home-header-banner_text']}}
                    @endisset
                </h1>
                <p class="hero-subtitle"><span class="typed" data-typed-items="Actor, Singer"></span></p>
                <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
            </div>
        </div>
    </div>
</div>
