@extends('fe.layout.layout')

@section('contents')
<!-- Hero Section Begin -->
@include('fe.index.hero')
<!-- Hero Section End -->

<!-- Banner Section Begin -->
@include('fe.index.banner')
<!-- Banner Section End -->

<!-- Product Section Begin -->
@include('fe.index.product')
<!-- Product Section End -->

<!-- Categories Section Begin -->
@include('fe.index.category')
<!-- Categories Section End -->

<!-- Instagram Section Begin -->
@include('fe.index.instagram')
<!-- Instagram Section End -->

<!-- Latest Blog Section Begin -->
@include('fe.index.latest_news')
<!-- Latest Blog Section End -->
@endsection

@section('myjs')
<script>
   function AddCart(id) {
        $.ajax({
            url:'AddCart/'+id,
            type:'GET',
        }).done(function(response){
            RenderCart(response);
            alertify.success('Them vao thanh cong');
        });
    }

    $("#change-item-cart").on("click",".si-close i",function(){
        $.ajax({
            url:'DeleteItemCart/'+$(this).data("id"),
            type:'GET',
        }).done(function(response){
            RenderCart(response);
            alertify.success('Xoa thanh cong');
            location.reload();
        });
    });

    function RenderCart(response){
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        $("#total-quanty-show").text($("#total-quanty-cart").val());
        
    }
 </script>   
@endsection