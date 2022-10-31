@extends('layouts.layout')

@section('content')
    <div class="container">

        <!--Section: About-->
        <section id="about" class="mt-4 mb-2">

            <!--Secion heading-->
            <h2 class="text-center my-5 font-weight-bold wow fadeIn" data-wow-delay="0.2s">BIZ BARADA</h2>

            <!--First row-->
            <div class="row">

                <!--First column-->
                <div class="col-lg-5 col-md-12 mb-5 pb-4 wow fadeIn" data-wow-delay="0.4s">

                    <!--Image-->
                    <img src="{{ asset('assets/img/about.jpg') }}"
                         class="img-fluid z-depth-1 rounded" alt="My photo">

                </div>
                <!--First column-->

                <!--Second column-->
                <div class="col-lg-6 text-justify dark-grey-text ml-lg-auto col-md-12 animated wow fadeIn" data-wow-delay="0.4s" style="justify-content: center;">

                    <!--Description-->
                    <p>Kitaphananyň dünyä ülňelerine laýyk gelyän döwrebap binasy özüniň binagärlik
                        çözgüdi bilen tapawutlanyar.Kitaphananyň täze binasynyň umumy tutyan <strong>meydany 26965,0 inedördül</strong>
                        metr. Binanyň <strong>beyikligi 30 metre</strong>  barabar, ini 60 metr, gapdal uzynlygy 60 metr.

                    </p>

                    <p >Kitaphana 3 gatdan ybarat. Kitaphanada 1 million neşir birligini saklamak hem-de
                        birbada 450 okyja hyzmat etmek üçin ähli mümkinçilikler döredilendir. Kitaphananyň ululy-kiçili
                        10 sany umumy  okalga zaly  bar.</p>
                </div>
                <!--Second column-->

            </div>
            <!--First row-->

        </section>
        <!--Section: About-->

        <hr>

        <!--Projects section v.3-->
        <section id="gatlar" class="mt-4 mb-5 pb-4">

            <!--Section heading-->
            <h2 class="text-center mb-5 font-weight-bold pt-5 pb-4 my-5 wow fadeIn" data-wow-delay="0.2s">GATLAR</h2>
            <!--Section description-->
            <!--First row-->
            <div class="row wow fadeIn" data-wow-delay="0.4s">

                <!--First column-->
                <div class="col-md-12">

                    <div class="mb-2">

                        <!--Nav tabs-->
                        <ul class="nav md-pills pills-primary d-flex justify-content-center" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#panel31" role="tab">
                                    <i class="fas fa-book-reader fa-2x"></i>
                                    <br> 1-nji gaty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#panel32" role="tab">
                                    <i class="fas fa-tv fa-2x"></i>
                                    <br> 2-nji gaty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#panel33" role="tab">
                                    <i class="fas fa-university fa-2x"></i>
                                    <br> 3-nji gaty</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#panel34" role="tab">
                                    <i class="fas fa-home fa-2x"></i>
                                    <br> Obserwatoriýasy</a>
                            </li>
                        </ul>

                    </div>

                    <!--Tab panels-->
                    <div class="tab-content">

                        <!--Panel 1-->
                        <div class="tab-pane fade in show active" id="panel31" role="tabpanel">
                            <br>

                            <!--First row-->
                            <div class="row">
                                <!--First column-->
                                <div class="col-lg-5 col-md-12">

                                    <!--Featured image-->
                                    <div class="view overlay  d-flex align-items-center mb-2">
                                        <img src="{{ asset('assets/img/1gaty.jpg') }}" class="rounded img-fluid"
                                             alt="sample image">
                                    </div>
                                </div>
                                <!--First column-->

                                <!--Second column-->
                                <div class="col-lg-6 ml-lg-auto col-md-12 text-center text-md-left">

                                    <!--Title-->
                                    <h4 class="mb-4 text-center text-uppercase">1-nji gaty</h4>

                                    <!--Description-->
                                    <p class="text-muted text-justify">1-nji gatda kitaphana hyzmatyny guramak hem-de kitaphananyň ýörite bölümleriniň işini  talaba  layyk  ýola goýmak üçin ähli mümkinçilikler we şertler döredilen. Bu gatda 30 orunlyk 3 sany, 25 orunlyk 1 sany umumy okalga zaly, 12 orunlyk internet zaly bar. Okalga zallary giň hem-de ýagty edilip  ýerleşdirilen. Şeyle hem 1-nji gatda çagalar üçin oýun  otagy,  ýörite bölümleriň iş otaglary, golasty gazna üçin gaznahanalar, okyjylary hasaba almak we kitap bermek boýunça ýörite beketler yerleşdirilen. Bu gatda elektron katalogyny we adaty kataloglary yerleşdirmek üçin mümkinçilikler  göz  öňünde tutulan.</p>

                                </div>
                                <!--Second column-->
                            </div>
                            <!--First row-->

                        </div>
                        <!--Panel 1-->

                        <!--Panel 2-->
                        <div class="tab-pane fade" id="panel32" role="tabpanel">
                            <br>

                            <!--First row-->
                            <div class="row">

                                <!--First column-->
                                <div class="col-lg-5 col-md-12">

                                    <!--Featured image-->
                                    <div class="view overlay  d-flex align-items-center mb-2">
                                        <img src="{{ asset('assets/img/2gaty.jpg') }}"
                                             class="rounded img-fluid" alt="sample image">
                                    </div>
                                </div>
                                <!--First column-->

                                <!--Second column-->
                                <div class="col-lg-6 ml-lg-auto col-md-12 text-center text-md-left">

                                    <!--Title-->
                                    <h4 class="mb-5 text-center text-uppercase">2-NJI GATY</h4>

                                    <!--Description-->
                                    <p class="text-muted text-justify">2-nji gatda okyjylar üçin niýetlenen jemi 4 sany umumy okalga zaly bolup, olaryň 3 sanysy 46 orunlyk, 1 sanysy bolsa 56 orunlykdyr.
                                        Şeyle-de 2-nji gatda hünärmenleriň iş otaglary, okyjylary hasaba almak we kitap bermek boýunça ýörite beketler ýerleşdirilen. Bu gatda edebiyat gaznasynda saklanylýan saz eserlerini  diňlemek üçin ýöriteleşdirilen otag, dokumental we arhiw kinofilimlerine tomaşa etmek üçin enjamlaşdyrylan 20 orunlyk DWD zaly bar.</p>

                                </div>
                                <!--Second column-->
                            </div>
                            <!--First row-->

                        </div>
                        <!--Panel 2-->

                        <!--Panel 3-->
                        <div class="tab-pane fade" id="panel33" role="tabpanel">
                            <br>

                            <!--First row-->
                            <div class="row">

                                <!--First column-->
                                <div class="col-lg-5 col-md-12">

                                    <!--Featured image-->
                                    <div class="view overlay  d-flex align-items-center mb-2">
                                        <img src="{{ asset('assets/img/3gaty.jpg') }}"
                                             class="rounded img-fluid" alt="sample image">
                                    </div>
                                </div>
                                <!--First column-->

                                <!--Second column-->
                                <div class="col-lg-6 ml-lg-auto col-md-12 text-center text-md-left">

                                    <!--Title-->
                                    <h4 class="mb-5 text-center text-uppercase">3-nji gaty</h4>

                                    <!--Description-->
                                    <p class="text-muted text-justify">3-nji gatda 2 sany 46 orunlyk okalga zaly, ýörite bölümler hem-de hünärmenler üçin niýetlenen iş otaglary bar. şeyle hem kitaphananyň ýolbaşcy düzümi üçin iş otaglary ýerleşdirilen. Bu iş otaglarynyň ýanaşyk ýerinde  194 orunlyk mejlisler zaly bar.
                                        Kitaphananyň bu gatynda neşirleri jemlemek we gaýtadan dikeltmek üçin niýetlenen ussahanalar, şeyle-de “Türkmen kitabynyň taryhy” muzeyi ýerleşdirilen.</p>

                                </div>
                                <!--Second column-->
                            </div>
                            <!--First row-->

                        </div>
                        <!--Panel 3-->

                        <!--Panel 4-->
                        <div class="tab-pane fade" id="panel34" role="tabpanel">
                            <br>

                            <!--First row-->
                            <div class="row">

                                <!--First column-->
                                <div class="col-lg-5 col-md-12">

                                    <!--Featured image-->
                                    <div class="view overlay  d-flex align-items-center mb-2">
                                        <img src="{{ asset('assets/img/teleskop.jpg') }}"
                                             class="rounded img-fluid" alt="sample image">
                                    </div>
                                </div>
                                <!--First column-->

                                <!--Second column-->
                                <div class="col-lg-6 ml-lg-auto col-md-12 text-center text-md-left">

                                    <!--Title-->
                                    <h4 class="mb-5 text-center text-uppercase">Obserwatoriýasy</h4>

                                    <!--Description-->
                                    <p class="text-muted text-justify">Kitaphananyň ýokarky gatynda özi açylyp-ýapylýan gümmez bolup, obserwatoriýa üçin niýetlenilen iş otagy hem-de häzirki zaman enjamlary bilen üpjün edilen kompýuter otagy göz oňünde tutulan.
                                        Obserwatoriýada Germaniya Federatiw Respublikasynda öndürilen teleskop enjamy oturdylan. Obserwatoriýa otagynda teleskopyň we kompýuterleriň kömegi bilen asman giňişligini synlamak mümkinçiligi döredildi.Lebap welaýat kitaphanasynda obserwatoriýanyň hereket etmegi bu sebitde fizika, astronomiya, geografiya we geofizika, asman giňişligini öwrenmek ugurlarynyň nazaryýetine, tejribe işine gyzyklanmany has artdyrar. Munuň ähmiýeti bolsa has uludyr.
                                        Bu ýerde Germaniýa Federatiw Respublikasynyň önümi bolan “Alt-Azimutly Kassegren-Nesmit ASTELCO” kysymly kämil teleskop oturdylan.
                                        Ylym-bilime, raýatlaryň intellektual mümkinçiliklerine, ruhy-medeni mirasyň öwrenilmegine, ynsan kalbynyň şamcyragy hasaplanýan kitaplara yaş nesliň kalbynda söýgini hem hormaty döredip bilýän ýurduň gelejegi rowanadyr.</p>

                                </div>
                                <!--Second column-->
                            </div>
                            <!--First row-->

                        </div>
                        <!--Panel 4-->

                    </div>
                    <!--Tab panels-->

                </div>
                <!--First column-->

            </div>
            <!--First row-->

        </section>
        <!--Projects section v.3-->

    </div>

    <!--Streak-->
    <div class="streak streak-photo streak-md view jarallax" data-jarallax='{"speed": 0.2}'
         style="background-image: url('{{ asset('assets/img/kaboompics.jpg') }}'); background-repeat: no-repeat; background-size: cover; background-position: center center; ">
        <div class="flex-center mask rgba-indigo-strong">
            <div class="text-center white-text">
                <h2 class="h2-responsive mb-5 ten">
                    <i class="fas fa-quote-left" aria-hidden="true"></i>

                    Goý, bu bina türkmen ylmyny, medeniýetini ösdürmäge hyzmat edip, türkmen halkynyň şöhratly ýoly hakyndaky hakykaty asyrlardan asyrlara aşyryp, geljek nesillerimize ýetirsin!

                    <i class="fas fa-quote-right" aria-hidden="true"></i>
                </h2>
                <h5 class="text-center font-italic ten" data-wow-delay="0.2s">
                    GURBANGULY BERDIMUHAMEDOW.
                </h5>
            </div>
        </div>
    </div>
    <!--Streak-->


    <div class="container" id="news">
        <div class="row">
            <div class="col">
                <h2 class="text-center mb-5 font-weight-bold pt-5 pb-4 my-5 wow fadeIn" data-wow-delay="0.2s">HABARLAR</h2>
            </div>

        </div>
        <div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2" data-ride="carousel">

            <!--Controls-->
            <div class="controls-top">
                <a class="btn-floating" href="#carousel-example-multi" data-slide="prev"><i
                        class="fas fa-chevron-left"></i></a>
                <a class="btn-floating" href="#carousel-example-multi" data-slide="next"><i
                        class="fas fa-chevron-right"></i></a>
            </div>
            <!--/.Controls-->

            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach($posts as $post)
                <li data-target="#carousel-example-multi" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }} multy-carousel"></li>
                @endforeach
            </ol>

            <!--/.Indicators-->
            <div class="carousel-inner v-2" role="listbox">
                @foreach($posts as $post)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="col-12 col-md-4">
                        <div class="card mb-2">
                            <img class="card-img-top" src="{{asset('storage/' .$post->cover)}}"   alt="{{ $post->title }}">
                            <div class="card-body">
                                <h4 class="card-title font-weight-bold">{{ $post->title }}</h4>
                                <a href="{{ route('posts', ['id' => $post->id]) }}" class="btn btn-primary btn-md btn-rounded">{{ $post->created_at }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
