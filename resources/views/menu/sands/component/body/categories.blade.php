<ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
    @foreach ($categories as $category)
    <li class="nav-item">
        <a class="nav-link {{ $loop->index === 0 ? 'active show' : ''}}"
            {{-- href="{{  route('sands.public', ['category' => $category->id]) }}" --}}
        data-bs-toggle="tab" data-bs-target="#menu-{{ $category->id }}"
        >
            <h4>{{ $category->description }}</h4>
        </a>
    </li>
    @endforeach
</ul>
