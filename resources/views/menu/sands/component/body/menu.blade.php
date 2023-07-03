<div class="tab-content" data-aos="fade-up" data-aos-delay="300">
@foreach ($categories as $category)
    <div class="tab-pane fade {{ $loop->index === 0 ? 'active show' : ''}}" id="menu-{{ $category->id }}">
        <div class="tab-header text-center">
            <h3>{{ $category->description }}</h3>
        </div>
        <div class="row gy-5">
            @foreach ($category->menus as $menu)
            <div class="col-lg-4 menu-item p-4">
                <a href="assets/img/menu/menuicons_avocadoprawnrefresh.png" class="glightbox">
                    <img src="{{ $menu->image }}" class="menu-img img-fluid" alt=""></a>
                    <h4>{{ $menu->main_title }}</h4>
                    <p class="ingredients text-left text-lg-center" style="">{{ $menu->description }}</p>
                    <p class="price">
                        @if(!empty($menu->price_1))
                        {{ $menu->title_1 }} {{'IDR ' .number_format($menu->price_1, 0) }} <br>
                        @endif
                        @if(!empty($menu->price_2))
                        {{ $menu->title_2 }} {{'IDR ' .number_format($menu->price_2, 0) }} <br>
                        @endif
                        @if(!empty($menu->price_3))
                        {{ $menu->title_3 }} {{'IDR ' .number_format($menu->price_3, 0) }} <br>
                        @endif
                        @if(!empty($menu->price_4))
                        {{ $menu->title_4 }} {{'IDR ' .number_format($menu->price_4, 0) }} <br>
                        @endif
                    </p>
                    <a href="{{ $menu->video_url }}" target="_blank"><i class="fa fa-circle-play"></i>data-aos="fade-up" data-aos-delay="300"></a>
                </div>
                @endforeach
        </div>
    </div>
@endforeach
</div>
