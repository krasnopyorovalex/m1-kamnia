<section class="guest section-inset-2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="title">Гостевая книга</h4>
            </div>
            <div class="col-12">
                <div class="owl-carousel" data-items="1" data-sm-items="1" data-md-items="2"
                     data-lg-items="3" data-margin="5" data-dots="true">
                    @foreach($guestbookLast as $item)
                        <div class="guestbook-item">
                            <div class="guestbook-item__name">{{ $item->name }}</div>
                            <div class="guestbook-item__text">
                                {!! $item->text !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12">
                <div class="btn__see-all">
                    <a href="{{ route('page.show', ['alias' => 'guestbook']) }}" class="btn">Читать все отзывы</a>
                </div>
            </div>
        </div>
    </div>
</section>
