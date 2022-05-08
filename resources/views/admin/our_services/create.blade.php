@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.our_services.index') }}">Цветовые палитры</a></li>
    <li class="active">Форма добавления</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.our_services.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @input(['name' => 'name', 'label' => 'Название'])
                @input(['name' => 'price_from', 'label' => 'Цена', 'defaultValue' => 0])
                @imageInput(['name' => 'image', 'type' => 'file', 'label' => 'Выберите изображение на компьютере'])
                @submit_btn()
            </form>

        </div>
    </div>
@push('scripts')
<script src="{{ asset('dashboard/ckeditor/ckeditor.js') }}"></script>
@endpush
@endsection
