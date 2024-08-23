<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Muiz Muharram" />
    <meta name="description" content="Muiz Muharram personal website" />
    <title>Muiz Muharram</title>

    <link href="/images/logo.png" rel="shortcut icon" />

    <!-- boostrap -->
    <link rel="stylesheet"
        href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css') }}" />
    <!-- end boostrap -->

    <!-- icon -->
    <link rel="stylesheet"
        href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css') }}">
    <!-- end icon -->

    <!-- swiper -->
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css') }}" />
    <!-- end swiper -->

    <!-- style -->
    <link rel="stylesheet" href="{{ asset('landing-page/style.css') }}" />
    <!-- end style -->
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top bg-md-white">
        <div class="container">
            <a class="navbar-brand fw-bold scroll-link text-uppercase" href="#">E-Monev</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-uppercase">
                    <li class="nav-item">
                        <a class="nav-link scroll-link active" aria-current="page" href="#header"
                            id="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="#portofolio">Program</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    {{-- hero --}}
    <div class="hero" id="home">
        <div class="container">
            <h1 class="display-4">Selamat Datang di E-Monev mitra pengajar</h1>
            <p class="lead">Tingkatkan efisiensi dan efektivitas evaluasi kinerja pengajar dengan platform kami yang inovatif dan mudah digunakan.</p>
            <a href="{{route('login')}}" class="btn btn-primary btn-lg">Pelajari Lebih Lanjut</a>
        </div>
    </div>
    {{-- end hero --}}


    <!-- about -->
    <section class="about-section" id="about">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <p class="text-orange text-center">Tentang</p>
                    <h2 class="section-title text-center mb-5">
                        Kegiatan VSGA (Vocational School Graduate Academy)
                    </h2>
                    <p class="text-center">
                        VSGA (Vocational School Graduate Academy) adalah sebuah program pelatihan yang diselenggarakan
                        untuk para lulusan SMK (Sekolah Menengah Kejuruan) di Indonesia. Program ini bertujuan untuk
                        meningkatkan keterampilan dan kompetensi para lulusan SMK agar siap masuk ke dunia kerja atau
                        melanjutkan pendidikan ke jenjang yang lebih tinggi. Kegiatan VSGA biasanya mencakup pelatihan
                        teknis, pembelajaran berbasis proyek, serta sertifikasi keahlian di berbagai bidang industri
                        yang relevan dengan kebutuhan pasar kerja.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end about -->

    {{-- program --}}
    <div class="program-list">
        <div class="container">
            <p class="text-orange text-center">Tentang</p>
            <h2 class="section-title text-center mb-5">
                Kegiatan VSGA (Vocational School Graduate Academy)
            </h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Program 1">
                        <div class="card-body">
                            <h5 class="card-title">Program 1</h5>
                            <p class="card-text">Deskripsi singkat tentang program 1 yang ditawarkan oleh E-Monev Mitra Pengajar.</p>
                            <a href="{{route('login')}}" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Program 2">
                        <div class="card-body">
                            <h5 class="card-title">Program 2</h5>
                            <p class="card-text">Deskripsi singkat tentang program 2 yang ditawarkan oleh E-Monev Mitra Pengajar.</p>
                            <a href="#" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Program 3">
                        <div class="card-body">
                            <h5 class="card-title">Program 3</h5>
                            <p class="card-text">Deskripsi singkat tentang program 3 yang ditawarkan oleh E-Monev Mitra Pengajar.</p>
                            <a href="#" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end program --}}

    <!-- footer -->
    <footer class="footer" id="footer">
        <div class="container-fluid">
            <div class="container">
                <div class="row align-items-center text-white">
                    <hr />
                    <p class="text-center fs-7">
                        @Created by <strong class="">Muiz Muharram</strong>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- boostrap -->
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- end boostrap -->

    <!-- swiper -->
    <script src="{{ url('https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js') }}"></script>
    <!-- end swiper -->

    <script src="/js/script.js"></script>
</body>

</html>
