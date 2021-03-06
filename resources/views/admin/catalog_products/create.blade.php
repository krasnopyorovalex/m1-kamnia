@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.catalogs.index') }}">Категории каталога</a></li>
    <li><a href="{{ route('admin.catalog_products.index', $catalog) }}">Список объектов</a></li>
    <li class="active">Форма добавления объекта</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления товара</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.catalog_products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="catalog_id" value="{{ $catalog }}">

                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="main">

                            <div class="form-group">
                                <label for="label">Метка:</label>
                                <select class="form-control border-blue border-xs select-search" id="slider_id" name="label" data-width="100%">
                                    @foreach ($labels as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

{{--                            @select(['name' => 'city_id', 'label' => 'Город объекта', 'items' => $cities])--}}
                            @select(['name' => 'color_theme_id', 'label' => 'Цветовая палитра', 'items' => $colorThemes])

                            @input(['name' => 'name', 'label' => 'Название'])
                            @input(['name' => 'title', 'label' => 'Title'])
                            @input(['name' => 'description', 'label' => 'Description'])

                            @input(['name' => 'price', 'label' => 'Цена', 'defaultValue' => 0])
{{--                            @input(['name' => 'address', 'label' => 'Адрес'])--}}

                            @input(['name' => 'alias', 'label' => 'Alias'])
                            @imageInput(['name' => 'image', 'type' => 'file', 'label' => 'Выберите изображение на компьютере'])
                            @textarea(['name' => 'preview', 'label' => 'Превью для списка', 'id' => 'full-preview'])
                            @textarea(['name' => 'text', 'label' => 'Текст'])
                            @textarea(['name' => 'props', 'label' => 'Текст под галереей', 'id' => 'full-props'])
                            @checkbox(['name' => 'on_request', 'label' => 'Стоимость под запрос?'])

                            @submit_btn()
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@push('scripts')
<script src="{{ asset('dashboard/ckeditor/ckeditor.js') }}"></script>
@endpush
@endsection
