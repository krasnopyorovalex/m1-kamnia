@foreach ($colorThemes as $colorTheme)
    @if(count($colorTheme->ourServiceItems))

        <div class="our_service-name heading-3" id="service_{{ $colorTheme->id }}">{{ $colorTheme->name }}</div>

        <div class="list__items our_services">
        <div class="row">
            @foreach($colorTheme->ourServiceItems as $colorThemeItem)
                <div class="col-sm-6 col-lg-4 col-md-4 col-xs-12">
                    <!-- Post Classic-->
                    <article class="post post-classic box-md">
                        @if(isset($colorThemeItem->image))
                            <figure>
                                <a class="post-classic-figure" href="{{ $colorThemeItem->url }}">
                                    <img src="{{ asset($colorThemeItem->image->path) }}" alt="" width="370" height="239">
                                </a>
                            </figure>
                        @endif
                        <div class="post-classic-content">
                            <h4 class="post-classic-title"><a href="{{ $colorThemeItem->url }}">{{ $colorThemeItem->name }}</a></h4>
                            <div class="btn__box text-center">
                                <a class="button button-sm button-secondary button-zakaria" href="{{ $colorThemeItem->url }}">Подробнее</a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
        </div>
    @endif
@endforeach
