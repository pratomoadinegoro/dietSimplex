	<!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <h1 class="brand-heading">HEALTHY LIFE</h1>
                        <h2 class="intro-text">"Gizi Hebat, Harga Bersahabat"<br>Pratomo Adinegoro</h2>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

        <section id="signIn" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-md-5 col-lg-offset-4">
                    <h2>SIGN IN</h2>                
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('user/set_login'); ?>
                        <form role="form" >
                            <fieldset>
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" type="text" name="username" required/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" type="password" name="password" required/>
                                </div>
                                
                                <button type="submit" value="submit" class="btn btn-primary btn-lg">SIGN IN</button>
                                
                            </fieldset>
                        </form>
                        <?php form_close(); ?>
                <br>
                <h5>Jika anda belum terdaftar silahkan klik  <?php echo anchor('user/signup', 'daftar'); ?></h5>
                
                    
                </div>
            </div>
        </div>
    </section>
  
  <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Apa itu Healthy Life?</h2>
                <p>Healthy Life merupakan aplikasi yang dapat menghitung kebutuhan gizi macronutrient seseorang berdasarkan makanan yang dipilih
                    yang dihitung menggunakan Rumus Schofield dengan memanfaatkan tinggi badan, berat badan, dan usia. 
                    Gizi Macronutrient sendiri merupakan kandungan gizi terbesar yang dimiliki
                    oleh makanan yaitu antara lain: Karbohidrat, lemak, dan protein.</p>
                    <p>Basal Metabolic Rate (BMR) adalah suatu ukuran yang digunakan untuk mengukur aktivitas metabolisme 
                        minimum yang dilakukan oleh seorang individu dari mulai bangun tidur sampai sebelum tidur. (Walker,2009) </p>

                <p>Pemrograman linier merupakan suatu cara penghitungan matematika yang digunakan untuk mengolah
                 sumberdaya dengan cara optimasi, yaitu dilakukan minimasi atau maksimasi. Optimasi yang dilakukan
                  adalah optimasi terhadap suatu fungsi linier dari beberapa variabel yang ditentukan, 
                  dan juga memiliki batasan yang tentunya linier juga. Dalam pemrograman linier dibutuhkan 
                  syarat-syarat yang menunjang dalam pembuatan suatu model pemrograman linear yakni: variabel
                   yang digunakan dalam permaslahan dapat dikontrol oleh pengambil keputusan, pemrograman linier 
                   digunakan untuk memaksimalkan atau meminimumkan suatu kuantitas, adanya fungsi tujuan, adanya 
                   batasan atau constraint dalam membatasi suatu fungsi tujuan. (Sriwidadi, 2013) </p>

                   <p>Algoritma dua fase adalah salah satu algoritma yang dimiliki oleh metode simpleks.
                    Prinsip kerja dari algoritma dua fase ini adalah membagi proses kedalam dua fase. 
                    Dimana fase pertama akan dilakukan reduksi terhadap artificial variables menjadi bernilai 0, 
                    sedangkan pada fase kedua digunakan untuk melakukan meminimalkan objective function yang sudah 
                    ditentukan diawal, dengan solusi feasible yang sudah didapatkan pada fase pertama. (Jamali,2014)</p>
                
            </div>
        </div>
    </section>

    <!-- Download Section -->


    <!-- Contact Section -->
  <!--   <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact Person</h2>
                <p>Feel free to email me to provide some feedback on my program,give some criticism and suggestion or to just say hello!</p>
                
                <p><a href="mailto:akhapr777@gmail.com">akhapr777@gmail.com</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/akbar_kim" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/u/0/100978420344838358667" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section> -->

 
