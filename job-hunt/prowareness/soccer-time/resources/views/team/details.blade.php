@extends('layouts.app')

@section('navbar')
<li class="active">{{ $team['name'] }}</li>
@endsection

@section('content')

<!-- <hr class=""> -->
<div class="container">
@if (count($players) > 0)
    <div class="row">
    	@foreach ($players as $player)
        <div class="col-md-4 text-center">
            <div class="thumbnail">
                <img src="{{ $player->imageUri }}" class="img-responsive" style="width:200px;">
                <div class="caption">
                    <h4 class="">{{ $player->firstName }}</h4>
                    <h3 class="">{{ $player->lastName }}</h3>

                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!--/row-->
    @endif
</div>
<!--/container -->
@endsection
