<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="index.html">
                <img src="<?= base_url(); ?>assets/homer/images/profile.jpg" class="img-circle m-b" alt="logo">
            </a>

            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">Mr. Hexaking DV</span>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <small class="text-muted">Founder of App <b class="caret"></b></small>
                    </a>
                    <ul class="dropdown-menu animated flipInX m-t-xs">
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="analytics.html">Analytics</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <ul class="nav" id="side-menu">
            <li class="<?= @$school ?>"> 
            <a href="<?= base_url(); ?>school">  <span class="nav-label">Dashboard</span> </a>
            </li>
            <li class="<?= @$jadwal ?>">
                <a href="<?= base_url(); ?>jadwal"> <span class="nav-label">Jadwal</span></a>
            </li>

            <li class="<?= @$info ?>">
                <a href="<?= base_url(); ?>info"> <span class="nav-label">Info</span></a>
            </li>
            <li class="<?= @$learning ?>">
                <a href="<?= base_url(); ?>learning"> <span class="nav-label">E-learning</span></a>
            </li>
            <li class="<?= @$payment ?>">
                <a href="<?= base_url(); ?>payment"> <span class="nav-label">Pembayaran</span></a>
            </li>
            <li class="<?= @$nilai ?>">
                <a href="<?= base_url(); ?>nilai"> <span class="nav-label">Nilai</span></a>
            </li>
            <li class="<?= @$ujian ?>">
                <a href="<?= base_url(); ?>ujian"> <span class="nav-label">Ujian</span></a>
            </li>

        </ul>
    </div>
</aside>

