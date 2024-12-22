<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CVSU Bacoor Landing Page</title>
        
        
        <link rel="icon" href="{{ asset('assets/cvsulogo.png') }}" type="image/png">
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('landingpage/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="https://cvsu.edu.ph/bacoor/">CvSU - Bacoor City Campus</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <!-- Hidden dropdown for desktop view -->
                        <li class="nav-item dropdown d-none d-lg-block">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Log  in
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ url('student/login') }}">Student</a></li>
                                <li><a class="dropdown-item" href="{{ url('registrar/login') }}">Registrar</a></li>
                                <li><a class="dropdown-item" href="{{ url('department/login') }}">Department</a></li>
                                <li><a class="dropdown-item" href="{{ url('admin/login') }}">Admin</a></li>
                            </ul>
                        </li>
                        
                        <!-- List items directly displayed for mobile view -->
                        <li class="nav-item d-lg-none">
                            <span class="nav-link fw-bold">Log in:</span> <!-- Title -->
                        </li>
                        <li class="nav-item d-lg-none ms-3"> <!-- Indented list items -->
                            <a class="nav-link" href="{{ url('student/login') }}">Student</a>
                        </li>
                        <li class="nav-item d-lg-none ms-3">
                            <a class="nav-link" href="{{ url('registrar/login') }}">Registrar</a>
                        </li>
                        <li class="nav-item d-lg-none ms-3">
                            <a class="nav-link" href="{{ url('department/login') }}">Department</a>
                        </li>
                        <li class="nav-item d-lg-none ms-3">
                            <a class="nav-link" href="{{ url('admin/login') }}">Admin</a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </nav>
            
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">CvSU-B Enrollment System for BS IT and BS CS</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">CvSU Bacoor City Campus is a branch of Cavite State University that offers various undergraduate programs. </p>
                        <a class="btn btn-light btn-xl" href="#about">View More</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        
                        <h2 class="text-white mt-0">Quality Policy</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">We Commit to the highest standards of education, value our stakeholders, Strive for continual improvement of our products and services, and Uphold the University’s tenets of Truth, Excellence, and Service to produce globally competitive and 
                            morally upright individuals.</p>                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">School Mission and Vision</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5 justify-content-center">
                  <div class="col-lg-6 col-md-6 text-center">
                    <div class="mt-5">
                      <div class="mb-2"><i class="bi-eye fs-1 text-primary"></i></div>
                      <h3 class="h4 mb-2">School Vision</h3>
                      <p class="text-muted mb-0">The premier university in historic Cavite globally recognized for excellence in character development, academics, research, innovation and sustainable community engagement.</p>
                    </div>
                  </div>
              
                  <div class="col-lg-6 col-md-6 text-center">
                    <div class="mt-5">
                      <div class="mb-2"><i class="bi-book fs-1 text-primary"></i></div>
                      <h3 class="h4 mb-2">School Mission</h3>
                      <p class="text-muted mb-0">Cavite State University shall provide excellent, equitable and relevant educational opportunities in the arts, sciences and technology through quality instruction and responsive research and development activities. It shall produce professional, skilled and morally upright individuals for global competitiveness.</p>
                    </div>
                  </div>
                </div>
              </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="https://www.facebook.com/its.cvsubacoor" title="Project Name">
                            <img class="img-fluid" src="{{ asset('landingpage/assets/img/portfolio/thumbnails/1.png') }}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Information Technology Society</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="https://www.facebook.com/CvSUEDUCSociety" title="Project Name">
                            <img class="img-fluid" src="{{ asset('landingpage/assets/img/portfolio/thumbnails/2.png') }}" alt="..." />

                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Teacher Education Society</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="https://www.facebook.com/societashumanaresource.ph" title="Project Name">
                            <img class="img-fluid" src="{{ asset('landingpage/assets/img/portfolio/thumbnails/3.jpg') }}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Societas Humana Resource</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="https://www.facebook.com/CriminologyBacoorOfficial" title="Project Name">
                            <img class="img-fluid" src="{{ asset('landingpage/assets/img/portfolio/thumbnails/4.png') }}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">La Ciencia de Crimines Sociedad</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="https://www.facebook.com/lms.jma2011" title="Project Name">
                            <img class="img-fluid" src="{{ asset('landingpage/assets/img/portfolio/thumbnails/5.png') }}" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Marketing Society</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="https://www.facebook.com/bshmsocietycvsubacoor" title="Project Name">
                            <img class="img-fluid" src="{{ asset('landingpage/assets/img/portfolio/thumbnails/6.png') }}" alt="..." />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Hospitatlity Management Society</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="https://www.facebook.com/acscvsubacoor" title="Project Name">
                            <img class="img-fluid" src="{{ asset('landingpage/assets/img/portfolio/thumbnails/2.png') }}" alt="..." />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Category</div>
                                <div class="project-name"> Alliance of Computer Scientists</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright @2024 - CvSU Bacoor Enrollment System</div>
                    <div>
                        <a href="#" class="text-muted">Privacy Policy</a>
                        &middot;
                        <a href="#" class="text-muted">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('landingpage/js/scripts.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
