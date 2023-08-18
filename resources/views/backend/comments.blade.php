@extends('backend.layout')
@section('title','Yorum Yöentimi')
@section('content')
    <div class="col-md-12 mt-lg-5">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Yorum Yöentimi </div><div id="example-table_filter" class="dataTables_filter"><form action="{{route('bekci.commentSearch')}}" method="POST">@CSRF<label><input type="search" name="search" class="form-control form-control-sm" placeholder="Ürün Ara Ara" aria-controls="example-table"></label><button type="submit" class="btn  btn-primary btn-rounded">Ara</button></form></div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#unique</th>
                        <th>Ürün</th>
                        <th>Yorum sahibi</th>
                        <th>Yorum İçeriği</th>
                        <th>Durum</th>
                        <th>Düzenle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td><img width="25" src="{{asset('public_directory')}}/image/products/{{$comment->products->images[0]->image}}">{{substr($comment->products->name,0,10)}}..<a href="{{route('bekci.productUpdatePage',$comment->products->id)}}">Ürüne git</a></td>

                            <td>
                                    @if($comment->users->image)
                                        <img width="35" src="{{asset('public_directory')}}/image/users/{{$comment->users->image}}">
                                    @else
                                        <img width="35" src="{{asset('public_directory')}}/icon/user.png">
                                    @endif
                                    {{$comment->users->name}}
                            </td>
                            <td>
                                    {{$comment->content}}
                            </td>
                            <td>
                                <form method="POST" action="{{route('bekci.commentStatus')}}">
                                    @CSRF
                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                <select id="status{{$loop->iteration}}" name="commentStatus" class="custom-select" onchange="this.form.submit()">
                                    <option @if($comment->status==1) selected @endif value="1">Aktif</option>
                                    <option @if($comment->status==0) selected @endif value="0">Pasif</option>
                                </select>
                                </form>
                            <td>
                                <a href="{{route('bekci.commentDelete',$comment->id)}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></a>
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
@section('js')

@endsection
