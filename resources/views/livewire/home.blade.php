<div>
    <x-canvas :users="$users"></x-canvas>
    <div class="container-fluid">
        <div class="row">
            <x-navside></x-navside>
            <div class="col-xl-6 offset-xl-2">
                <div class="content-container container">
                    <section id="home" class="mt-0">

                        <div class="py-lg-4 my-lg-4 text-center">
                            <h1 class="fw-bold">Hi Saya {{ $users->callname }}</h1>
                            <div class="col-lg-10 mx-auto">
                                <p class="lead-paragraph mb-4">{{ $users->resume }}.</p>
                                <div class="d-sm-flex justify-content-sm-center gap-2">
                                    <button type="button" wire:click="download" class="btn btn-primary btn-lg mt-3">GET
                                        CV</button>
                                </div>
                            </div>
                        </div>

                    </section>

                    <section id="about" class="mt-0">

                        <div class="my-4 py-4">
                            <h1 class="fw-bold mt-5">About Me</h1>
                            <p class="lead-paragraph my-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Dapib eu
                                placerat at nisl posuere aliquet amet pharetra malesuada. Spendisse nisl ac at tortor.
                                Sit faucibus suspendisse risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Dapib eu placerat at nisl posuere aliquet amet pharetra malesuada. Spendisse nisl ac at
                                tortor. Sit faucibus suspendisse risus.</p>
                        </div>

                        <hr class="mid-break my-2">

                        <div class="my-4 py-4">
                            <h2 class="fw-bold">Personal Info</h2>

                            <ul class="list-unstyled">
                                <li><b>Age:</b> {{ date('Y') - date('Y', strtotime($users->tgl_lahir)) }} </li>
                                <li><b>Residence:</b> Makassar </li>
                                <li><b>Address:</b> {{ $users->alamat }}</li>
                                <li><b>E-mail:</b> mail: {{ $users->email }}</li>
                                <li><b>Phone:</b> {{ $users->no_hp }}</li>
                            </ul>

                        </div>
                    </section>

                    <section id="resume">
                        <div class="my-4 py-4">
                            <h1 class="fw-bold mt-5">Resume</h1>
                        </div>
                        <hr class="mid-break my-2">
                        <div class="my-4 py-4">
                            <h2 class="fw-bold pb-4">Education</h2>

                            <div class="row justify-content-start" data-aos="fade-up">
                                @foreach ($educations as $item)
                                <div class="col-md-6 col-sm-12">
                                    <div class="data-info">
                                        <p class="meta-date">{{date('Y',strtotime($item->awal))}} -
                                            {{date('Y',strtotime($item->akhir))}} <img
                                                src="{{ asset('assets/user') }}/images/Ellipse 7.png" alt="image">
                                            <a class="open-description">{{$item->kampus}}</a>
                                        </p>
                                        <h3 class="info-title">{{$item->pendidikan}}</h3>
                                        <p class="text-primary text-sm">{{$item->jurusan}}</p>
                                        <p>{{$item->desc}}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>

                        <hr class="mid-break my-2">


                        <div class="my-4 py-4">
                            <h2 class="fw-bold pb-4">Skills</h2>

                            <div id="progressbar-tooltip-id" class="progressbar-tooltip">

                                @foreach ($skills as $item)
                                <h4>{{ $item->nama_skill }}</h4>
                                <div class="ab-progress progress-tooltip" data-progress data-tooltip="true"
                                    data-value="{{ $item->progress }}"></div>
                                @endforeach
                            </div>

                        </div>

                        <hr class="mid-break my-2">

                        <div class="my-4 py-4">
                            <h2 class="fw-bold pb-4">Experience</h2>


                            <div class="row justify-content-start" data-aos="fade-up">
                                @foreach ($archivements as $item)
                                <div class="col-md-6 col-sm-12">
                                    <div class="data-info">
                                        <p class="meta-date">{{date('d m Y',strtotime($item->tgl))}} <img
                                                src="{{ asset('assets/user') }}/images/Ellipse 7.png" alt="image">
                                            <a
                                                class="open-description">{{ucwords($item->category_gallery->category)}}</a>
                                        </p>
                                        <h3 class="info-title">{{$item->archivement}}</h3>
                                        <p>{{$item->desc}}</p>
                                        <a href="{{ route('gallery.index') }}" wire:navigate
                                            class="icon-link fs-6 mt-0 text-black">More
                                            info</a>
                                    </div>

                                </div>
                                @endforeach
                            </div>

                        </div>


                        {{--
                        <hr class="mid-break my-2">

                        <div class="my-5 py-4">
                            <h2 class="fw-bold pb-4">Testimonials</h2>

                            <div class="swiper testimonial-swiper">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide">
                                        <div class="card testimonials-inner">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2"><img class="testimonial-image"
                                                            src="{{ asset('assets/user') }}/images/quote.png"
                                                            alt="image"></div>
                                                    <div class="col-md-10 mt-5">
                                                        <p class="card-text mb-2">“Lorem ipsum dolor sit amet, consecte
                                                            adipiscing elit. Dapib eu placerat at nisl posuere aliquet
                                                            amet
                                                            pharetra.”
                                                        </p>
                                                        <div class="testimonial-details">
                                                            <h4 class="name fw-bold m-0">Lynda Watson</h4>
                                                            <p class="testimonial-location">Jacobin</p>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card testimonials-inner">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2"><img class="testimonial-image"
                                                            src="{{ asset('assets/user') }}/images/quote.png"
                                                            alt="image"></div>
                                                    <div class="col-md-10 mt-5">
                                                        <p class="card-text mb-2">“Lorem ipsum dolor sit amet, consecte
                                                            adipiscing elit. Dapib eu placerat at nisl posuere aliquet
                                                            amet
                                                            pharetra.”
                                                        </p>
                                                        <div class="testimonial-details">
                                                            <h4 class="name fw-bold m-0">Lynda Watson</h4>
                                                            <p class="testimonial-location">Jacobin</p>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card testimonials-inner">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2"><img class="testimonial-image"
                                                            src="{{ asset('assets/user') }}/images/quote.png"
                                                            alt="image"></div>
                                                    <div class="col-md-10 mt-5">
                                                        <p class="card-text mb-2">“Lorem ipsum dolor sit amet, consecte
                                                            adipiscing elit. Dapib eu placerat at nisl posuere aliquet
                                                            amet
                                                            pharetra.”
                                                        </p>
                                                        <div class="testimonial-details">
                                                            <h4 class="name fw-bold m-0">Lynda Watson</h4>
                                                            <p class="testimonial-location">Jacobin</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card testimonials-inner">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2"><img class="testimonial-image"
                                                            src="{{ asset('assets/user') }}/images/quote.png"
                                                            alt="image"></div>
                                                    <div class="col-md-10 mt-5">
                                                        <p class="card-text mb-2">“Lorem ipsum dolor sit amet, consecte
                                                            adipiscing elit. Dapib eu placerat at nisl posuere aliquet
                                                            amet
                                                            pharetra.”
                                                        </p>
                                                        <div class="testimonial-details">
                                                            <h4 class="name fw-bold m-0">Lynda Watson</h4>
                                                            <p class="testimonial-location">Jacobin</p>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card testimonials-inner">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2"><img class="testimonial-image"
                                                            src="{{ asset('assets/user') }}/images/quote.png"
                                                            alt="image"></div>
                                                    <div class="col-md-10 mt-5">
                                                        <p class="card-text mb-2">“Lorem ipsum dolor sit amet, consecte
                                                            adipiscing elit. Dapib eu placerat at nisl posuere aliquet
                                                            amet
                                                            pharetra.”
                                                        </p>
                                                        <div class="testimonial-details">
                                                            <h4 class="name fw-bold m-0">Lynda Watson</h4>
                                                            <p class="testimonial-location">Jacobin</p>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card testimonials-inner">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2"><img class="testimonial-image"
                                                            src="{{ asset('assets/user') }}/images/quote.png"
                                                            alt="image"></div>
                                                    <div class="col-md-10 mt-5">
                                                        <p class="card-text mb-2">“Lorem ipsum dolor sit amet, consecte
                                                            adipiscing elit. Dapib eu placerat at nisl posuere aliquet
                                                            amet
                                                            pharetra.”
                                                        </p>
                                                        <div class="testimonial-details">
                                                            <h4 class="name fw-bold m-0">Lynda Watson</h4>
                                                            <p class="testimonial-location">Jacobin</p>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="swiper-pagination position-static"></div>
                            </div>
                        </div> --}}


                    </section>
                    <hr class="mid-break my-2">

                    <section id="contact">

                        <div class="my-4 py-4">
                            <h1 class="fw-bold mt-5">Contact</h1>
                            <p>Wanna talk about project, please feel free to contact us.</p>
                        </div>


                        <hr class="mid-break my-2">

                        <div class="my-4 py-4">

                            <div class="row justify-content-around">
                                <div class="col-md-4 contact-list">
                                    <p class="contact-paragraph">
                                        <iconify-icon icon="ic:outline-phone"></iconify-icon>
                                        {{ $users->no_hp }}
                                    </p>
                                </div>
                                <div class="col-md-4 contact-list">
                                    <p class="contact-paragraph">
                                        <iconify-icon icon="ic:outline-email"></iconify-icon>
                                        {{ $users->email }}
                                    </p>
                                </div>
                                <div class="col-md-4 contact-list">
                                    <p class="contact-paragraph">
                                        <iconify-icon icon="ic:outline-location-on"></iconify-icon> {{ $users->alamat }}
                                    </p>
                                </div>
                            </div>


                        </div>

                        <hr class="mid-break my-2">

                        <div class="my-4 py-4">

                            <h2 class="fw-bold pb-4">Get In Touch</h2>

                            <form name="contactform" action="#" method="post" class="form-group contact-form mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" minlength="2" name="name" placeholder="Name*"
                                            class="form-control" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" placeholder="E-mail*" class="form-control"
                                            required="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                        <textarea class="form-control mb-4 mt-4" name="message" placeholder="Message"
                                            style="height: 150px;" required=""></textarea>


                                        <button type="submit" name="submit" class="btn btn-primary btn-lg">SEND</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        {{--
                        <hr class="mid-break my-2">

                        <div class="my-4 py-4">

                            <h2 class="fw-bold pb-4">Google Map</h2>
                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas"
                                        src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                        href="https://getasearch.com/fmovies"></a><br>
                                    <style>
                                        .mapouter {
                                            position: relative;
                                            text-align: right;
                                            height: 500px;
                                            width: 100%;
                                        }
                                    </style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
                                    <style>
                                        .gmap_canvas {
                                            overflow: hidden;
                                            background: none !important;
                                            height: 500px;
                                            width: 100%;
                                        }
                                    </style>
                                </div>
                            </div> --}}

                    </section>

                </div>
            </div>

            <x-hero :users="$users"></x-hero>

        </div>
    </div>

</div>
