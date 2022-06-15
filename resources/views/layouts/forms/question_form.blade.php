<!-- About Us-->
<section class="section section-inset bg-default text-md-left q-form">
    <div class="container">
        <div class="row row-30 align-items-start justify-content-center">
            <div class="col-md-12 col-lg-12">
                <div class="form__question_marin">
                    <div class="group-middle d-md-flex justify-content-md-start wow fadeInRight" data-wow-delay=".3s">
                        <div class="form_question">
                            <div>
                                <div class="form_info"><p>Задать вопрос</p></div>
                                <form action="{{ route('send.question') }}"
                                      class="rd-form rd-mailform rd-form-inline rd-form-inline-2" method="post"
                                      id="form__subscribe">
                                    @csrf
                                    <div class="form-wrap">
                                        <input class="form-input" id="subscribe-form-2-email" type="text" name="name"
                                               autocomplete="off" placeholder="Имя" required=""/>
                                    </div>
                                    <div class="form-wrap">
                                        <input class="form-input" id="subscribe-form-2-email" type="text" name="phone"
                                               autocomplete="off" placeholder="Телефон" required=""/>
                                    </div>
                                    <div class="form-button submit">
                                        <button class="button button-sm button-secondary" type="submit">
                                            Задать вопрос
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>