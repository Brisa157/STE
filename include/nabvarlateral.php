<div class="navbar-lateral full-reset">
    <div class="visible-xs font-movile-menu mobile-menu-button"></div>
    <div class="full-reset container-menu-movile custom-scroll-containers">
        <div class="logo full-reset all-tittles">
            <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" 
               style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
               <img src="img/logoitszo.jpg" width="20%"> TECNOLÓGICO ITSZO
        </div>
        <div class="full-reset" style="background-color:gray; padding: 10px 0; color:#fff;">               
            <figure>
                <img src="img/perfil.jpg" alt="user-picture" class="img-responsive img-circle center-box" style="width:30%;">
            </figure>
            <a  href="perfil.php" style="text-decoration: none; color: white; ">
                <p class="text-center" style="padding-top: 15px;"><?php echo $nombre_completo_usuario ?></p>
            </a>
        </div>
        <div class="full-reset nav-lateral-list-menu">
            <ul class="list-unstyled">
                <li>
                    <a href="home.php"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a>
                </li>
                <li>
                    <a href="nuevoingreso.php"><i class="zmdi zmdi-account-add"></i>&nbsp;&nbsp; Nuevo Ingreso</a>
                </li>
                <li>
                    <div class="dropdown-menu-button">
                        <i class="zmdi zmdi-account-add"></i>
                        &nbsp;&nbsp; Nuevo Ingreso
                        <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i>
                    </div>
                    <ul class="list-unstyled" style="background-color: gray;">
                        <li><a href="nuevoingreso.php">&nbsp;&nbsp; Nuevo Ingreso</a></li>
                        <li><a href="examenraven.php">&nbsp;&nbsp; Examén Raven</a></li>
                    </ul>
                </li>
                <li>
                    <div class="dropdown-menu-button">
                        <i class="zmdi zmdi-mood"></i>
                        &nbsp;&nbsp; Psicología
                        <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i>
                    </div>
                    <ul class="list-unstyled" style="background-color: gray;">
                        <li><a href="canalizaciones.php">&nbsp;&nbsp; Canalizaciones</a></li>
                        <li><a href="tutorias.php">&nbsp;&nbsp; Tutorías</a></li>
                        <li><a href="examenraven.php">&nbsp;&nbsp; Examén Raven</a></li>
                    </ul>
                </li>
                <li>
                    <a href="becas.php"><i class="zmdi zmdi-money-box"></i>&nbsp;&nbsp; Becas</a>
                </li>
                <li>
                    <a href="semanasacademicas.php"><i class="zmdi zmdi-graduation-cap"></i>&nbsp;&nbsp; Semanas Academicas</a>
                </li>
                <li>
                    <div class="dropdown-menu-button">
                        <i class="zmdi zmdi-library"></i>
                        &nbsp;&nbsp; Inglés
                        <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i>
                    </div>
                    <ul class="list-unstyled" style="background-color: gray;">
                        <li><a href="niveles.php">&nbsp;&nbsp; Niveles</a></li>
                        <li><a href="cursosnivelacion.php">&nbsp;&nbsp; Curso De Nivelación</a></li>
                        <li><a href="examenubicacion.php">&nbsp;&nbsp; Examén De Ubicación</a></li>
                    </ul>
                </li>
                <li>
                    <a href="investigaciones.php"><i class="zmdi zmdi-search-in-file"></i>&nbsp;&nbsp; Investigaciones</a>
                </li>
                <li>
                    <a href="movilidades.php"><i class="zmdi zmdi-bus"></i>&nbsp;&nbsp; Movilidades</a>
                </li>
                <li>
                    <a href="certificaciones.php"><i class="zmdi zmdi-star-circle"></i>&nbsp;&nbsp; Certificaciones</a>
                </li>
                <li>
                    <a href="serviciosocial.php"><i class="zmdi zmdi-accounts-outline"></i>&nbsp;&nbsp; Servicio Social</a>
                </li>
                <li>
                    <a href="residencias.php"><i class="zmdi zmdi-city"></i>&nbsp;&nbsp; Residencias</a>
                </li>
                <li>
                    <div class="dropdown-menu-button">
                        <i class="zmdi zmdi-star"></i>
                        &nbsp;&nbsp; Créditos Complementarios
                        <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i>
                    </div>
                    <ul class="list-unstyled" style="background-color: gray;">
                        <li><a href="credito_1.php">&nbsp;&nbsp; Crédito 1</a></li>
                        <li><a href="credito_2.php">&nbsp;&nbsp; Crédito 2</a></li>
                        <li><a href="credito_3.php">&nbsp;&nbsp; Crédito 3</a></li>
                        <li><a href="credito_4.php">&nbsp;&nbsp; Crédito 4</a></li>
                        <li><a href="credito_5.php">&nbsp;&nbsp; Crédito 5</a></li>
                    </ul>
                </li>
                <!--li>
                    <div class="dropdown-menu-button">
                        &nbsp;&nbsp; Administración escolar
                        <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i>
                    </div>
                    <ul class="list-unstyled">
                        <li><a href="nivel.php">&nbsp;&nbsp; Niveles de estudio</a></li>
                        <li><a href="carrera.php">&nbsp;&nbsp; Carreras</a></li>
                        <li><a href="areacarrera.php">&nbsp;&nbsp; Áreas de la carreras</a></li>
                        <li><a href="cuatrimestre.php">&nbsp;&nbsp; Cuatrimestres</a></li>
                        <li><a href="modalidad.php">&nbsp;&nbsp; Modalidades de estudio</a></li>
                        <li><a href="periodo.php">&nbsp;&nbsp; Periodos escolares</a></li>
                    </ul>
                </li>
                <li>
                    <div class="dropdown-menu-button">
                        &nbsp;&nbsp; Servicios de acción tutorial
                        <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i>
                    </div>
                    <ul class="list-unstyled">
                        <li><a href="tipobeca.php">&nbsp;&nbsp; Tipos de beca</a></li>
                        <li><a href="beca.php">&nbsp;&nbsp; Becas</a></li>
                        <li><a href="servicioestudiantil.php">&nbsp;&nbsp; Servicios estudiantiles</a></li>
                        <li><a href="tipotutoria.php">&nbsp;&nbsp; Tipos de tutoría</a></li>
                    </ul>
                </li>
                <li>
                    <div class="dropdown-menu-button">
                        &nbsp;&nbsp; Clasificación profesional
                        <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i>
                    </div>
                    <ul class="list-unstyled">
                        <li><a href="gradoacademico.php">&nbsp;&nbsp; Grados académicos</a></li>
                        <li><a href="categoriaempleado.php">&nbsp;&nbsp; Categorías </a></li>
                        <li><a href="puesto.php">&nbsp;&nbsp; Puestos</a></li>
                    </ul>
                </li>
                <li>
                    <div class="dropdown-menu-button">
                        &nbsp;&nbsp; Comunidad educativa
                        <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i>
                    </div>
                    <ul class="list-unstyled">
                        <li><a href="director.php">&nbsp;&nbsp; Directores</a></li>
                        <li><a href="docente.php">&nbsp;&nbsp; Docentes</a></li>
                        <li><a href="servicio.php">&nbsp;&nbsp; Servicios</a></li>
                        <li><a href="grupo.php">&nbsp;&nbsp; Grupos </a></li>
                    </ul>
                </li>
                <li>
                    <div class="dropdown-menu-button">
                        &nbsp;&nbsp; Permisos
                        <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i>
                    </div>
                    <ul class="list-unstyled">
                        <li><a href="usuario.php">&nbsp;&nbsp; Usuarios</a></li>
                        <li><a href="rol.php">&nbsp;&nbsp; Roles</a></li>
                    </ul>
                </li-->
            </ul>            
        </div>
    </div>
</div>