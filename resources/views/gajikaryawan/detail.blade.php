<?php
$bonus =  $data->jabatan->gaji_pokok * ($data->jabatan->bonus / 100)  ;
$ppn = ($data->jabatan->pph / 100) * ($bonus + $data->jabatan->gaji_pokok);
$total = ($data->jabatan->gaji_pokok + $bonus) - $ppn;
?>
<aside class="profile-nav alt">
    <section class="card">
        <div class="card-header user-header alt bg-dark">
            <div class="media">
                <a href="#">
                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt=""
                        src="images/admin.jpg">
                </a>
                <div class="media-body">
                    <h2 class="text-light display-6">{{ $data->nama }}</h2>
                    <p>{{ $data->jabatan->nama_jabatan }}</p>
                </div>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                Gaji pokok <span class="badge pull-right">@currency($data->jabatan->gaji_pokok)</span>
            </li>
            <li class="list-group-item">
                Bonus ({{ $data->jabatan->bonus . '%' }}) <span class="badge pull-right">@currency($bonus)</span>
            </li>
            <li class="list-group-item">
                PPH ({{ $data->jabatan->pph . '%' }}) <span class="badge pull-right">@currency($ppn)</span>
            </li>
        </ul>
        <div class="list-group-item" style="border-top: 2px black solid">
            <strong> Total </strong> <span class="badge pull-right">@currency($total)</span>
        </div>
    </section>
</aside>