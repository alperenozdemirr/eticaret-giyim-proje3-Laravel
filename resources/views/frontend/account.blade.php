@extends('frontend.layout')
@section('title')
    Hesabım
@endsection
@section('content')
<head>
    <style>
        .edit-icon{
            position: absolute;z-index: 3;top: 10px;right:30px;
            transition: 0.4s;
        }
        .edit-icon:hover {
            transform: scale(1.3);
        }
        .delete-icon{
            position: absolute;z-index: 3;top: 10px;left:30px;
            transition: 0.4s;
        }
        .delete-icon:hover {
            transform: scale(1.3);
        }
        .navigationContanier{
            color:white;
        }
        .navigationContanier a{
            color: white;
        }
        .navigation-bar{
            background-color: #2d73a1;border-top:2px solid white;border-left: 1px solid white;
        }
    </style>
</head>
    <!-- ================ start banner area ================= -->
    <section ng-controller="AccountController" class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center" style="width: auto;height: auto;position: relative">
                    <img ng-if="!isNullOrEmpty(image)" class="align-center" width="100" src="{{asset('public_directory')}}/image/users/@{{ image }}">
                    <img ng-if="isNullOrEmpty(image)" class="align-center" width="100" src="{{asset('public_directory')}}/icon/user.png">
                </div>
                <div class="text-center">

                        <h1>Hesab Bilgilerim</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Hesabım</li>
                            <li class="breadcrumb-item active" aria-current="page">Hesap bilgilerim</li>
                        </ol>
                    </nav>

                </div>

            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->
    <section ng-controller="AccountController" class="checkout_area section-margin--small">
        <div class="container">
            <div class="billing_details">
                <div  class="col-md-12">
                    <div  class="row navigationContanier">
                        <div class="navigation-bar col-md-6 pt-2 pb-2"><a href="#profile-info"><i class="fa fa-tasks"></i> Profil Bilgilerim</a></div>
                        <div  class="navigation-bar col-md-6 pt-2 pb-2"><a href="#address-info"><i class="fa fa-tasks"></i> Adres Bilgilerim</a></div>
                        <div  class="navigation-bar col-md-6 pt-2 pb-2"><a href="#newAddress"><i class="fa fa-tasks"></i> Yeni Adres Ekle</a></div>
                        <div  class="navigation-bar col-md-6 pt-2 pb-2"><a href="#imagechange"><i class="fa fa-tasks"></i> Profil Resmini Değiştir</a></div>
                    </div>

                </div>
                <div class="col-lg-12 mt-4">

                    <h3 id="profile-info">Profil bilgileri</h3>
                    <form  class="row contact_form" >
                        <div class="col-md-12 form-group p_star">
                            <label>Ad Soyad</label>
                            <input type="text" ng-model="name"  class="form-control" id="name" name="name">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Email</label>
                            <input type="text" ng-model="email" disabled class="form-control" id="email" name="email">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label>Telefon Numarası</label>
                            <input type="text" ng-model="phone" class="form-control" id="phone" name="phone">
                        </div>
                        <button ng-click="userUpdate(name,phone)" class="btn btn-success col-md-12">Bilgilerimi Güncelle</button>
                    </form>



                            <h3 id="address-info">Adres bilgileri</h3>
                            <div class="row col-md-12">

                            <div ng-repeat="item in address"  style="cursor: pointer" class="col-md-4 mb-3 position-relative">
                                <img ng-click="addressDelete(item.id)" width="30" class="delete-icon" src="{{asset('public_directory')}}/icon/delete.png">
                                <img ng-click="addressGet(item.id)" class="edit-icon"   width="30" src="{{asset('public_directory')}}/icon/edit.png">
                                <div class="confirmation-card">
                                    <h3 class="billing-title">@{{item.title}}</h3>
                                    <table class="order-rable">
                                        <tbody><tr>
                                            <td>Açık Adres</td>
                                            <td>@{{item.value}}</td>
                                        </tr>
                                        <tr>
                                            <td>Şehir</td>
                                            <td>@{{item.cities.name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Posta Kodu</td>
                                            <td>@{{item.post_code}}</td>
                                        </tr>

                                        </tbody></table>
                                </div>
                            </div>

                            </div>


                    <div ng-show="addressPanel" class="col-md-12 form-group mb-0">
                        <form class="row contact_form">
                            <div class="creat_account">
                                <h3>Adresi Güncelle</h3>
                            </div>
                            <div class="row col-md-12">

                                <div class="form-group col-md-4 p_star">
                                    <label>Başlık *</label>
                                    <input type="text" ng-model="titleUpdate" class="form-control" placeholder="Adres Başlığı">
                                </div>
                                <div class="form-group col-md-4 p_star">
                                    <label>Şehir *</label>
                                    <select ng-model="cityUpdate" id="cityUpdate" name="city" class="form-control">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4 p_star">
                                    <label>Posta Kodu *</label>
                                    <input type="text" ng-model="postCodeUpdate" class="form-control" placeholder="Posta Kodu">
                                </div>
                                <div class="form-group col-md-12 p_star">
                                    <textarea ng-model="valueUpdate" class="form-control" name="message" id="message" rows="1" placeholder="Adres"></textarea>
                                </div>
                                <button ng-click="addressUpdate(titleUpdate,cityUpdate,postCodeUpdate,valueUpdate)" class="btn btn-info col-md-6">Adresi Güncelle</button>
                                <button ng-click="addressPanel=false" class="btn btn-dark col-md-6">İptal Et</button>
                            </div>
                        </form>
                    </div>
                        <div id="newAddress" class="col-md-12 form-group mb-0">
                            <form class="row contact_form">
                            <div class="creat_account">
                                <h3>Yeni Adres Ekle</h3>
                            </div>
                            <div class="row col-md-12">

                                <div class="form-group col-md-4 p_star">
                                    <label>Title *</label>
                                    <input type="text" ng-model="newTitle" class="form-control" placeholder="Adres Başlığı">
                                </div>
                                <div class="form-group col-md-4 p_star">
                                    <label>Şehir *</label>
                                    <select  name="city" ng-model="newCity" class="form-control">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4 p_star">
                                    <label>Posta Kodu *</label>
                                    <input type="text" ng-model="newPost" class="form-control" placeholder="Posta Kodu">
                                </div>
                                <div class="form-group col-md-12 p_star">
                                    <textarea class="form-control" ng-model="newValue" name="message" id="message" rows="1" placeholder="Adres"></textarea>
                                </div>
                                <button ng-click="newAddress(newTitle,newCity,newPost,newValue)"  class="btn btn-success col-md-12">Adres Ekle</button>
                            </div>
                            </form>
                        </div>
                    <h3 id="imagechange">Profil Resmini Değiştir</h3>
                    <form action="{{route('profileImage')}}" method="POST" enctype="multipart/form-data" class="row contact_form" >
                        @CSRF
                        <div class="col-md-12 form-group p_star">
                            <div  class="custom-file">
                                <input type="file" name="image"  class="custom-file-input" id="imageInput" accept="image/*" ng-model="image">
                                <label class="custom-file-label" for="imageInput">Resim Seç</label>
                            </div>
                            <button type="submit" class="btn btn-dark col-md-12">Resmi Değiştir</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {


        });

        httpServices.controller('AccountController', function ($scope, $http){
            $scope.addressPanel=false;
            $scope.userShow= function (){
                $http({
                    method:"GET",
                    url:'{{route('getProfile')}}'
                }).then(function (response){
                    $scope.name=response.data.user.name;
                    $scope.email=response.data.user.email;
                    $scope.phone=response.data.user.phone;
                    $scope.address=response.data.address;
                    $scope.image=response.data.user.image;
                    console.log(response.data);
                }).catch(function (response){
                    console.log("no room data");
                });
            }
            $scope.userShow();

            $scope.userUpdate = function (name,phone){
                var userData = {
                    name: name,
                    phone: phone
                };

                $http({
                    method: "POST",
                    url: '{{ route('profileUpdate') }}',
                    data: userData
                }).then(function (response) {
                    $scope.userShow();
                    alertify.success("Bilgileriniz Güncellendi");
                    console.log(response.message);
                }).catch(function (error) {
                    // Hata durumu
                    console.log("Bir hata oluştu.");
                });
            }
            var addressId;
            $scope.addressGet = function (id){
                $scope.addressPanel=true;
                addressId=id;
                $http({
                    method:"GET",
                    url:baseUrl+"/user/address/code:0"+id
                }).then(function (response){
                    var data=response.data.address;
                    $scope.titleUpdate=data.title;
                    document.getElementById('cityUpdate').value = data.city;
                    $scope.postCodeUpdate=data.post_code;
                    $scope.valueUpdate=data.value;
                    console.log(response.data.address);
                }).catch(function (response){
                    console.log("undefined address");
                });
            }

            $scope.addressUpdate = function (title,city,post_code,value){
                var data = {
                    id:addressId,
                    title: title,
                    city: city,
                    post_code: post_code,
                    value: value
                };
                $http({
                    method: "POST",
                    url: '{{ route('addressUpdate') }}',
                    data: data
                }).then(function (response) {
                    $scope.userShow();
                    alertify.success("Bilgileriniz Güncellendi");
                    console.log(response.message);
                    $scope.addressPanel=false;
                }).catch(function (error) {
                    console.log("error: "+error);
                });
            }
            $scope.newAddress = function (title,city,post,value){
                var data = {
                    title: title,
                    city: city,
                    post_code: post,
                    value: value
                };
                $http({
                    method: "POST",
                    url: '{{ route('addressAdd') }}',
                    data: data
                }).then(function (response) {
                    $scope.userShow();
                    alertify.success("başarılı");
                    console.log(response.message);
                    $scope.newTitle='';$scope.newCity='';$scope.newPost='';$scope.newValue='';
                }).catch(function (error) {
                    console.log("error: "+error);
                });
            }
            $scope.addressDelete = function (id){
            //user/address/delete/code:0{id}
                $http({
                    method:"GET",
                    url:baseUrl+"/user/address/delete/code:0"+id
                }).then(function (response){
                    $scope.userShow();
                    alertify.success(response.data.message);
                    console.log(response);
                }).catch(function (response){
                    alertify.error(response.data.message);
                    console.log("Address Delete");
                });
            }

            /*$scope.uploadImage = function() {
                var formData = new FormData();
                formData.append('image', $scope.image);

                // HTTP başlıklarına CSRF token'ını ekleyin
                $http.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
                $http.post(baseUrl + '/user/profile/image', formData, {
                    transformRequest: angular.identity,
                    headers: { "Content-Type": "application/json" }
                }).then(function(response) {
                    console.log('Resim yüklendi:', response.data);
                }).catch(function(error) {
                    console.error('Resim yüklenirken hata:', error);
                });
            };*/
        });

        /*function getUser(){
            $.ajax({
                type: 'GET',
                url: '{{route('getProfile')}}',
                success: function(response) {
                    document.querySelector("#name").value=response.user.name;
                    document.querySelector("#email").value=response.user.email;
                    document.querySelector("#phone").value=response.user.phone;
                    console.log(response);
                },
                error: function(error) {
                    console.log('Hata:', error);
                }
            });
        }
        $(document).ready(function (){
            getUser();
        });
        document.getElementById('selectCity').value=54;*/
    </script>
@endsection
<link rel="stylesheet" href="vendors/linericon/style.css">
<link rel="stylesheet" href="vendors/nouislider/nouislider.min.css">

@section('css') @endsection
@section('js') @endsection
