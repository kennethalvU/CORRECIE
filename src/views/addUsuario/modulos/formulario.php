<section class="content">
                <div class="container-fluid">
                    <h2 class="text-center display-4">Añadir Nuevo Usuario</h2>

                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Datos del Usuario</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="userName">Nombre</label>
                                            <input type="text" class="form-control" id="userName"
                                                placeholder="Introduce el nombre del usuario">
                                        </div>
                                        <div class="form-group">
                                            <label for="userEmail">Correo</label>
                                            <input type="email" class="form-control" id="userEmail"
                                                placeholder="Introduce el correo electrónico">
                                        </div>
                                        <div class="form-group">
                                            <label for="userPassword">Contraseña</label>
                                            <input type="password" class="form-control" id="userPassword"
                                                placeholder="Introduce una contraseña">
                                        </div>
                                        <div class="form-group">
                                            <label>Departamento</label>
                                            <select class="form-control">
                                                <option>Personal</option>
                                                <option>Juridico</option>
                                                <option>Informatica</option>
                                                <option>Financiero</option>
                                                <!-- Agrega más opciones según tus necesidades -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Rol</label>
                                            <select class="form-control">
                                                <option>Administrador</option>
                                                <option>General</option>
                                                <option>Invitado</option>
                                                <!-- Agrega más opciones según tus necesidades -->
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-block btn-dark">Registrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>