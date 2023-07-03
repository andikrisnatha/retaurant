@include('menu.sands.component.body.home')
<main id="main">
    <section id="menu" class="menu">
        <div class="container" data-aos=fade-up>
            <div class="section-header naskleng">
                <p>Our <span>Menu</span></p>
                <em class="m-2">Treat yourself to a wide array of culinary delights from our expansive menu selection</em>
                {{-- <div>
                    <form class="form-group" action="{{ route('sands.public') }}" method="GET">
                        <input name="q" value="{{ $keyword ?? '' }}" class="form-control mr-sm-2 test-center" type="search" placeholder="Try: 'low calories or sweets'"  aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                      </form>
                </div> --}}
            </div>
            @include('menu.sands.component.body.categories')
            @include('menu.sands.component.body.menu')
            @include('menu.sands.component.body.promotion')
            {{-- @include('menu.sands.component.body.gallery') --}}
            @include('menu.sands.component.body.contact')
        </div>
    </section>
</main>
