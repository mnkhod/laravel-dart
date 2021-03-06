@extends('layout.nav-ui')

@section('style')
<style>
  input::placeholder {
   color: white; 
  }
</style>
@endsection

@section('content')
	<!-- Wrapper -->
	<div class="c-rapper a-article" style="height: 350px;background-image: url(/img/photo-1565073624497-7144969d0a07.jpg);">
		<div class="c-rapper__info2">
				<h1>Түгээмэл асуултууд</h1>
				<form action="" class="u-search u-flex_between">
						<img src="/img/search-white.png" alt="Search Icon">
						<input type="text" placeholder="Асуултаа оруулна уу...">
				</form>
		</div>
	</div>

	<div class="c-quest">
		<div class="u-container">
				<div class="c-quest__list">
						<ul>
								<h2>Асуултууд</h2>
                @php $count=1; @endphp
                @foreach($faqs as $faq)
								<li>
										<div class="u-flex_between">
												<span>{{$count}}) {{$faq->question}}</span>
												<i class="fas fa-plus-circle"></i>
										</div>
										<p class="answer">{{$faq->answer}}</p>
								</li>
                @php $count +=1; @endphp
                @endforeach
						</ul>
            
						<div class="c-content pt-0">
								<div class="c-content__nav full">
                <!--
										<div class="c-content__nav--navigation">
												<span class="material-icons">
														chevron_left
												</span>
												<a href="">1</a>
												<span class="material-icons">
														chevron_right
												</span>
										</div>
                -->
								</div>
						</div>
				</div>
		</div>
	</div>
@endsection

