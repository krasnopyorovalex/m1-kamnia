@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.catalogs.index') }}">Цветовые палитры</a></li>
    <li><a href="{{ route('admin.our_service_items.index', $ourService) }}">Список</a></li>
    <li class="active">Форма добавления</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.our_service_items.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="our_service_id" value="{{ $ourService }}">

                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="main">

                            @input(['name' => 'name', 'label' => 'Название'])
                            @input(['name' => 'title', 'label' => 'Title'])
                            @input(['name' => 'description', 'label' => 'Description'])

                            @input(['name' => 'price_from', 'label' => 'Цена', 'defaultValue' => 0])

                            @input(['name' => 'alias', 'label' => 'Alias'])
                            @imageInput(['name' => 'image', 'type' => 'file', 'label' => 'Выберите изображение на компьютере'])

                            @textarea(['name' => 'text', 'label' => 'Текст'])

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
