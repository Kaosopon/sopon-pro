@include('layouts/layout_front/head')

<!-- ======= Header ======= -->
@include('layouts/layout_front/header')
<!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container position-relative">
        <h1>ร้านสเต็ก OK พรีเมียม</h1>
        <h2>(OK Premium Steak House Website) </h2>
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
</section><!-- End Hero -->
<main id="main">



    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset('admin/front_end/assets/img/about.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <h3>(OK Premium Steak House Website)</h3>
                    <h4>ร้าน OK สเต็กพรีเมียม (สาขาบางศรีเมือง)</h4>
                    <p> อย่าลืมแวะมาอุดหนุนกันที่ร้าน OK สเต็กพรีเมียม (สาขาบางศรีเมือง)
                        อาหารสะอาด,รสชาติอร่อย,บริการดีเยี่ยม,น่ากินทุกอย่าง,อร่อยคุ้ม,ราคาเบาๆ ต้องลองแล้วจะติดใจ </p>
                    <p>( OK สเต็กพรีเมียม ก็อร่อยเหมือนกันนะเนี่ย!) </p>

                    <div class="row">
                        <div class="col-md-6">
                            <i class="bx bx-receipt"></i>
                            <h4>ที่ตั้งของร้านสเต็ก OK พรีเมียม</h4>
                            <p>ที่ตั้งของร้าน:ถนน บางศรีเมือง ตำบล บางกร่าง อำเภอเมืองนนทบุรี จังหวัดนนทบุรี 11000
                            </p>
                        </div>
                        <div class="col-md-6">
                            <i class="bx bx-cube-alt"></i>
                            <h4>เจ้าของร้าน คุณวิภาดา ลาภเหลือ</h4>
                            <p>ร้านเปิดวันที่:วันที่1ธันวาคม2563 จนถึงทุกวันนี้ </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
        <div class="container">

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Clients</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Projects</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Hours Of Support</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Hard Workers</p>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">

            <div class="text-center">
                <h3>slogan</h3>
                <p> When you're hungry, don't know what to eat. Don't forget to come and support us at OK Premium Steak.
                    (Bang Si Muang Branch) Clean food, delicious taste, excellent service. Everything is delicious,
                    delicious, inexpensive, you must try it and you will love it. </p>
                <a class="cta-btn" href="#">slogan</a>
            </div>

        </div>
    </section><!-- End Cta Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title">
                <h2>Menu</h2>
                <p>ก็จะมีหน้าของเมนูและราคาและก็ช่องทางการติดต่อที่อยู่ของร้านและก็รูปบรรยากาศของทางร้าน</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">หน้าทั้งหมด</li>
                        @foreach($types as $type)
                        <li data-filter=".filter-{{ $type->id_types }}">{{ $type->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container">

                @foreach($menus as $menu)
                <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $menu->type->id_types }}">
                    <img src="{{ asset('admin/images/'.$menu->image) }}"
                        class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{ $menu->text }}</h4>

                        <a href="{{ asset('admin/images/'.$menu->image) }}"
                            data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{ $menu->text }}">
                            <i class="bx bx-plus"></i>
                        </a>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Team</h2>
                <p>ผู้จัดทำโดย</p>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{ asset('admin/front_end/assets/img/team/team-1.png') }}"
                                class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>นายโสภณ ลาภเหลือ</h4>
                            <span>(ผู้จัดทำ)</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{ asset('admin/front_end/assets/img/team/team-2.png') }}"
                                class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>นายศักณพจน์ เคนสิรินนท์</h4>
                            <span>(ผู้จัดทำ)</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{ asset('admin/front_end/assets/img/team/team-3.png') }}"
                                class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>อาจารย์ศิริรัตน์ ม่วงเถื่อน </h4>
                            <span>(อาจารย์ที่ปรึกษา)</span>
                        </div>
                    </div>
                </div>

    </section><!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container">

            <div class="section-title">
                <h2>promotion</h2>
                <p>โปรโมชั่นและเมนูที่ขายดีของทางร้าน</p>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="box">
                        <h3>สลัดผัก </h3>
                        <img src="{{ asset('admin/front_end/assets/img/menu/33.png') }}" class="testimonial-img"
                            alt="">
                        <h4><sup>$</sup>35<span> / จาน</span></h4>
                        <ul>
                            <li>สลัดผัก </li>

                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Buy Now</a>
                            </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                    <div class="box ">
                        <h3>สเต็กพอร์คชอพ</h3>
                        <img src="{{ asset('admin/front_end/assets/img/menu/32.png') }}" class="testimonial-img"
                            alt="">
                        <h4><sup>$</sup>70<span> / จาน</span></h4>
                        <ul>
                            <li>สเต็กพอร์คชอพ</li>

                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <div class="box">
                        <h3>สเต็กปลาแซลมอน</h3>
                        <img src="{{ asset('admin/front_end/assets/img/menu/31.png') }}" class="testimonial-img"
                            alt="">
                        <h4><sup>$</sup>129<span> / จาน</span></h4>
                        <ul>
                            <li>สเต็กปลาแซลมอน</li>

                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <div class="box featured"">
              <span class=" advanced">พิเศษ</span>
                        <h3>จานWow</h3>
                        <img src="{{ asset('admin/front_end/assets/img/menu/28.png') }}" class="testimonial-img"
                            alt="">
                        <h4><sup>$</sup>359<span> / จาน</span></h4>
                        <ul>
                            <li>สเต็ก จานใหญ่</li>
                            <li>(ในจานก็จะมีสเต็กอยู่4อย่างและอื่นๆ)</li>
                            <li>สเต็กปลา,สเต็กหมู,สเต็กไก่,สเต็กเนื้อริบอาย) </li>
                            <li>และก็จะเป็นไส้กรอก3เกรอและมีสลัดผัก</li>
                            <li>กับเฟรนฟรายกับขนมปัง</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Pricing Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contact</h2>
                <p>ที่อยู่ของร้านและช่องทางการติดต่อ</p>
            </div>

            <div class="row">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>ที่อยู่ของร้าน</h3>
                                <p>ที่อยู่ของร้าน:ถนน บางศรีเมือง ตำบล บางกร่าง อำเภอเมืองนนทบุรี จังหวัดนนทบุรี 11000
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>ติอต่อทางออนไลน์</h3>
                                <p>facebook: วิภาดา ลาภเหลือ<br>เพจ: OK สเต็กพรีเมี่ยม สาขาบางศรีเมือง</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>ติดต่อทางเบอร์โทร</h3>
                                <p>0869175545<br>0952707692</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                    required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('layouts/layout_front/footer')
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('admin/front_end/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/front_end/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('admin/front_end/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('admin/front_end/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('admin/front_end/assets/vendor/purecounter/purecounter.js') }}"></script>
<script src="{{ asset('admin/front_end/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('admin/front_end/assets/js/main.js') }}"></script>

</body>

</html>
