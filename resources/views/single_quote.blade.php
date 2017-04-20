@extends('layouts.app')

@section('content')

    <div class="image-frame">
        <div class="container">
            <img class="img-responsive center-block" src="{{url($quote->image_url)}}">
        </div>
    </div>

    <div class="container white-text">
        <div class="row">
            <div class="col-sm-12">
            <div class="col-xs-6 text-center">
                None
            </div>
            <div class="col-xs-6 text-center">
                    Like : <3 Add To Fav: *
            </div>
            </div>
            <div class="col-sm-6 ">

                Posted by {{$quote->user->name}}
                <hr class="orange-hr">

                Quote :
                <div class="sidebar-item-value">
                    {{$quote->quote}} asdfasdf aasdf asdf sdafasdfasdfasdfa sdafasdfas dfasdfasdf
                </div>

                Image Dimentions :
                <div class="sidebar-item-value">
                    <span class="box-item">1204 x 504</span>
                </div>

            </div>

        </div>
    </div>
@endsection