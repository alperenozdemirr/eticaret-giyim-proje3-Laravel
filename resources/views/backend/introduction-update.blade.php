@extends('backend.layout')
@section('title','Yeni Introduction Güncelle')
@section('content')
    <div class="d-flex justify-content-center flex-nowrap mt-4">
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Yeni Introduction Güncelle</div>

                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(41px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item">option 1</a>
                            <a class="dropdown-item">option 2</a>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning alert-dismissable fade show">
                    <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Uyarı!</strong>Yayına alınan sadece 1 tane yayınlanır!</div>
                <div class="ibox-body" style="">
                    <form   action="{{route('bekci.introductionUpdate')}}" enctype="multipart/form-data" method="POST">
                        @CSRF
                        <input type="hidden" name="id" value="{{$introduction->id}}">
                        <div class="form-group">
                            <label>Başlık</label>
                            <input class="form-control" value="{{$introduction->main_title}}" name="main_title" type="text" placeholder="Ana Başlık">
                        </div>
                        <div class="form-group">
                            <label>Başlık</label>
                            <input class="form-control" value="{{$introduction->subtitle}}" name="title" type="text" placeholder="Alt Başlık">
                        </div>
                        <div class="form-group">
                            <label>Banner Detay<br>(sadece yazı giriniz! çok uzun girmemeye dikkat ediniz!)</label>
                            <textarea id="editor1" name="info">{{$introduction->info}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Banner Bağlantı Linki(url)</label>
                            <input class="form-control" value="{{$introduction->url}}" name="url" type="text" placeholder="Banner Bağlantı Linki(url)">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Şuanki Resim<br>Yerine Eklemek İstediğiniz Resmi Seçiniz</label>
                            <span class="float-right"><img src="{{asset('public_directory')}}/image/introductions/{{$introduction->image}}"/></span></div>
                </div>
                <hr>
                <div class="form-group">
                    <label>Banner Resmini Seçiniz(1 adet)</label>
                    <input class="form-control" name="image" type="file" accept=".jpg, .jpeg, .png, .image">
                </div>

                <div class="form-group">
                    <button typeof="submit" class="btn btn-success col-md-12" type="submit">Veriyi Güncelle</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection
@section('css') @endsection
@section('js')

@endsection
