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
                <h5>Вас приветствует команда компании «Мастер № 1»!</h5>
                <p class="text-left">
                    С 2010 года мы занимаемся изготовлением столешниц, лестниц, подоконников, каминов и прочих изделий из искусственного и натурального камня, кварцевого агломерата и HPL.
                </p>
                <p class="text-left">
                    Сделаем все размеры, формы и конфигурации. Приедем на замеры в любую точку Крыма, снимем замеры и поможем подобрать материалы.
                </p>
                <br/>
                <h5>Лучшие материалы, с которыми мы работаем</h5>
                <table class="table table-striped text-left">
                    <tbody>
                    <tr>
                        <td style="width: 50%">
                            <h6>Искусственный камень (акрил)</h6>
                        </td>
                        <td style="width: 50%">
                            <h6>Кварцевый агломерат</h6>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">при нагревании приобретает любую форму, поэтому столешница из акрила всегда получается монолитной и бесшовной</li>
                                <li class="list-group-item">не имеет пор, размножение плесени и других бактерий невозможно</li>
                                <li class="list-group-item">легко восстанавливается и ремонтируется даже при расколах пополам</li>
                                <li class="list-group-item">теплый на ощупь</li>
                                <li class="list-group-item">устойчив к царапинам и сколам</li>
                            </ul>
                        </td>
                        <td>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">сверхпрочный</li>
                                <li class="list-group-item">поцарапать можно только алмазом</li>
                                <li class="list-group-item">не боится перепадов температуры</li>
                                <li class="list-group-item">подходит для улицы</li>
                                <li class="list-group-item">можно резать без разделочной доски</li>
                                <li class="list-group-item">не реагирует на бытхимию</li>
                                <li class="list-group-item">холодный на ощупь</li>
                            </ul>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <h5>Что больше подойдет для кухни: акрил или кварц?</h5>
                <table class="table table-striped text-left">
                    <tbody>
                    <tr>
                        <td></td>
                        <td><b>Искусственный камень (акрил)</b></td>
                        <td><b>Кварцевый агломерат</b></td>
                    </tr>
                    <tr>
                        <td>Размеры</td>
                        <td>Нет ограничений на геометрические размеры и форму</td>
                        <td>Стыки едва заметны, но видны из-за сложной обработки. Важно, чтобы размер изделия, «вписался» в размер сляба</td>
                    </tr>
                    <tr>
                        <td>Наличие каркаса</td>
                        <td>Так как толщина камня менее 12 мм, необходим каркас из МДФ</td>
                        <td>Толщина кварцевого камня стандартная: 12, 20, 30 мм. <br/>Её достаточно, чтобы не использовать деревянный каркас</td>
                    </tr>
                    <tr>
                        <td>Цена</td>
                        <td>Доступная. На нее не влияет сложность изделия</td>
                        <td>Зависит от формы: чем сложнее, тем дороже</td>
                    </tr>
                    <tr>
                        <td>Обработка</td>
                        <td>Оборудование менее дорогостоящее, но в руках надежных мастеров</td>
                        <td>С применением специального высокоточного оборудования и навыков опытных профессионалов</td>
                    </tr>
                    <tr>
                        <td>Замеры</td>
                        <td>Допускаются небольшие отклонения, они не критичны, их несложно исправить</td>
                        <td>Замер должен быть максимально точным</td>
                    </tr>
                    </tbody>
                </table>
                <h5>Роскошные и долговечные: 5 «ЗА» акрил и кварц</h5>
                <ol class="text-left list-counter-square">
                    <li><b>Прочность.</b> Не боятся никаких механических повреждений. Оба материала сложно повредить во время интенсивного использования. </li>
                    <li><b>Привлекательный вид.</b> Даже учитывая ограниченную цветовую гамму рассматриваемых материалов, выглядят изделия изумительно.</li>
                    <li><b>Легкий уход.</b> Каждая хозяйка будет в восторге! Поверхности не боятся моющих средств и влаги. Грязь уходит быстро, не оставляя пятен и разводов.</li>
                    <li><b>Удивительная термостойкость.</b> Теперь не нужно бояться горячих кастрюль и чайников, они не испортят столешницы из акрила и кварца.</li>
                    <li><b>Долгий срок эксплуатации.</b> Запаса прочности материалов хватит не на один десяток лет. Скорее вы пожелаете сменить цвет кухни, чем столешницы утратят привлекательный вид.</li>
                </ol>
                <p class="text-left">Учитывая наши рекомендации, проверенные опытным путем за 12 лет работы, выбрать столешницу несложно. Доступно более 700 вариантов, важно ориентироваться на собственные потребности и бюджет.</p>
                <p class="text-left">Помните, мы изготовим столешницу за 14 дней. При встрече рассчитаем стоимость за 15 минут, а гарантию дадим на 3 года. Доверяйте профессионалам!</p>
            </div>
        </div>
    </div>
</section>
