@extends('layout.ui')
@section('content')
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image:url(./img/4.jpg)">
                <div class="u-container slider-info">
                    <h2>Шинэ бараа ирлээ</h2>
                    <h1>Хоёрыг авбал нэг үнэгүй онцгой урамшуулал</h1>
                    <span>Энэ сарыг дуустал</span>
                    <button class="u-button">Очиж үзэх</button>
                </div>
            </div>
            <div class="swiper-slide" style="background-image:url(./img/photo-1582172958571-208b55ba4bab.jpg)">
                <div class="u-container slider-info">
                    <h2>Шlor sit amet consect</h2>
                    <h1>Lorem ipsum dololium tempore!</h1>
                    <span>Эlor sit amet consectл</span>
                    <button class="u-button">Очиж үзэх</button>
                </div>
            </div>
            <div class="swiper-slide" style="background-image:url(./img/photo-1563941811030-aecd7b37eb66.jpg)">
                <div class="u-container slider-info">
                    <h2>Шинэ бараа ирлээ</h2>
                    <h1>Хоёрыг авбал нэг үнэгүй онцгой урамшуулал</h1>
                    <span>Энэ сарыг дуустал</span>
                    <button class="u-button">Очиж үзэх</button>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>

    <!-- Items Content -->
    <div class="c-content">
        <div class="u-container">
            <h2>Онцлох
                <span class="u-semititle">Бүтээгдэхүүн</span>
            </h2>
            <h3>Танд санал болгох манай бүтээгдэхүүн</h3>
            <div class="c-content__items">

@php /*
	      @foreach($products as $p)
                <div class="c-content__items--item">
                    @include('components.productCard',['product' => $p])
                </div>
	      @endforeach
*/ @endphp

            </div>
            <button class="u-button" type="submit" onclick="window.location='{{ route('AllProducts') }}';" >Бүх бүтээгдэхүүн харах</button>
        </div>
    </div>

    <!-- Wrapper -->
<!--
    <div class="c-rapper" style="background-image: url('')">
            <div class="c-rapper__info">
                <h2>Ирж буй тэмцээн</h2>
                <h3>Ирэх сарын 15-наас 17-ны хооронд тэмцээн болно.</h3>
                <button class="u-button">Дэлгэрэнгүй</button>
            </div>
    </div>
-->

    <!-- Player Content -->
    <div class="c-content">
        <div class="u-container">
            <h2>
                Онцлох
                <span class="u-semititle">Тамирчин</span>
            </h2>
            <div class="c-content__items">
                @foreach($players->take(8) as $p)
                    <div class="c-content__items--item">
                      <div class="u-pcard2 a-silver">
                        <div class="u-pcard2__img">
                          <img src="{{ asset($p->image) }}" alt="">
                          <div class="u-pcard2__img--hover">
                            <p>Nickname: {{$p->nickname}}</p>
                            <p>Dart Style: {{$p->dart_style}}</p>
                            <p>Throwing Style: {{$p->throwing_style}}</p>
                            <p>Best Match: {{$p->best_match}}</p>
                          </div>
                        </div>
                        <span id="player_name">{{$p->name}}</span>
                        <span id="player_role">{{$p->rank_title}}</span>
                      </div>  
                    </div>
                @endforeach
            </div>
            <button class="u-button" onclick="window.location='{{ route('AllPlayers') }}';">Бүх тоглогчид харах</button>
        </div>
    </div>

    <!-- Blog Content -->
    <div class="c-content">
        <div>
            <h2 class="mb-5">
                Онцлох
                <span class="u-semititle">
                    Нийтлэл
                </span>
            </h2>

            @foreach($blogs->take(4) as $blog)
            <div class="c-content__blogs">
                <img class="a-imgshadow a-left" src="{{ asset($blog->image) }}" alt="">
                <div class="c-content__blogs--img a-left">
                    <img class="scale-image a-left" src="{{ asset($blog->image) }}" alt="">
                </div>

                <div class="c-content__blogs--info a-right">
                    <div class="a-relative">
                        <h4>{{ $blog->category->name }}</h4>
                        <a href="{{ route('blogSingle',$blog->id) }}"><h2>{{Str::limit($blog->title,15)}}</h2></a>
                        <p>{{Str::limit($blog->content,70)}}</p>
                        <div class="c-content__blogs--info--admin u-flex_wrap">
                            <div class="c-content__blogs--info--admin_info">
                                <img src="{{ asset($blog->image) }}" alt="">
                                <div>
                                    <span>{{$blog->user->name}}</span></br>
                                    <?php $curr = new DateTime($blog->created_at); ?>
                                    <p>{{$curr->format('Y-m-d')}}</p>
                                </div>
                            </div>
                            <div class="u-flex_between">
                                <a class="u-hover_icon">
                                    <img src="/img/fb-red.png" alt="">
                                    <img class="u-hover_icon--alt" src="/img/fb-alt.png" alt="">
                                </a>
                                <a class="u-hover_icon">
                                    <img src="/img/twitter-red.png" alt="">
                                    <img class="u-hover_icon--alt" src="/img/logo2-1.png" alt="">
                                </a>
                                <a class="u-hover_icon">
                                    <img src="/img/instagram-red.png" alt="">
                                    <img class="u-hover_icon--alt" src="/img/logo3-1.png" alt="">
                                </a>
                                <a class="u-hover_icon">
                                    <img src="/img/youtube-red.png" alt="">
                                    <img class="u-hover_icon--alt" src="/img/logo4-1.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <!-- Quote -->
    <div class="c-content">
        <div class="c-content__quote">
            <p>Lorem ipsum dolor sit amet consectetur, adt nobis. sectetur, adt   ipsum dolor sit amet consectetur, adsectetur, adt</p>
            <div class="u-flex_center">
                <img src="/img/New folder/scream1.png" alt="">
                <div class="c-content__quote--info">
                    <h5>Чиний дуртай авга ах</h5>
                    <span>Ийм тийм газрын ийм псда</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Brands -->
    <div class="c-content">
        <div class="c-content__brand">
            <div class="c-content__brand--image">
                <img src="/img/Winmau Logo B.jpg" alt="">
                <img class="alt-image" src="/img/Winmau Logo B.jpg">
            </div>
            <div class="c-content__brand--image">
                <img src="/img/brand1.png" alt="">
                <img class="alt-image" src="/img/brand1.png" alt="">
            </div>
            <div class="c-content__brand--image">
                <img src="/img/brand2.png" alt="">
                <img class="alt-image" src="/img/brand2.png" alt="">
            </div>
            <div class="c-content__brand--image">
                <img src="/img/brand3.png" alt="">
                <img class="alt-image" src="/img/brand3.png" alt="">
            </div>
            <div class="c-content__brand--image">
                <img src="/img/brand2.png" alt="">
                <img class="alt-image" src="/img/brand2.png" alt="">
            </div>
        </div>
    </div>

        <!-- Wrapper -->
    <div class="c-rapper2">
        <div class="c-rapper2__info">
            <h2>Зуны шинэ коллекц</h2>
            <h3>Үүнээс илүү бэлэг үгүй</h3>
            <button class="u-button">Дэлгэрэнгүй</button>
        </div>
    </div>

@endsection
