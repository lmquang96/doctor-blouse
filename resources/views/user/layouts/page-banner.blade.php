<div class="page-banner overlay-dark bg-image" style="background-image: url(/assets/img/bg_image_1.jpg);">
  <div class="banner-section">
    <div class="container text-center wow fadeInUp">
      <nav aria-label="Breadcrumb">
        <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ !empty($breadcrumbParent) ? $breadcrumbParent : 'Blog' }}</li>
        </ol>
      </nav>
      <h1 class="font-weight-normal">{{ !empty($breadcrumbTitle) ? $breadcrumbTitle : '' }}</h1>
    </div> <!-- .container -->
  </div> <!-- .banner-section -->
</div> <!-- .page-banner -->