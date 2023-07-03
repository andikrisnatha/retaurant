<section id="promotions" class="events">
    <div class="container-fluid" data-aos="fade-up">
        <div class="section-header">
            {{-- <h2>Promotions</h2> --}}
            <p>What's<span> On</span> Sands Restaurant</p>
        </div>
        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="50">
            <div class="swiper-wrapper">
                @foreach ($promotions as $promotion)
                <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url({{ $promotion->image }})">
                    <h3>{{ $promotion->title }}</h3>
                    <div class="price align-self-start">{{ $promotion->price }}</div>
                    <p class="description">
                        {{ $promotion->description }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
