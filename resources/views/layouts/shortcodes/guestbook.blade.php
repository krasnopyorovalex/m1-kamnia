<!-- Section Product and Clients-->
<section class="section section-sm section-first bg-default text-md-center">
    <div class="container">
        <h2 class="wow fadeScale">Отзывы наших клиентов</h2>
    </div>
    <div class="container">
        <div class="row row-30 justify-content-center align-items-md-center">
            <div class="col-xl-12">
                <div class="owl-carousel owl-style-6" data-items="1" data-sm-items="1" data-md-items="2" data-lg-items="3" data-margin="30" data-dots="true">
                    @foreach($guestbook as $item)
                        <div class="guestbook-item">
                            <div class="guestbook-item__name">{{ $item->name }}</div>
                            <div class="guestbook-item__text">
                                {!! $item->text !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>