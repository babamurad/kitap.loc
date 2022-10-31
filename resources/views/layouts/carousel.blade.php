<!-- Carousel Wrapper -->

<div id="carousel-example-3" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($carousels as $carousel)
            <li data-target="#carousel-example-3" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <!-- Indicators -->
<?php $k = 1; ?>

    <!-- Slides -->
        <div class="carousel-inner" role="listbox">
        @foreach($carousels as $carousel)
            <!-- First slide -->
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" id="carit<?php echo $k; ?>" style="background-image: url({{asset('storage/' .$carousel->img)}});">
                <!-- Mask -->
                <div class="view">
                    <div
                        class="h-100 d-flex justify-content-center align-items-center mask rgba-black-light white-text text-center">
                        <ul class="list-unstyled animated fadeInUp col-md-12">
                            <li>
                                <h1 class="display-4 font-weight-bold wow fadeIn slide-head-text"
                                    data-wow-delay="0.3s">{{ $carousel->title }}</h1>
                                <hr class="hr-light wow fadeIn w-50" data-wow-delay="0.3s">
                            </li>
                            <li>
                                <h3 class="my-4 wow fadeIn slide-text"
                                    data-wow-delay="0.3s">{{ $carousel->subtitle }}</h3>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- Mask -->
            </div>
            <!-- First slide -->
            <?php $k++; ?>
            @endforeach


        </div>
        <!-- Slides -->

        <!-- Controls -->
        <a class="carousel-control-prev" href="#carousel-example-3" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-3" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!-- Controls -->
</div>
<!-- Carousel Wrapper -->

