@extends('layouts.app')

@section('after_css')
    <link rel="stylesheet"
        href="{{ asset('assets/templates/metronic/dist/assets/plugins/custom/datatables/datatables.bundle.css') }}">
@endsection

@section('content_header')
    <div class="flex-wrap page-title d-flex flex-column justify-content-center me-3 ">
        <!--begin::Title-->
        <h1 class="my-0 text-gray-900 page-heading d-flex fw-bold fs-3 flex-column justify-content-center">
            {{ $header }}
        </h1>
        <!--end::Title-->

        <!--begin::Breadcrumb-->
        <ul class="pt-1 my-0 breadcrumb breadcrumb-separatorless fw-semibold fs-7">
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
                <a href="{{ $main_breadcrumb_link }}" class="text-muted text-hover-primary">
                    {{ $main_breadcrumb }} </a>
            </li>
            <!--end::Item-->
            @if ($breadcrumb)
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bg-gray-500 bullet w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    {{ $breadcrumb }} </li>
                <!--end::Item-->
            @endif
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@section('content')
    <div class="card">
        <!--begin::Card header-->
        <div class="pt-6 border-0 card-header">
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <a href="{{ route('product.detail') }}" class="btn btn-primary"> <i
                            class="ki-duotone ki-plus fs-2"></i>Product Create</a>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="py-4 card-body">
            <!--begin::Table-->
            <div id="kt_table_users_wrapper">
                @livewire('product.datatable')
            </div>
            <!--end::Table-->
        </div>
    </div>
@endsection
