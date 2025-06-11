<section id="content">



    <div class="container">

        <div class="row">

            <div class="col-6">

                <h3>Daftar Kata</h3>

                <hr>

                <ul class="ks-cboxtags">

                    <?php foreach($words as $key => $word){ echo '<li><input type="checkbox"

                    id="checkbox-'.$key.'" value="'.$word.'"><label class="label-tagger"

                    data-id="checkbox-'.$key.'" for="checkbox-'.$key.'">'.$word.'</label></li>'; }

                    ?>

                </ul>

            </div>



            <div class="col-6">

                <h3>Masukan Tag</h3>

                <hr>

                <div class="section-tagging">

                    <div class="form-group">

                        <div class="btn-group-vertical" style="width:100%;">

                            <?php foreach($ner_tags->result() as $tag){ echo '<button type="button"

                            class="btn btn-tagger" style="background:'.$tag->warna.';color:'.$tag->font.'"

                            id="'.$tag->kode.'">'.$tag->kelas.'</button>'; } ?>

                        </div>

                    </div>



                    <div class="form-group">

                        <button type="submit" class="form-control-submit-button">Verifikasi</button>

                    </div>

                </div>



                <div class="section-verifying">

                    <div class="form-group section-table-tag">

                        <table class="table table-tag" data-sortable="true" id="table">

                            <thead class="thead-dark">

                                <tr>

                                    <th data-field="id" data-sortable="true" data-formatter="autoNumberRow">#</th>

                                    <th data-field="kata" data-sortable="true">Kata</th>

                                    <th data-field="tag" data-sortable="true" data-formatter="tagTableFormatter">Tag</th>

                                    <th data-field="warna" data-sortable="true" data-visible="false">Warna</th>

                                    <th data-field="font" data-sortable="true" data-visible="false">Font</th>

                                </tr>

                            </thead>

                        </table>

                    </div>

                    <div class="form-group" style="display:none;">
                        <input type="hidden" name="pos" value="<?=$pos?>" id="posText">
                    </div>

                    <div class="form-group">

                        <button class="btn-solid-danger" id="back" style="width:100%;">Kembali</button>

                    </div>

                    <div class="form-group">

                        <button class="btn-solid-reg" id="next" style="width:100%;">Lanjutkan</button>

                    </div>

                </div>



            </div>

        </div>



    </div>

</section>




<script src="<?=base_url('js/ner.js')?>"></script>