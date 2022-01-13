<!DOCTYPE html>
<html lang="en">
<!-- ======= Header ======= -->   
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">ร้านสเต็ก OK พรีเมียม</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">หน้าแรก</a></li>
          <li><a class="nav-link scrollto" href="#about">เกี่ยวกับ</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">แนะนำ</a></li>
          <li><a class="nav-link scrollto" href="#team">ผู้จัดทำ</a></li>
          <li><a class="nav-link scrollto" href="#pricing">โปรโมชั่น</a></li>
          <li><a class="nav-link scrollto" href="#contact">ช่องทางการติดต่อ</a></li>

          @if (Route::has('login'))
              <div class="top-right links">
                @auth
                <a class="nav-link" href="{{ url('/home') }}">Home</a>
                @else
                <a class="nav-link" href="{{ route('login') }}">Login</a>
                @endauth
              </div>
              @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>