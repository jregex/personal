<div class="content-container container">
    <div class="row">
        <section id="portfolio">

            <div class="py-4 my-4">
                <h2 class="fw-bold mt-5 text-uppercase">Gallery Archivement</h2>
            </div>

            <hr class="mid-break my-2">

            <div class="py-2 my-4">

                <div class="mb-5">
                    <p>
                        <button class="filter-button active" data-filter="*">All</button>
                        @foreach ($categories as $item)
                        <button class="filter-button"
                            data-filter=".{{strtolower(str_replace(' ','-',$item->category))}}">{{$item->category}}</button>
                        @endforeach
                    </p>
                </div>


                <div class="isotope-container">
                    @foreach ($categories as $galleries)

                    @foreach ($galleries->galleries as $item)
                    <div
                        class="item {{strtolower(str_replace(' ','-',$galleries->category))}} col-md-4 col-sm-12 p-2 bg-light text-center">
                        <a href="{{ asset('storage/gallery') }}/{{$item->gallery}}" title="{{$galleries->category}}"
                            class="image-link">
                            <img class="portfolio-img img-fluid" src="{{ asset('storage/gallery') }}/{{$item->gallery}}"
                                alt="image">
                            <div class="description text-info">
                                <h4>{{date('d-m-Y h:i',strtotime($item->created_at))}}</h4>
                            </div>
                        </a>
                    </div>
                    @endforeach

                    @endforeach
                </div>

            </div>

        </section>
    </div>
    <div class="row mb-4">
        <div class="col d-flex justify-content-end">
            <a href="{{ url('/') }}" wire:navigate class="btn btn-primary">Kembali</a>
        </div>
    </div>

</div>
