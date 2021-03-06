@extends('layouts.app')
@section('content')

@include('layouts.navigation',
['page_id' => "3",'title'=>"TOP 10 人氣餐廳"])

<section style="margin-left:5%">
  @foreach($allRestaurants as $thisRestaurant)
  <div class="row">
    <div>
      <img style="height: 150px;" src="https://github.com/kikihayashi/RestaurantForum_Image/blob/main/Food/{{$thisRestaurant['id']%10}}.jpg?raw=true" alt="圖片已失效" />
    </div>
    <div style="margin-left:3%;">
      <p>
      <h4><a href="{{route('RestaurantController.restaurant',$thisRestaurant['id'])}}">{{$thisRestaurant['name']}}</a>
        <small>{{$thisRestaurant['category_name']}}</small>
        收藏數：{{$thisRestaurant['favorite_number']}}
      </h4>
      {{$thisRestaurant['content']}}
      </p>
      <!-- 這裡是加到最愛和按讚的模板 -->
      @include('layouts.favorite_and_like',
      ['page'=>"rank",
      'nowStatus'=> $allNowStatus[$thisRestaurant['id']] ?? null,
      'restaurantId'=> $thisRestaurant['id'],
      'paginate'=>0,
      'categoryId'=>0])
    </div>

  </div>
  <hr>
  @endforeach
</section>
@endsection