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
                    <div class="text-muted">Copyright &copy; 2024 - CvSU Bacoor Enrollment System</div>
                    <div>
                        <a href="#" class="text-muted" data-bs-toggle="modal" data-bs-target="#privacyPolicyModal">Privacy Policy</a>
                        &middot;
                        <a href="#" class="text-muted" data-bs-toggle="modal" data-bs-target="#termsConditionsModal">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Privacy Policy Modal -->
        <div class="modal fade" id="privacyPolicyModal" tabindex="-1" aria-labelledby="privacyPolicyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="privacyPolicyModalLabel">Privacy Policy</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>1. Introduction</h6>
                        <p>Cavite State University - Bacoor Campus, (hereinafter referred to as "the Institution") is committed to protecting the privacy and security of your personal data. This Privacy Policy explains how we collect, use, process, store, and protect your personal information when you use the Enrollment System for Computer Science and Information Technology Courses at CvSU-Bacoor City Campus (hereinafter referred to as "the System"). This policy is compliant with the Data Privacy Act of 2012 (Republic Act No. 10173 or "RA 10173") of the Philippines, and its Implementing Rules and Regulations (IRR).</p>
        
                        <h6>2. Definitions</h6>
                        <p><strong>Personal Information:</strong> Any information, whether recorded in a material form or not, from which the identity of an individual is apparent or can be reasonably and directly ascertained by the entity holding the information, or when put together with other information would directly and certainly identify an individual.</p>
                        <p><strong>Sensitive Personal Information:</strong> Personal information about an individual’s race, ethnic origin, marital status, age, color, religious, philosophical or political affiliations, health, education, genetic or sexual life of a person, or to any proceeding for any offense committed or alleged to have been committed.</p>
                        <p><strong>Data Subject:</strong> The student who is the subject of the personal information.</p>
                        <p><strong>Data Controller:</strong> Cavite State University - Bacoor Campus, which determines the purposes and means of the processing of personal data.</p>
                        <p><strong>Data Processor:</strong> Any person or organization that processes personal data on behalf of the Data Controller.</p>
                        <p><strong>Processing:</strong> Any operation or any set of operations performed upon personal data including, but not limited to, the collection, recording, organization, storage, updating or modification, retrieval, consultation, use, consolidation, blocking, erasure or destruction of data.</p>
                        <p><strong>National Privacy Commission (NPC):</strong> The independent body tasked to administer and implement the provisions of the Data Privacy Act of 2012.</p>
        
                        <h6>3. Information We Collect</h6>
                        <p>We collect the following types of information through the System:</p>
                        <ul>
                            <li><strong>Personal Information:</strong> Full Name, Date of Birth, Place of Birth, Gender, Contact Information, Student Identification Number, Parent/Guardian Information (if applicable)</li>
                            <li><strong>Academic Information:</strong> Courses Enrolled In, Grades, and Academic Standing</li>
                            <li><strong>System Usage Information:</strong> Health Information (e.g., information disclosed for medical accommodations)</li>
                        </ul>
        
                        <h6>4. How We Use Your Information</h6>
                        <p>We use your personal information for the following purposes:</p>
                        <ul>
                            <li>Enrollment and Registration</li>
                            <li>Academic Administration</li>
                            <li>Communication</li>
                            <li>Student Services</li>
                            <li>Compliance with Laws and Regulations</li>
                        </ul>
        
                        <h6>5. Legal Basis for Processing</h6>
                        <p>We process your personal information based on one or more of the following legal bases:</p>
                        <ul>
                            <li>Consent</li>
                            <li>Contractual Necessity</li>
                            <li>Legal Obligation</li>
                            <li>Legitimate Interest</li>
                        </ul>
        
                        <h6>6. Sharing of Information</h6>
                        <p>We may share your personal information with the following parties:</p>
                        <ul>
                            <li>Faculty and Staff</li>
                            <li>Authorized Institutional Partners</li>
                        </ul>
        
                        <h6>7. Data Storage and Security</h6>
                        <p>We store your personal data securely and employ various security measures to protect it. We also have established procedures for responding to data breaches in compliance with RA 10173.</p>
        
                        <h6>8. Your Rights as a Data Subject</h6>
                        <p>You have the following rights with respect to your personal information under RA 10173:</p>
                        <ul>
                            <li>Right to be Informed</li>
                            <li>Right to Access</li>
                            <li>Right to Rectification</li>
                            <li>Right to Erasure or Blocking</li>
                            <li>Right to Data Portability</li>
                            <li>Right to Object</li>
                            <li>Right to File a Complaint</li>
                            <li>Right to Damages</li>
                        </ul>
        
                        <h6>9. Updates to this Privacy Policy</h6>
                        <p>We may update this Privacy Policy from time to time. The updated policy will be posted on the System or communicated in other ways.</p>
        
                        <h6>10. Contact Information</h6>
                        <p>If you have any questions or concerns regarding this Privacy Policy, please contact:</p>
                        <p>Ivana Mariel B. Millosa<br>ivanamayemrlbm@gmail.com<br>09912403677<br>Soldiers Hills IV, Molino VI, Bacoor City, Cavite</p>
        
                        <h6>11. Compliance with RA 10173</h6>
                        <p>Cavite State University - Bacoor Campus complies with RA 10173 and its Implementing Rules and Regulations, and will review and update our privacy practices regularly.</p>
        
                        <p>By using the Enrollment System, you acknowledge that you have read and understood this Privacy Policy and agree to the collection and use of your personal information as described.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Terms & Conditions Modal -->
        <div class="modal fade" id="termsConditionsModal" tabindex="-1" aria-labelledby="termsConditionsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="termsConditionsModalLabel">Terms &amp; Conditions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>1. Acceptance of Terms</h4>
                        <p>By accessing and using the Cavite State University - Bacoor Campus' Enrollment System for Computer Science and Information Technology Courses (hereinafter referred to as “the System”), you, the student (“you” or “Student”), agree to be bound by these Terms and Conditions (hereinafter referred to as “Terms”). If you do not agree to these Terms, you are not authorized to use the System. Your continued use of the System constitutes your acceptance of these Terms, as they may be amended from time to time.</p>

                        <h4>2. Purpose of the System</h4>
                        <p>The System is provided by Cavite State University - Bacoor Campus (hereinafter referred to as “the Institution”) to facilitate:</p>
                        <ul>
                            <li>Student registration for courses and programs.</li>
                            <li>Access to course schedules.</li>
                            <li>Management of personal information related to your enrollment.</li>
                            <li>Viewing of grades, and academic progress.</li>
                            <li>Other functions related to your enrollment as determined by the Institution.</li>
                        </ul>

                        <h4>3. User Accounts</h4>
                        <h5>Account Creation:</h5>
                        <p>You will be provided with a unique username and password for accessing the System. You are responsible for maintaining the confidentiality of your login credentials.</p>

                        <h5>Account Security:</h5>
                        <p>You agree to notify the Institution immediately of any unauthorized access to or use of your account. The Institution is not responsible for any damages or losses arising from your failure to secure your account.</p>

                        <h5>Account Usage:</h5>
                        <p>You may only use your account for your personal academic purposes related to enrollment at the Institution. You are not permitted to share your account information or access another student's account.</p>

                        <h4>4. Use of the System</h4>
                        <h5>Lawful Use:</h5>
                        <p>You agree to use the System in compliance with all applicable laws, regulations, and the Institution’s policies.</p>

                        <h5>Appropriate Conduct:</h5>
                        <p>You agree not to use the System to engage in any conduct that is illegal, unethical, offensive, disruptive, or that infringes upon the rights of others. This includes, but is not limited to:</p>
                        <ul>
                            <li>Hacking or attempting to gain unauthorized access to any part of the System.</li>
                            <li>Uploading malicious software or viruses.</li>
                            <li>Harassing, defaming, or impersonating other users.</li>
                            <li>Sharing inappropriate content.</li>
                        </ul>

                        <h5>System Integrity:</h5>
                        <p>You agree not to interfere with the proper functioning of the System.</p>

                        <h4>5. Data Privacy and Security</h4>
                        <h5>Data Collection:</h5>
                        <p>The Institution collects and stores personal information about you for the purpose of providing enrollment services. This may include your name, contact information, and academic records.</p>

                        <h5>Data Use:</h5>
                        <p>The Institution will use your personal information for purposes related to your enrollment, as well as to comply with legal and regulatory obligations.</p>

                        <h5>Data Sharing:</h5>
                        <p>The Institution may share your personal information with authorized parties, such as faculty, staff, and third-party service providers, as needed for the purposes of your enrollment.</p>

                        <h5>Data Security:</h5>
                        <p>The Institution will take reasonable measures to protect your personal information from unauthorized access, use, or disclosure.</p>

                        <p>Privacy Policy: Please refer to the Institution’s Privacy Policy, available at [link to Privacy Policy], for more information about how your data is collected, used, and protected.</p>

                        <h4>6. Academic Information and Accuracy</h4>
                        <h5>Accuracy of Information:</h5>
                        <p>You are responsible for ensuring the accuracy of the information you provide in the System.</p>

                        <h5>Grade Information:</h5>
                        <p>The grades displayed on the System are subject to final review by the Institution and may be updated or corrected.</p>

                        <h5>Transcript Information:</h5>
                        <p>Official transcripts should be requested through the designated channels of the Institution. The information on the System may not be considered an official transcript.</p>

                        <h4>7. System Availability and Maintenance</h4>
                        <h5>Service Uptime:</h5>
                        <p>The Institution will make reasonable efforts to ensure the System is available for your use.</p>

                        <h5>Maintenance:</h5>
                        <p>The Institution may perform scheduled or unscheduled maintenance on the System, which may result in temporary interruptions of service.</p>

                        <h5>No Guarantee:</h5>
                        <p>The Institution does not guarantee uninterrupted or error-free access to the System.</p>

                        <h4>8. Changes to the Terms</h4>
                        <h5>Updates:</h5>
                        <p>The Institution reserves the right to modify these Terms at any time.</p>

                        <h5>Notification:</h5>
                        <p>The Institution will notify you of any material changes to these Terms, either through the System or by other means.</p>

                        <h5>Continued Use:</h5>
                        <p>Your continued use of the System after any changes to these Terms constitutes your acceptance of those changes.</p>

                        <h4>9. Intellectual Property</h4>
                        <h5>Ownership:</h5>
                        <p>The System and all its content are the intellectual property of the Institution or its licensors and are protected by copyright and other intellectual property laws.</p>

                        <h5>Usage:</h5>
                        <p>You are granted a limited, non-exclusive license to access and use the System for your personal, non-commercial purposes as a student of the Institution.</p>

                        <h5>Prohibition:</h5>
                        <p>You are not permitted to modify, copy, reproduce, distribute, or create derivative works based on the System or its content without the Institution’s express written permission.</p>

                        <h4>10. Disclaimer of Warranties</h4>
                        <p>The System is provided “as is” and “as available,” without any warranties of any kind, either express or implied. The Institution disclaims all warranties, including but not limited to, warranties of merchantability, fitness for a particular purpose, and non-infringement.</p>

                        <h4>11. Limitation of Liability</h4>
                        <p>The Institution shall not be liable for any direct, indirect, incidental, special, consequential, or punitive damages, including, without limitation, damages for loss of profits, data, or use, arising from or in connection with your use of the System, whether based on contract, tort, negligence, or any other legal theory.</p>

                        <h4>12. Indemnification</h4>
                        <p>You agree to indemnify and hold harmless the Institution, its officers, directors, employees, and agents from any and all claims, damages, losses, liabilities, costs, and expenses (including attorney's fees) arising from or in connection with your use of the System or any violation of these Terms.</p>

                        <h4>13. Governing Law</h4>
                        <p>These Terms shall be governed by and construed in accordance with the laws of Philippines, without regard to its conflict of law provisions.</p>

                        <h4>14. Contact Information</h4>
                        <p>If you have any questions about these Terms, please contact:</p>
                        <p><strong>Cavite State University - Bacoor Campus</strong><br>
                        Email: <a href="mailto:cvsubacoor@cvsu.edu.ph">cvsubacoor@cvsu.edu.ph</a><br>
                        Phone: (046) 476-5029</p>

                        <h4>15. Entire Agreement</h4>
                        <p>These Terms constitute the entire agreement between you and the Institution regarding your use of the System and supersede all prior or contemporaneous communications and proposals, whether oral or written.</p>

                        <h4>16. Severability</h4>
                        <p>If any provision of these Terms is held to be invalid or unenforceable, the remaining provisions shall remain in full force and effect.</p>

                        <p>By using this Enrollment System, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


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
