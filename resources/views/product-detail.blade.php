@extends('Layoutlanding.template')
@section('content')
    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="blog">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Shop Single</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop Single</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->


    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="">
                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{ Storage::url('public/buku/') . $buku->gambar }}"
                                style="border-radius: 5px" alt="">
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text pt-5">
                        <h3>{{ $buku->judul }}</h3>
                        {{-- <h2>$149.99</h2> --}}
                        <ul class="list">
                            <li><a class="active" href="#"><span>Category</span> : {{ $buku->genre }}</a></li>
                            <li><a href="#"><span>Stock</span> : {{ $buku->stok }}</a></li>
                        </ul>
                        <p>{{ $buku->deskripsi }}</p>

                        <div class="card_area d-flex align-items-center">
                            @auth
                                @if ($koleksi)
                                    <form action="{{ route('koleksi.delete', $koleksi->id_koleksi) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="icon_btnrmv"><i class="bi bi-trash3"></i></button>
                                    </form>
                                @else
                                    <form action="{{ route('koleksi.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_user" id="id_user" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="id_buku" id="id_buku" value="{{ $buku->id_buku }}">
                                        <button class="icon_btn"><i class="bi bi-heart"></i></button>
                                    </form>
                                @endif
                            @endauth
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                        aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab"
                        aria-controls="review" aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of
                        all shapes
                        and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick
                        School in
                        Reading at the age of 15, where she went to secretarial school and then into an insurance office.
                        After moving to
                        London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He
                        was an
                        officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before
                        John took a
                        job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours,
                        and when
                        showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently
                        bought her a
                        child’s painting set for her birthday and it was with this that she produced her first significant
                        work, a
                        half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It
                        was aptly
                        named ‘Hangover’ by Beryl’s husband and</p>
                    <p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are
                        seeing
                        more and more recipe books and Internet websites that are dedicated to the act of cooking for one.
                        Divorce and
                        the death of spouses or grown children leaving for college are all reasons that someone accustomed
                        to cooking for
                        more than one would suddenly need to learn how to adjust all the cooking practices utilized before
                        into a
                        streamlined plan of cooking that is more efficient for one person creating less</p>
                </div>


                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">

                        <div class="col-lg-6">

                            <div class="row total_rate">
                                <div class="col-6">
                                    <div class="box_total">
                                        <h5>Overall</h5>
                                        <h4>4.0</h4>
                                        <h6>({{ $ulasan->count() }} Reviews)</h6>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="rating_list">
                                        <h3>Based on {{ $ulasan->count() }} Reviews</h3>
                                        <ul class="list">
                                            @forelse ($ulasan as $review)
                                                <li>
                                                    <a href="">

                                                        {{ $review->rating }} Star
                                                        @for ($i = 0; $i < $review->rating; $i++)
                                                            <i class="fa fa-star"></i>
                                                        @endfor
                                                    </a>
                                                </li>
                                            @empty
                                                <p>Belum ada rating</p>
                                            @endforelse


                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="review_list mt-3">
                                @forelse ($ulasan as $review)
                                    <div class="review_item">
                                        <div class="media">
                                            {{-- <div class="d-flex">
                                            <img src="{{ asset('img/product/review-1.png') }}" alt="">
                                        </div> --}}
                                            <div class="media-body">
                                                <h4>{{ $review->user->name }}</h4>
                                                @for ($i = 0; $i < $review->rating; $i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor

                                            </div>
                                        </div>
                                        <p>{{ $review->ulasan }}</p>
                                    </div>
                                @empty
                                    <p>Belom ada review</p>
                                @endforelse



                            </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Add a Review</h4>
                                <p>Your Rating:</p>

                                <form action="{{ route('ulasan.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="rating-css">
                                            <div class="star-icon">
                                                <input type="hidden" name="id_user" id="id_user"
                                                    value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="id_buku" id="id_buku"
                                                    value="{{ $buku->id_buku }}">
                                                <input type="radio" value="1" name="rating" checked
                                                    id="rating1">
                                                <label for="rating1" class="fa fa-star"></label>
                                                <input type="radio" value="2" name="rating" id="rating2">
                                                <label for="rating2" class="fa fa-star"></label>
                                                <input type="radio" value="3" name="rating" id="rating3">
                                                <label for="rating3" class="fa fa-star"></label>
                                                <input type="radio" value="4" name="rating" id="rating4">
                                                <label for="rating4" class="fa fa-star"></label>
                                                <input type="radio" value="5" name="rating" id="rating5">
                                                <label for="rating5" class="fa fa-star"></label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <p>Outstanding</p> --}}

                                    <div class="form-group">
                                        <textarea class="form-control different-control w-100" name="ulasan" id="ulasan" cols="30" rows="5"
                                            placeholder="Enter your review"></textarea>
                                    </div>

                                    <div class="form-group text-center text-md-right mt-3">
                                        <button type="submit" class="button button--active button-review">Submit
                                            Now</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->
@endsection
