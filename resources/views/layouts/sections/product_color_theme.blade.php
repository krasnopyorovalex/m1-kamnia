<!-- Grid Gallery-->
<section class="section section-xl bg-default product-gallery">
    <div class="container">
        <div class="row row-30 isotope" data-lightgallery="group">
            <div class="col-md-12">
                <div class="our_service-name heading-3">{{ $product->colorTheme->name }}</div>
            </div>
            @foreach ($product->colorTheme->ourServiceItems as $ourServiceItem)
            <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                <!-- Thumbnail Classic-->
                @if($ourServiceItem->image)
                <article class="thumbnail-classic">
                    <div>
                        <a href="{{ $ourServiceItem->url }}">
                            <img src="{{ $ourServiceItem->image->path }}" alt="{{ $ourServiceItem->image->alt }}" title="{{ $ourServiceItem->image->title }}" />
                        </a>
                    </div>
                </article>
                @endif
                @if($ourServiceItem->price_from)
                    <div>Цена от {!! $ourServiceItem->getPrice() !!}</div>
                @endif
                <a class="button button-sm button-secondary button-zakaria" href="{{ $ourServiceItem->url }}">Выбрать цвет</a>
            </div>
            @endforeach
        </div>
    </div>
</section>
