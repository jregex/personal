<div class="hero-sidebar col-xl-3 offset-xl-1" style="height: 100%;">
    <header class="hero position-fixed">
        <div class="hero-container align-content-end container my-4 pt-3 text-center">

            <div>
                <img src="{{ asset('storage/userprofile') }}/{{ $users->image }}" class="hero-img rounded-circle mb-4"
                    alt="Bootstrap Themes" width="140" height="140" loading="lazy">
                <h2 class="fw-bold mt-3">{{ $users->name }}</h2>
                <p>{{ $users->resume }} shdjkfh khs fjhsjkdhf skdhf jksdhfiwuehinuidncsiufdhishfwiuen sud
                    insudf iuwehriunsdif siudfiu shiehrihiusdnf siudniu ssihsidisuhdfiwensidufnisdfhu.</p>
                <div class="social-icon my-3">
                    <p>
                        <a class="social-link mx-3" href="{{$users->facebook ?? '#'}}" target="_blank">
                            <iconify-icon icon="icomoon-free:facebook"></iconify-icon>
                        </a>
                        <a class="social-link mx-3" href="{{$users->instagram ?? '#'}}" target="_blank">
                            <iconify-icon icon="icomoon-free:instagram"></iconify-icon>
                        </a>
                        <a class="social-link mx-3" href="{{$users->twitter ?? '#'}}" target="_blank">
                            <iconify-icon icon="icomoon-free:twitter"></iconify-icon>
                        </a>
                        {{-- <a class="social-link mx-3" href="#">
                            <iconify-icon icon="icomoon-free:youtube"></iconify-icon>
                        </a> --}}
                    </p>

                </div>
            </div>
        </div>
    </header>
</div>
