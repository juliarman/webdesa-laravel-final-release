<!--=== Footer v6 ===-->
<div id="footer-v6" class="footer-v6 ">
    <div class="footer">
        <div class="container">
            <div class="row">
                <!-- About Us -->
                <div class="col-md-3 sm-margin-bottom-40">
                    <div class="heading-footer">
                        @foreach ($dataProfile as $item)
                            <h2>Website {{ $item->nama_desa }}</h2>
                        @endforeach
                    </div>
                    <p>
                        @foreach ($dataProfile as $itemProfile)
                            {{ $itemProfile->deskripsi }}
                        @endforeach
                    </p>

                </div>
                <!-- End About Us -->

                <!-- Recent News -->
                <div class="col-md-3 sm-margin-bottom-40">
                    <div class="heading-footer">
                        <h2>BERITA DESA</h2>
                    </div>
                    <ul class="list-unstyled link-news">



                        {{-- @foreach ($dataAgenda as $item)
                            <li>
                                <h6>{{ $item->judul }}</h6>
                                <small>{{ $item->waktu }}</small>
                            </li>
                        @endforeach --}}
                        @foreach ($dataBerita as $item)
                            <li>
                                <a href="/berita/{{ $item->berita_id }}/{{ $item->slug }}">
                                    <h6>{{ $item->judul }}</h6>
                                </a>
                                <small>{{ $item->created_at->translatedFormat('l jS F Y') }}</small>
                            </li>
                        @endforeach


                    </ul>
                </div>
                <!-- End Recent News -->

                <!-- Useful Links -->
                <div class="col-md-3 sm-margin-bottom-40">
                    <div class="heading-footer">
                        <h2>KATEGORI</h2>
                    </div>
                    <ul class="list-unstyled footer-link-list">

                        @foreach ($dataCategories as $itemCategories)
                            <li><a
                                    href="/berita/{{ $itemCategories->categories_id }}">{{ $itemCategories->name }}</a>
                            </li>
                        @endforeach

                        {{-- <li><a href="#">Bisnis</a></li>
                        <li><a href="#">Politik</a></li>
                        <li><a href="#">Sosial</a></li>
                        <li><a href="#">Budaya</a></li>
                        <li><a href="#">Teknologi</a></li>
                        <li><a href="#">Pendidikan</a></li>
                        <li><a href="#">Ekonomi</a></li> --}}
                    </ul>
                </div>
                <!-- End Useful Links -->

                <!-- Contacts -->
                <div class="col-md-3">
                    <div class="heading-footer">
                        <h2>Kontak</h2>
                    </div>
                    @foreach ($dataProfile as $itemProfile)
                        <ul class="list-unstyled contacts">
                            <li>
                                <i class="radius-3x fa fa-map-marker"></i>
                                {{ $itemProfile->alamat }}
                            </li>

                            <li>
                                <i class="radius-3x far fa-envelope"></i>
                                {{ $itemProfile->email }}
                            </li>

                            <li>
                                <i class="radius-3x fa fa-phone"></i>
                                {{ $itemProfile->no_telpon }}
                            </li>

                            <li>
                                <i class="radius-3x fa fa-globe"></i>
                                <a href="{{ $itemProfile->url }}">{{ $itemProfile->url }}</a>
                            </li>




                        </ul>
                    @endforeach
                </div>
                <!-- End Contacts -->
            </div>
        </div>
        <!--/container -->
    </div>


</div>
<!--=== End Footer v6 ===-->
</div>


<footer class="footer bg-black">
    <div class="container">

        <div class="row p-4">
            <div class="col-sm-8">
                © Copyright 2022. All Rights Reserved.
            </div>

            <div class="col-sm-1">
                <a href="{{ $itemProfile->facebook }}">
                    <i class="radius-3x fab fa-2x fa-facebook" style="color: #4267B2"></i></a>
            </div>


            <div class="col-sm-1">
                <a href="{{ $itemProfile->instagram }}">
                    <i class="radius-3x fab fa-2x fa-instagram" style="color: #E1306C"></i></a>
            </div>


            <div class="col-sm-1">
                <a href="{{ $itemProfile->twitter }}">
                    <i class="radius-3x fab fa-2x fa-twitter" style="color: #1DA1F2"></i></a>
            </div>


            <div class="col-sm-1">
                <a href="{{ $itemProfile->youtube }}">
                    <i class="radius-3x fab fa-2x fa-youtube" style="color: #FF0000"></i></a>
            </div>

        </div>

    </div>
</footer>
