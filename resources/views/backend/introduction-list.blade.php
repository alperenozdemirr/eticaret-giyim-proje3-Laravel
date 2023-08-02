@extends('backend.layout')
@section('title','Intoduction Listesi')
@section('content')
    <div class="col-md-12 mt-lg-5">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Introduction Listesi</div><div id="example-table_filter" class="dataTables_filter"><form action="{{route('bekci.productSearch')}}" method="POST">@CSRF<label><input type="search" name="search" class="form-control form-control-sm" placeholder="Ürün Ara Ara" aria-controls="example-table"></label><button type="submit" class="btn  btn-primary btn-rounded">Ara</button></form></div>
            </div>
            <div class="ibox-body">
                <div class="alert alert-warning alert-dismissable fade show">
                    <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Uyarı!</strong>Yayına alınan sadece 1 tane yayınlanır</div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>

                        <th>Başlık</th>
                        <th>Alt Başlık</th>
                        <th>Açıklama</th>
                        <th>Resim</th>
                        <th>Url</th>
                        <th>Durum</th>
                        <th>Düzenle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($introductions as $introduction)
                        <tr class="">
                            <td>{{$loop->iteration}}</td>

                            <td>{{$introduction->main_title}}</td>
                            <td>{{$introduction->subtitle}}</td>
                            <td>{{$introduction->info}}</td>

                            <td><img src="{{asset('public_directory')}}/image/introductions/{{$introduction->image}}"/> </td>
                            <td>{{$introduction->url}}</td>
                            <td>@if($introduction->status==1) <a href=""><button class="btn btn-success">Yayında</button></a>  @else <a href=""><button class="btn btn-warning">Beklemede</button></a>  @endif</td>
                            <td>
                                <a href="{{route('bekci.introductionUpdatePage',$introduction->id)}}" class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></a>
                                <a href="{{route('bekci.introductionDelete',$introduction->id)}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>





@endsection
@section('css') @endsection
@section('js') @endsection
