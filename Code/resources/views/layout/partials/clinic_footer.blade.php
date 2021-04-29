<!-- Footer -->
<footer class="footer">

    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-about">
                        <div class="footer-logo">
                            <img src="{{Storage::disk('s3')->url(\App\Settings::where('id', 1)->value('website_logo_footer'))}}" alt="logo">
                        </div>
                        <div class="footer-about-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                            <div class="social-icon">
                                <ul>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-3 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">For Patients</h2>
                        <ul>
                            <li><a href="#">Search for Doctors</a></li>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Register</a></li>
                            <li><a href="#">Booking</a></li>
                            <li><a href="#">Patient Dashboard</a></li>
                        </ul>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-3 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">For Doctors</h2>
                        <ul>
                            <li><a href="#">Appointments</a></li>
                            <li><a href="#">Chat</a></li>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Register</a></li>
                            <li><a href="#">Doctor Dashboard</a></li>
                        </ul>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-3 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-contact">
                        <h2 class="footer-title">Contact Us</h2>
                        <div class="footer-contact-info">
                            <div class="footer-address">
                                <span><i class="fas fa-map-marker-alt"></i></span>
                                <p> 1811 Amman,<br> Jordan, JO 94108 </p>
                            </div>
                            <p>
                                <i class="fas fa-phone-alt"></i>
                                +962 77 777 7777
                            </p>
                            <p class="mb-0">
                                <i class="fas fa-envelope"></i>
                                support@doccure.com
                            </p>
                        </div>
                    </div>
                    <!-- /Footer Widget -->

                </div>

            </div>
        </div>
    </div>
    <!-- /Footer Top -->

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container-fluid">

            <!-- Copyright -->
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="copyright-text">
                            <p class="mb-0">&copy; 2021 Doccure. All rights reserved.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">

                        <!-- Copyright Menu -->
                        <div class="copyright-menu">
                            <ul class="policy-menu">
                                <li><a href="{{route('term-condition')}}" >Terms and Conditions</a></li>
                                <li><a href="{{route('privacy-policy')}}" >Policy</a></li>
                            </ul>
                        </div>
                        <!-- /Copyright Menu -->

                    </div>
                </div>
            </div>
            <!-- /Copyright -->

        </div>
    </div>
    <!-- /Footer Bottom -->

</footer>
<!-- /Footer -->

</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsZARr0gYQIuhbaskZjeDNQ9wuc45PwRI&callback=initMap"
        async
></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<!-- Select2 JS -->
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

<!-- Datetimepicker JS -->
<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<!-- Slick JS -->
<script src="{{asset('assets/js/slick.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('assets/js/script.js')}}"></script>

</body>
</html>
