<!-- Services-->
<section class="section parallax-container" data-parallax-img="images/parallax-03.jpg">
    <div class="parallax-content section-xxl context-dark darken-two">
        <div class="container">
            <div class="row row-30 box-ordered">
                @foreach($advantages as $advantage)
                <div class="col-sm-6 col-lg-4 wow fadeInLeft" data-wow-delay=".3s">
                    <article class="box-icon-modern">
                        <div class="box-icon-modern-header">
                            <div class="box-icon-modern-count box-ordered-item"></div>
                            <div class="box-icon-modern-svg">
                                @if($advantage->image)
                                    <img src="{{ asset($advantage->image->path) }}" alt="{{ $advantage->image->alt }}" title="{{ $advantage->image->title }}">
                                @endif
                            </div>
                        </div>
                        <h4 class="box-icon-modern-title">{{ $advantage->name }}</h4>
                        @if($advantage->preview)
                        <p class="box-icon-modern-text">
                            {!! strip_tags($advantage->preview) !!}
                        </p>
                        @endif
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h5>Фабрика искусственного камня ELEMENT была основана в 2010г., в Крыму, г.Симферополь.</h5>
                <p>
                    Наши столешницы для кухни из искусственного камня по праву считаются одними из лучших! Так же, наши мастера изготавливают подоконники и мойки из камня любой конфигурации и сложности! Для ванных комнат мы можем предложить современные ванны из акрилового камня и элементы интерьера, которые прослужат не один десяток лет!
                    Работаем по всему Крыму, с бесплатным выездом замерщика и доставкой!
                </p>
            </div>
        </div>
    </div>
</section>
