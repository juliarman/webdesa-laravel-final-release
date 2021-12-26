   <div class="row justify-content-center" style="background: #fff">

       <div class="container-fluid">
           <div class="row bg-blue p-3 justify-content-center">
               <h3 class="text-light text-center">APARATUR DESA</h3>
           </div>

           <div class="row justify-content-center">

               <script>
                   AOS.init();
               </script>


               @foreach ($aparatur as $itemAparatur)
                   <div class="col-lg-2 m-3 text-center" data-aos="fade-down">
                       <img src="{{ $itemAparatur->photo }}" alt="" class="rounded-circle m-2" width="140"
                           height="140">
                       <h5><b>{{ $itemAparatur->nama }}</b></h5>
                       <p>{{ $itemAparatur->jabatan }}</p>
                   </div>

               @endforeach


           </div>
           <div class="row mb-3 justify-content-center text-center">
               <a href="/list-aparatur"><button type="button" class="btn btn-success">LIHAT SELENGKAPNYA</button></a>
           </div>


       </div>
   </div>
