<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <header class="hero position-fixed">
            <div class="container hero-container text-center align-content-between">

                <div>
                    <img src="{{ asset('storage/userprofile') }}/{{$users->image}}" class="hero-img mb-4 rounded-circle"
                        alt="Bootstrap Themes" width="140" height="140" loading="lazy">

                    <h2 class="fw-bold">{{$users->name}}</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quam risus nam ma aliquet.
                        Libero
                        porta in sodales.</p>
                    <div class="social-icon my-2">
                        <p>
                            <a class="social-link mx-3 active" href="{{$users->facebook ?? '#'}}" target="_blank">
                                <iconify-icon icon="icomoon-free:facebook"></iconify-icon>
                            </a>
                            <a class="social-link mx-3 " href="{{$users->instagram ?? '#'}}" target="_blank">
                                <iconify-icon icon="icomoon-free:instagram"></iconify-icon>
                            </a>
                            <a class="social-link mx-3 " href="{{$users->twitter ?? '#'}}" target="_blank">
                                <iconify-icon icon="icomoon-free:twitter"></iconify-icon>
                            </a>
                            {{-- <a class="social-link mx-3 " href="#">
                                <iconify-icon icon="icomoon-free:youtube"></iconify-icon>
                            </a> --}}
                        </p>

                    </div>

                </div>
            </div>
        </header>
    </div>
</div>
