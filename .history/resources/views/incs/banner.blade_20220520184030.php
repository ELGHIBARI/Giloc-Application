<!-- ========================= SECTION Banner ========================= -->
<section class="section-intro padding-y-sm">
  <div class="container">
    @php
      $images = array('assets/images/1.jpg', 'assets/images/1.jpg');
    @endphp
    <div class="intro-banner-wrap">
      <div id="carouselExampleIndicators" class="carousel" data-ride="carousel">
        <ol class="carousel-indicators">
            @for($i=0;$i<=count($images)-1;$i++) 
              <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="img{{$i}}">
              </li>
            @endfor
        </ol>
        <div class="carousel-inner">
          @php $i=0 @endphp
          @foreach($images as $image)
          <div class="carousel-item img{{$i}}">
            {{-- <img src="assets/images/1.jpg" class="img-fluid rounded"> --}}
              <img class="img-fluid rounded" src="{{ $image }}" alt="First slide">
          </div>
          @php $i++ ;@endphp
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
      </div>
    </div>    
  </div> <!-- container //  -->
</section>
  <!-- ========================= SECTION banner END// ========================= -->

  <script>
    // $('#bologna-list a').on('click', function(e) {
    //     e.preventDefault()
    //     $(this).tab('show')
    // });

    $(window).on("load", function() {
        var nslide = $(".img0").data("slide-to");
        console.log(nslide);
        if (nslide == 0)
            $(".img0").addClass("active");
    });
</script>
