<section class="content">
    <div class="container-fluid">
        <h2 class="text-center display-4">Subir Documentos</h2>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Selecciona y sube tu documento</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Rol</label>
                                <select class="form-control">
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?= htmlspecialchars($role['id_rol'], ENT_QUOTES, 'UTF-8') ?>">
                                            <?= htmlspecialchars($role['nombre'], ENT_QUOTES, 'UTF-8') ?>
                                        </option>
                                    <?php endforeach; ?>
                                    <!-- Agrega más opciones según tus necesidades -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fileInput">Archivo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fileInput"
                                            accept=".pdf, .doc, .docx">
                                        <label class="custom-file-label" for="fileInput">Selecciona el
                                            documento</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-dark">Subir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>