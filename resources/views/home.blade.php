@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form class="" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control orange-placeholder" name="search-term" placeholder="Search by quote or quotee">

                <div class="input-group-btn">
                    <div class="btn" style="background: orange" ><i class="glyphicon glyphicon-search"></i></div>
                </div>
                </div>
            </form>
        </div>
    </div>
    <br>
</div>

<example></example>

@endsection
