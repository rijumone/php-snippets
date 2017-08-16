@extends('layouts.app')

@section('content')

<!-- <hr class=""> -->
<div class="container">
@if (count($teams) > 0)
    <div class="row">
    	@foreach ($teams as $team)
        <div class="col-md-4 text-center">
            <div class="thumbnail">
                <img src="{{ $team->logoUri }}" class="img-responsive" style="width:300px;">
                <div class="caption">
                    <h4 class="">{{ $team->name }}</h4>
                    <!-- <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, culpa itaque odio similique suscipit</p> -->
					<a href="{{ URL::route('team.detail', ['team' => $team->id ]) }}" class="btn btn-primary" role="button">More Info</a>

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
