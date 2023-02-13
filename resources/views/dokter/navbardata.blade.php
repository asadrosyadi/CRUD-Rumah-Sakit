 <form method="get" action="/dokter">
    <div class="row">
        <div class="col-md-8">
            <a href="/dokter/create" class="btn btn-primary"> + Tambah Data</a>

        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="from-control" placeholder="Cari kata..." name="s" value="{{isset($s) ? $s : '' }}">
                <span class="input-group-btn">
                    <button class="btn btn-success" type="submit">Cari!</button>
                </span>
            </div>
        </div>
    </div>
 </form>
 <br>