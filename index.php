<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Service Productions LEMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="styles/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="styles/scrolling-nav.css" rel="stylesheet">
    
    
    <!--  -->
    <link href="styles/index.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#287883">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" style="color:#FFF !important" href="#page-top">Revetti's Travel</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="menubar" class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Nosotros</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Servicios</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contacto</a>
                    </li>
                </ul>
                <!--<ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login</a>
                        <ul class="dropdown-menu">
                            <li>
                                <div id="divLogin" class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>-->
                <?php
                    // si el formulario aun no ha sido enviado, muestra el formulario
                    if (!isset($_POST['submit'])) {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="" class="" data-toggle="modal" data-target="#loginModal">Login</a>
                    </li>
                </ul>
                <?php
                    // si el formulario ha sido enviado, procesa los datos de entrada del formulario
                    } else {
                        $url = 'http://test-9482.rhcloud.com/userByLogin2';
                        
                        $options = ["http" => ["method" => "POST",
                                                "header" => ["Content-Type: application/x-www-form-urlencoded"],
                                                "content" => "login=" . $_POST['login'] . "&password=" . $_POST['password']]];
                                            
                        $context = stream_context_create($options);
                        
                        // make the request
                        $response = file_get_contents($url, false, $context);
                        
                        $user = json_decode($response);
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->{'name'}; ?></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="" class="" >Configuracion</a>
                            </li>
                            <li>
                                <a href="" class="" >Mensajes</a>
                            </li>
                            <li>
                                <a href="" class="" >Logout</a>
                            </li>
                            <li>
                                <div id="divLogin" class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
                <?php        
                    }
                ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <!-- Login form -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModal-label">Login</h4>
                </div>
                <div class="modal-body">
                    <div id="divLogin" class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="loginForm" role="form" class="form-horizontal" method="post" action="index.php">
                                    <div class="form-group">
                                        <label for="user" class="control-label col-md-4">Usuario:</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-group-addon" style="background-color:#287883">
                                                    <span class="glyphicon glyphicon-user white"></span>
                                                </div>
                                                <input type="text" name="login" id="login" class="form-control" placeholder="Usuario"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label col-md-4">Password:</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="input-group-addon" style="background-color:#287883">
                                                    <span class="glyphicon glyphicon-asterisk white"></span>
                                                </div>
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-1 col-md-offset-4">
                                            <button type="submit" name="submit" class="btn btn-success">Entrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button form="loginForm" type="submit" class="btn btn-success">Entrar</button>-->
                </div>
            </div>
        </div>
    </div>

    <!-- Intro Section -->
    <section id="intro" class="intro-section" style="background-image:url('images/image01.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Revetti's Travel</h1>
                    <h2><strong>Vive la aventura de tu vida!</strong></p>
                    <a class="btn btn-default page-scroll" href="#about"><strong>Continuar!</strong></a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>¿Quienes somos?</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse auctor quis lacus sed pharetra. Phasellus sagittis ornare neque ut cursus. Nullam et maximus justo, eget tincidunt magna. Nulla facilisi. Morbi quis metus vitae enim sodales efficitur. Sed at turpis in nibh suscipit pulvinar. Mauris sed purus et lorem tempor condimentum. Duis sit amet enim magna. Sed id sollicitudin dui, et semper magna.</p>
                    <p>Phasellus tempor fringilla dolor. Integer gravida gravida magna, sed malesuada mauris posuere quis. Ut elementum est quis vehicula dapibus. Ut lobortis urna quis massa viverra, ut consequat nunc mattis. Sed blandit sapien sapien, id suscipit libero tempus eget. Ut egestas nunc sit amet ante eleifend, nec sollicitudin diam vestibulum. Proin condimentum ultricies nisl, eget rhoncus ipsum porta vulputate. Donec in mauris mauris. Fusce tempus neque justo, sed varius purus imperdiet eu. Sed eget placerat est, et dictum est. Aliquam vulputate fermentum enim, nec malesuada eros. Ut pretium felis eu elementum venenatis. Integer tempus tempus enim, vitae iaculis nibh consequat mattis. Phasellus bibendum non purus a aliquet.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse auctor quis lacus sed pharetra. Phasellus sagittis ornare neque ut cursus. Nullam et maximus justo, eget tincidunt magna. Nulla facilisi. Morbi quis metus vitae enim sodales efficitur. Sed at turpis in nibh suscipit pulvinar. Mauris sed purus et lorem tempor condimentum. Duis sit amet enim magna. Sed id sollicitudin dui, et semper magna.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Servicios</h1>
                    <div class="col-lg-6">
                        <h3>Servicio 1</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sagittis fermentum ex id dignissim. Integer et odio ac dolor suscipit semper. Donec placerat eleifend cursus. Nulla at tortor id libero vehicula tristique. Morbi sem nisl, consectetur a leo id, sollicitudin tincidunt diam. Duis augue nisl, feugiat eget tempor et, porta vitae tellus. Nam pharetra, magna vitae rutrum ultricies, urna leo accumsan justo, id elementum purus urna ut nisi. Ut non euismod leo.</p>
                    </div>
                    <div class="col-lg-6">
                        <h3>Servicio 2</h3>
                        <p>Phasellus egestas orci eget lacus laoreet interdum sed vitae arcu. Morbi consectetur ante ac ex convallis, porta scelerisque nulla ornare. Integer eu lobortis tellus. Nam lorem velit, laoreet vitae massa vel, elementum interdum ex. Fusce quis maximus nisl. Pellentesque lorem nisi, euismod in diam in, condimentum dictum mauris. Nam volutpat lobortis est, ac facilisis nibh tincidunt et. Nulla vulputate mi eu augue hendrerit, a pulvinar dolor luctus. Ut facilisis, quam at pellentesque volutpat, dolor dolor pellentesque ligula, a porta eros orci at quam. Aliquam auctor feugiat diam eget congue. Integer at quam ac justo suscipit cursus nec gravida urna.</p>
                    </div>
                    <div class="col-xs-12 col-md-6 col-md-push-6">
                        <h3>Servicio 3</h3>
                        <p>Duis eu neque bibendum, tempor nisi id, rutrum libero. Suspendisse potenti. Sed vitae mauris felis. Praesent vel mattis ipsum. Nullam semper erat mi, ut rhoncus quam hendrerit vitae. Nulla eget magna eget nunc tempus dapibus. Nam tempus nulla elit, sit amet dictum urna bibendum nec. Proin tortor augue, fringilla sed diam nec, tempor pulvinar nisi. Etiam in orci sit amet urna blandit congue quis ut tortor.</p>
                    </div>
                    <div class="col-xs-12 col-md-6 col-md-pull-6">
                        <h3>Servicio 4</h3>
                        <p>Sed orci odio, laoreet molestie ligula placerat, sodales efficitur tortor. Nulla fringilla lectus interdum, rutrum tellus vitae, condimentum augue. Sed id tempus turpis. Aliquam erat volutpat. Nulla sollicitudin neque in tellus semper mattis. Aliquam massa enim, pulvinar ut finibus quis, scelerisque vel ante. Cras non mauris mattis, vehicula turpis vitae, finibus ex. Nulla facilisi. Nunc dignissim commodo dolor, vulputate lobortis neque egestas sit amet.</p>
                        <p>Duis eu neque bibendum, tempor nisi id, rutrum libero. Suspendisse potenti. Sed vitae mauris felis. Praesent vel mattis ipsum. Nullam semper erat mi, ut rhoncus quam hendrerit vitae. Nulla eget magna eget nunc tempus dapibus. Nam tempus nulla elit, sit amet dictum urna bibendum nec. Proin tortor augue, fringilla sed diam nec, tempor pulvinar nisi. Etiam in orci sit amet urna blandit congue quis ut tortor.</p>
                    </div>
                    <?php
                        if (isset($_POST['submit'])) {
                    ?>
                    <div>
                        <button type="submit" class="btn btn-success">Editar</button>
                    </div>            
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Contactanos</h1>
                    <br />
                    <form role="form" class="form-horizontal">
                        <div class="form-group">
                            <label for="user" class="control-label col-md-3 col-sm-2 col-xs-2">Nombre:</label>
                            <div class="col-md-6 col-sm-8 col-xs-8">
                                <div class="input-group">
                                    <div class="input-group-addon" style="background-color:#287883">
                                        <span class="glyphicon glyphicon-user white"></span>
                                    </div>
                                    <input type="text" name="user" id="user" class="form-control" placeholder="Nombre"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3 col-sm-2 col-xs-2">Email:</label>
                            <div class="col-md-6 col-sm-8 col-xs-8">
                                <div class="input-group">
                                    <div class="input-group-addon" style="background-color:#287883">
                                        <span class="glyphicon glyphicon-envelope white"></span>
                                    </div>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Correo electonico"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="control-label col-md-3 col-sm-2 col-xs-2">Mensaje:</label>
                            <div class="col-md-6 col-sm-8 col-xs-8">
                                <textarea class="form-control" rows="5" id="message"></textarea>
                            </div>
                        </div>
                       <div class="form-group">
                            <div class="col-md-1 col-md-offset-3">
                                <button type="button" class="btn">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer" style="background: #000; height: 20%">
      <div class="container">
        <p class="text-center">Luis Hernández Revetti</p>
        <p class="text-center"><a href="http://hernandezrevettisolutions.com.ve">hernandezrevettisolutions.com.ve</a></p>
      </div>
    </footer>

    <!-- jQuery -->
    <script src="scripts/jquery-2.1.4.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="scripts/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="scripts/jquery.easing.min.js"></script>
    <script src="scripts/scrolling-nav.js"></script>
</body>

</html>
