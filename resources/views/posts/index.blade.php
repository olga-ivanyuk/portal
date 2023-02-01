<x-layout>

    <div class="main overflow-hidden">

        <x-header/>

        <!-- ***** Breadcrumb Area Start ***** -->
        <section class="section breadcrumb-area overlay-dark d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Breamcrumb Content -->
                        <div class="breadcrumb-content text-center">
                            <h2 class="text-white text-uppercase mb-3">Blog Grid</h2>
                            <ol class="breadcrumb d-flex justify-content-center">
                                <li class="breadcrumb-item"><a class="text-uppercase text-white"
                                                               href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a class="text-uppercase text-white"
                                                               href="index.html">Pages</a></li>
                                <li class="breadcrumb-item text-white active">Blog - Left Sidebar</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Breadcrumb Area End ***** -->

        <!-- ***** Blog Area Start ***** -->
        <section id="blog" class="section blog-area ptb_100">
            <div class="container">
                <div class="row">
                    <x-aside :$search/>
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            @foreach($posts as $post)
                            <x-posts.article :post="$post"/>

                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12">
                                {{ $posts->links() }}
                                <!-- Pagination -->
{{--                                <ul class="pagination justify-content-center">--}}
{{--                                    <li class="disabled px-1">--}}
{{--                                        <a href="#" aria-label="Previous">--}}
{{--                                            <i class="fas fa-arrow-left"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="px-1"><a href="#">1</a></li>--}}
{{--                                    <li class="active px-1"><a href="#">2</a></li>--}}
{{--                                    <li class="px-1"><a href="#">3</a></li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" aria-label="Next">--}}
{{--                                            <i class="fas fa-arrow-right"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ***** Blog Area End ***** -->

        <!--====== Footer Area Start ======-->
        <footer class="section footer-area">
            <!-- Footer Top -->
            <div class="footer-top ptb_100">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Footer Title -->
                                <h3 class="footer-title text-white text-uppercase mb-2">About Us</h3>
                                <ul>
                                    <li class="py-2"><a class="text-white-50" href="#">Company Profile</a></li>
                                    <li class="py-2"><a class="text-white-50" href="#">Testimonials</a></li>
                                    <li class="py-2"><a class="text-white-50" href="#">Careers</a></li>
                                    <li class="py-2"><a class="text-white-50" href="#">Partners</a></li>
                                    <li class="py-2"><a class="text-white-50" href="#">Affiliate Program</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Footer Title -->
                                <h3 class="footer-title text-white text-uppercase mb-2">Services</h3>
                                <ul>
                                    <li class="py-2"><a class="text-white-50" href="#">Web Application</a></li>
                                    <li class="py-2"><a class="text-white-50" href="#">Product Management</a></li>
                                    <li class="py-2"><a class="text-white-50" href="#">User Interaction Design</a></li>
                                    <li class="py-2"><a class="text-white-50" href="#">UX Consultant</a></li>
                                    <li class="py-2"><a class="text-white-50" href="#">Social Media Marketing</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Footer Title -->
                                <h3 class="footer-title text-white text-uppercase mb-2">Support</h3>
                                <ul>
                                    <li class="py-2"><a class="text-white-50" href="#">Frequently Asked</a></li>
                                    <li class="py-2"><a class="text-white-50" href="#">Terms &amp; Conditions</a></li>
                                    <li class="py-2"><a class="text-white-50" href="#">Privacy Policy</a></li>
                                    <li class="py-2"><a class="text-white-50" href="#">Help Center</a></li>
                                    <li class="py-2"><a class="text-white-50" href="#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <!-- Footer Items -->
                            <div class="footer-items">
                                <!-- Footer Title -->
                                <h3 class="footer-title text-white text-uppercase mb-2">Follow Us</h3>
                                <p class="text-white-50 mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Tenetur, quae.</p>
                                <!-- Social Icons -->
                                <ul class="social-icons list-inline pt-2">
                                    <li class="list-inline-item px-1"><a href="#"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item px-1"><a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item px-1"><a href="#"><i class="fab fa-google-plus"></i></a>
                                    </li>
                                    <li class="list-inline-item px-1"><a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li class="list-inline-item px-1"><a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Copyright Area -->
                            <div
                                class="copyright-area d-flex flex-wrap justify-content-center justify-content-sm-between text-center py-4">
                                <!-- Copyright Left -->
                                <div class="copyright-left text-white-50">&copy; Copyrights 2020 Digimax All rights
                                    reserved.
                                </div>
                                <!-- Copyright Right -->
                                <div class="copyright-right text-white-50">Made with <i class="fas fa-heart"></i> By <a
                                        href="#">Themeland</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--====== Footer Area End ======-->

        <!--====== Modal Search Area Start ======-->
        <div id="search" class="modal fade p-0">
            <div class="modal-dialog dialog-animated">
                <div class="modal-content h-100">
                    <div class="modal-header" data-dismiss="modal">
                        Search <i class="far fa-times-circle icon-close"></i>
                    </div>
                    <div class="modal-body">
                        <form class="row">
                            <div class="col-12 align-self-center">
                                <div class="row">
                                    <div class="col-12 pb-3">
                                        <h2 class="search-title mb-3">What are you looking for?</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent diam lacus,
                                            dapibus sed imperdiet consectetur.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 input-group">
                                        <input type="text" class="form-control" placeholder="Enter your keywords">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 input-group align-self-center">
                                        <button class="btn btn-bordered mt-3">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--====== Modal Search Area End ======-->

        <!--====== Modal Responsive Menu Area Start ======-->
        <div id="menu" class="modal fade p-0">
            <div class="modal-dialog dialog-animated">
                <div class="modal-content h-100">
                    <div class="modal-header" data-dismiss="modal">
                        Menu <i class="far fa-times-circle icon-close"></i>
                    </div>
                    <div class="menu modal-body">
                        <div class="row w-100">
                            <div class="items p-0 col-12 text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== Modal Responsive Menu Area End ======-->
    </div>
</x-layout>
