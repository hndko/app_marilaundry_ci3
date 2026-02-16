<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="wa-tab" data-toggle="pill" href="#wa-pane" role="tab" aria-controls="wa-pane" aria-selected="true">WhatsApp Gateway (Fonnte)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="general-tab" data-toggle="pill" href="#general-pane" role="tab" aria-controls="general-pane" aria-selected="false">Umum</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <form action="<?= site_url('settings/update') ?>" method="post">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <!-- WhatsApp Gateway Pane -->
                        <div class="tab-pane fade show active" id="wa-pane" role="tabpanel" aria-labelledby="wa-tab">
                            <div class="form-group">
                                <label for="wa_api_key">Fonnte API Token (Device Token)</label>
                                <input type="text" name="wa_api_key" id="wa_api_key" class="form-control" value="<?= $settings['wa_api_key'] ?? '' ?>" placeholder="Masukkan Device Token Fonnte">
                                <small class="text-muted">
                                    Gunakan <b>Device Token</b> (klik tombol Token biru di sebelah nomor WA).<br>
                                    Dapatkan token di <a href="https://md.fonnte.com/new/device.php" target="_blank">md.fonnte.com/new/device.php</a>
                                </small>
                            </div>
                            <hr>
                            <h5>Template Pesan</h5>
                            <p class="text-sm text-muted">Gunakan placeholder: <code>{invoice}</code>, <code>{customer}</code>, <code>{estimation}</code>, <code>{total}</code></p>

                            <div class="form-group">
                                <label for="wa_template_accepted">Pesanan Diterima</label>
                                <textarea name="wa_template_accepted" id="wa_template_accepted" class="form-control" rows="3"><?= $settings['wa_template_accepted'] ?? '' ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="wa_template_process">Pesanan Diproses</label>
                                <textarea name="wa_template_process" id="wa_template_process" class="form-control" rows="3"><?= $settings['wa_template_process'] ?? '' ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="wa_template_ready">Pesanan Selesai / Siap Diambil</label>
                                <textarea name="wa_template_ready" id="wa_template_ready" class="form-control" rows="3"><?= $settings['wa_template_ready'] ?? '' ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="wa_template_taken">Pesanan Diambil</label>
                                <textarea name="wa_template_taken" id="wa_template_taken" class="form-control" rows="3"><?= $settings['wa_template_taken'] ?? '' ?></textarea>
                            </div>
                        </div>

                        <!-- General Pane -->
                        <div class="tab-pane fade" id="general-pane" role="tabpanel" aria-labelledby="general-tab">
                            <div class="form-group">
                                <label for="app_name">Nama Aplikasi</label>
                                <input type="text" name="app_name" id="app_name" class="form-control" value="<?= $settings['app_name'] ?? '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Pengaturan
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
