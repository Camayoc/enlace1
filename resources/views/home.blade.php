@extends('layouts.app')
@section('extracss')
    <style>
        .edit-tool {
            position: absolute;
            display: block;
            transform: translate(10px, -20px);
            color: rgb(8, 8, 8);


        }
        .edit-tool-header {
            border-radius: 30px;
            padding-left: 8px;
            padding-right: 8px;
            background-color: white;
            width: max-content;
        }
        .edit-tool-mini {
            background: white;
            border-radius: 50%;
            width: 21px;
            height: 21px;
            padding: 2px;
            border: rgba(128, 128, 128, 0.403) solid 1px;
            display: flex;
        }
        .edit-row {
            justify-content: center;
            height: 100%;
            display: flex;
            align-items: center;
        }
        .resize:hover {
            transform: scale(2);
            z-index:99;
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
@endsection
@section('edit.photomini')
    <upload-foto>
        <template #default="{onevent}">
            <div class="edit-tool edit-tool-mini resize" @click="$refs.profileuploader.start($event)" style="color:black">
                <i class="fa fa-camera" aria-hidden="true"></i>
            </div>
        </template>
    </upload-foto>
@endsection
@section('edit.photoheader')
    <upload-foto>
        <template #default="{onevent}">
            <div class="edit-row" @click="$refs.headeruploader.start($event)">
                <div class="edit-tool edit-tool-header">
                    <i class="fa fa-camera" aria-hidden="true"></i>cambiar
                </div>
            </div>
        </template>
    </upload-foto>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <profile-upload ref='profileuploader'></profile-upload>
        <header-upload ref='headeruploader'></header-upload>
                <links-manager>
                    @if (auth()->user()->enlace == null)
                        <completing-link prepend="{{ url('/') . '/link/' }}"></completing-link>
                    @endif
                </links-manager>
            </div>
        </div>
    </div>
@endsection
