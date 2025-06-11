<section id="content">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Dokumentasi Pos Tag</h3>
                <hr>
                <table class="table table-tag" data-sortable="true" id="table-pos" data-search="true"  data-show-fullscreen="true" data-show-toggle="true">
                            <thead class="thead-dark">
                                <tr>
                                    <th data-field="id" data-sortable="true" data-formatter="autoNumberRow">#</th>
                                    <th data-field="kelas" data-sortable="true">Kelas</th>
                                    <th data-field="kode" data-sortable="true" data-formatter="tagTableFormatter">Tag</th>
                                    <th data-field="contoh">Contoh</th>
                                    <th data-field="deskripsi">Deskripsi</th>
                                    <th data-field="warna" data-visible="false">Warna</th>
                                    <th data-field="font" data-visible="false">Font</th>
                                </tr>
                            </thead>
                        </table>
            </div>

            <div class="col-12" style="margin-top:100px;">
                <h3>Dokumentasi Ner Tag</h3>
                <hr>
                <table class="table table-tag" data-sortable="true" id="table-ner" data-search="true"  data-show-fullscreen="true" data-show-toggle="true">
                            <thead class="thead-dark">
                                <tr>
                                    <th data-field="id" data-sortable="true" data-formatter="autoNumberRow">#</th>
                                    <th data-field="kelas" data-sortable="true">Kelas</th>
                                    <th data-field="kode" data-sortable="true" data-formatter="tagTableFormatter">Tag</th>
                                    <th data-field="contoh">Contoh</th>
                                    <th data-field="deskripsi">Deskripsi</th>
                                    <th data-field="warna" data-visible="false">Warna</th>
                                    <th data-field="font" data-visible="false">Font</th>
                                </tr>
                            </thead>
                        </table>
            </div>
        </div>

    </div>
    
</section>

<script src="<?=base_url()?>js/dokumentasi.js"></script>