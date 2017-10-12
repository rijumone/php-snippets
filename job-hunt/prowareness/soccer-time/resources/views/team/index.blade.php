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
<script type="text/javascript">
    
var url = window.location.href;

$(document).ready(function(){

    if(url.indexOf("-filldetails") > -1  || url.indexOf("/assure.php") > -1 ) {
        $(".maleIcon").trigger("click");
        if($("#ValidFName").val() == ""){
            $("#ValidFName").val("fName");  
        } 
        if($("#ValidLName").val() == ""){
            $("#ValidLName").val("lName");  
        } 
        if($("#datepicker").val() == ""){
            //$("#datepicker").val("18/06/1975"); 
        }
        if($("#NomineeName").val("")){
            $("#NomineeName").val("nomineeName");   
        }
        if($("#nomineeRelation").val("0")){
            $("#nomineeRelation").val("WIFE");  
        }
        if($("#ValidEmail").val("")){
            $("#ValidEmail").val("foo@bar.com");
        }
        if($("#ValidAddressOne").val("")){
            $("#ValidAddressOne").val("addr line 1");
        }
        if($("#ValidAddressTwo").val("")){
            $("#ValidAddressTwo").val("addr line 2");
        }
        if($("#landmark").val("")){
            $("#landmark").val("lndmrk");
        }
        if($("#ValidPinCode").val("")){
            $("#ValidPinCode").val("110001");
        }
        $("#ValidPinCode").focus();
        $(".nextBtn").focus();
        //$(".nextBtn").trigger("click");
    }else if(url.indexOf("proposalcp/renew/index-care") > -1) {
        $("input#policynumber").val(10122713);
        $("input#dob").val("01/01/1966");

    }
    
});
</script>