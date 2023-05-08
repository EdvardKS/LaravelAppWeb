@extends('layouts.public')

@section('title', 'Encarganos - Asador la Morenica')
@section('description', '
Haz tus pedidos online, al momento en nuestro asador de pollos la Morenica. 
En nuestra página de encargos encontrarás un formulario fácil y rápido de usar para hacer tus pedidos 
y elegir los productos que deseas. Nuestro equipo se encargará de preparar tu pedido y tenerlo listo para que puedas recogerlo en nuestro 
asador de pollos en pocos minutos.
')
@section('content')
<div class="makeOrder">>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.3/dist/l10n/es.js"></script>

    <script lang="text/javascript" src="https://cdn.ably.com/lib/ably.min-1.js"></script>


    <img src="/img/corporativa/sliders/makeOrder_slider.jpeg" class="sideImage"
        alt="baner principal es un pollo mirando un cartel de que el pollo nosn hace felices" />
    <div class="container makeOrder-blade my-5">

        <h1 class="text-center py-5 my-5"><b class="fuente-dancing fs-10">Encarga rápido</b><br><i> y prueba la
                Gastronomía más innovadora</i></h1>

        <div class="d-flex flex-wrap justify-content-center">

            <div id="carouselExampleControls" class="carousel" data-ride="carousel">

                <div class="carousel-inner">
                    <!-- slider de los menus solo imagenes -->
                    @php
                    $prod = 0;
                    @endphp

                    <!-- ####################### -->
                    @foreach ($productos as $producto)
                    @if( $prod < 3) <div class="card m-3 carousel-item active" style="width: 20rem; height: 22rem;"
                        data-ident="{{$prod}}">
                        @else
                        <div class="card m-3 carousel-item" style="width: 20rem; height: 22rem;" data-ident="{{$prod}}">
                            @endif
                            <img src="/img/products/{{ $producto->image }}" class="card-img-top"
                                alt="baner principal es un pollo mirando un cartel de que el pollo nosn hace felices" />

                            <div class="card-body">
                                <h5 class="card-title"> {{ $producto->name }}</h5>
                                <p class="card-text"> {{ $producto->description }}</p>
                            </div>
                        </div>

                        @php
                        $prod++;
                        @endphp

                        @endforeach
                        <!-- ######################## -->
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>


        </div>

        <div class="my-5 pt-5 border-bottom">
            <h2 class="text-center my-5 fs-1">Haz tu pedido <br><small class="fs-1 fuente-dancing">Con ese toque a
                    brasas</small></h2>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div id="mensaje" class="alert alert-success" role="alert" style="display: none;">
            ¡Encargo enviado correctamente!
          </div>


        <!-- FORMULARIO --- ETIQUETA -->
        <form id="formul" action="{{ route('encargos.store') }}" method="post" class="my-5 needs-validation" novalidate>
            @csrf
            <div class="row align-items-center">
                <div class="col-12 col-md-3">
                    <label for="identidad-usuario">Nombre & Apellidos</label>
                    <input class="form-control p-3" type="text" name="identidad-usuario" id="identidad-usuario" placeholder="Carmen Castillo" pattern="[A-Za-z\s]+" required>
                    <div class="invalid-feedback">
                        Por favor, introduce un nombre válido.
                    </div>
                </div>

                <div class="col-12 col-md-3">
                    <label for="pedido-usuario">Menú</label>
                    <select class="form-select p-3" aria-label="Default select example" name="pedido-usuario" id="pedido-usuario" required>
                        <option disabled>Selecciona tu menú</option>
                        @foreach($productos as $producto)
                        <option value="{{$producto->name}}">
                            {{$producto->name}}
                        </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Por favor, selecciona un menú.
                    </div>
                </div>

                <div class="col-12 col-md-3">
                    <textarea name="detalles" id="detalles-user" cols="30" class="form-control" rows="3" placeholder="Dejanos detalles sobre tu pedido" pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s\d]*$" required></textarea>
                    <div class="invalid-feedback">
                        Por favor, escribe los detalles de tu pedido sin caracteres especiales.
                    </div>
                </div>

                <div class="col-12 col-md-3">
                    <label for="hora-usuario">¿Cuándo?</label>
                    <input type="text" class="form-control p-3" name="hora-usuario" id="hora-usuario" required>
                    <div class="invalid-feedback">
                        Por favor, indica cuándo deseas recibir el pedido.
                    </div>
                </div>

                <div class="py-3"></div>

                <div class="col-12 col-md-4">
                    <label for="email-usuario">Email</label>
                    <input class="form-control p-3" type="email" name="email-usuario" id="email-usuario" placeholder="carmen@castillo.es" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>
                    <div class="invalid-feedback">
                        Por favor, introduce un correo electrónico válido.
                </div>
                </div>


                <div class="col-12 col-md-4">
                    <label for="telefono-usuario">Teléfono</label>
                    <input class="form-control p-3" type="text" name="telefono-usuario" id="telefono-usuario" pattern="^(6|7|8|9)\d{8}$" placeholder="678126354" required>
                    <div class="invalid-feedback">
                        Por favor, introduce un número de teléfono válido.
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <label for="cp-usuario">Código Postal</label>
                    <input class="form-control p-3" type="text" name="cp-usuario" id="cp-usuario" pattern="^([0-4][1-9]|[5][0-2])\d{3}$" placeholder="03400" required>
                    <div class="invalid-feedback">
                        Por favor, introduce un código postal válido.
                    </div>
                </div>
            </div>
            <div class="float-end my-5 d-flex flex-column justify-content-end align-items-end">
                <label for="politicas-privacidad-usuario">
                    <input class="form-check-input mx-2" type="checkbox" name="politicas-privacidad-usuario" id="politicas-privacidad-usuario" required />
                    He leído y acepto la <a href="{{ route('privacyPolices') }}">política de privacidad</a>
                </label>
                <div class="invalid-feedback">
                    Debes aceptar la política de privacidad para continuar.
                </div>
                <button type="submit" id="boten" class="btn btn-outline-dark w-50 my-3">Encargar</button>
            </div>
        </form>


        </main>
        <div class="py-5 my-5"></div>


        <script>
            // Ejemplo de validación de formulario de Bootstrap
            (function () {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function (form) {
                        form.addEventListener('submit', function (event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
            })()

            const carousel_inner = document.querySelectorAll(".card");
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                // Con una expresión regular detectamos si es dispositivo, entonces quitamos las clases active, dejandoselo solo a uno.
                carousel_inner[1].setAttribute("class", "card m-3 carousel-item")
                carousel_inner[2].setAttribute("class", "card m-3 carousel-item")
            }

            let scrollPosition = 0;
            // carousel_inner.forEach(e=>console.log(e))

            document.querySelector(".carousel-control-next").addEventListener("click", function () {
                let activos = document.querySelectorAll(".carousel-inner .active");

                if (activos[activos.length - 1].dataset.ident != 5) {
                    let quit = activos[0].dataset.ident
                    carousel_inner[quit].setAttribute("class", "card m-3 carousel-item")

                    let id = parseInt(activos[activos.length - 1].dataset.ident) + 1
                    carousel_inner[id].setAttribute("class", "card m-3 carousel-item active")
                }
            });

            document.querySelector(".carousel-control-prev").addEventListener("click", function () {
                let activos = document.querySelectorAll(".carousel-inner .active");
                if (activos[0].dataset.ident != 0) {

                    let quit = activos[activos.length - 1].dataset.ident
                    carousel_inner[quit].setAttribute("class", "card m-3 carousel-item")

                    let id = parseInt(activos[0].dataset.ident) - 1
                    carousel_inner[id].setAttribute("class", "card m-3 carousel-item active")
                }
            });

            document.getElementById("boten").addEventListener("click", function (e) {
                e.preventDefault();
                publicacionEnCanal()
            })
            // function testUsuarioNombre(usuario_nombre) {
            //     const regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]*$/;
            //     return regex.test(usuario_nombre);
            // }
            // function testUsuarioDetalle(usuario_detalle) {
            //     const regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s\d]*$/;
            //     return regex.test(usuario_detalle);
            // }
            // function testUsuarioEmail(usuario_email) {
            //     const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
            //     return regex.test(usuario_email);
            // }
            // function testUsuarioTelefono(usuario_tel) {
            //     const regex = /^(6|7|8|9)\d{8}$/;
            //     return regex.test(usuario_tel);
            // }
            // function testUsuarioCp(usuario_cp) {
            //     const regex = /^([0-4][1-9]|[5][0-2])\d{3}$/;
            //     return regex.test(usuario_cp);
            // }
            // function testUsuarioCuando(usuario_cuando) {
            //     return usuario_cuando != "";
            // }

            function obtenerDatos() {
                const usuario_nombre = document.getElementById("identidad-usuario").value

                const usuario_menu = document.getElementById("pedido-usuario").value

                const usuario_detalle = document.getElementById("detalles-user").value

                const usuario_cuando = document.getElementById("hora-usuario").value

                const usuario_email = document.getElementById("email-usuario").value

                const usuario_tel = document.getElementById("telefono-usuario").value

                const usuario_cp = document.getElementById("cp-usuario").value

                const usuario_aceptaPoliticas = document.getElementById("politicas-privacidad-usuario").checked
                if (!usuario_aceptaPoliticas) {
                    alert("Debe aceptar las políticas de Privacidad")
                }else {
                    return { "identidad-usuario": usuario_nombre, "pedido-usuario": usuario_menu, "detalles": usuario_detalle, "hora-usuario": usuario_cuando, "email-usuario": usuario_email, "telefono-usuario": usuario_tel, "cp-usuario": usuario_cp }
                }
            }


            function publicacionEnCanal() {

                const formulario = document.getElementById('formul');
                if (!formulario.checkValidity()) {
                    formulario.classList.add('was-validated');
                    return;
                }

                const datosForm = obtenerDatos();
                let jsonData = JSON.stringify(datosForm);

                window.CSRF_TOKEN = '{{ csrf_token() }}';
                fetch("{{ route('encargos.store') }}", {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },

                    body: JSON.stringify(jsonData)
                })
                .then(response => {
                    if (response.status === 200) {
                        let formulario = document.getElementById('formul');
                        formulario.reset();
                        // Mostrar mensaje de éxito
                        let mensaje = document.getElementById('mensaje');
                        mensaje.style.display = 'block';
                        setTimeout(() => {
                        mensaje.style.display = 'none';
                        }, 5000); 
  
                        return response.json();
                    } else {
                        throw new Error('Error al guardar el encargo en el servidor');
                    }
                })
                .then(encargo => {
                    console.log('Encargo creado:', encargo);
                    if (encargo.id) {
                        const channelName = 'pollosChanel';
                        const apiKey = "jVwvcw.mYv2yA:LzJ0YKCqrncnG7Zs90n9E349K_yVvQRv5FI9mfJHSII"
                        const ably = new Ably.Realtime(apiKey);

                        let channel = ably.channels.get(channelName);

                        channel.publish('NuevoPedido', JSON.stringify({ ...datosForm, id: encargo.id }));
                        formulario.classList.remove('was-validated');
                    }
                })
                .catch(error => {
                    console.error(error);
                });



            }

            // Espera a que se cargue todo el contenido del documento antes de ejecutar el script
            document.addEventListener("DOMContentLoaded", function () {
                // Almacena la lista de días abiertos en una variable
                const days = @json($days);

                // Determina si una fecha dada está permitida en función de los días abiertos y las cerrados
                function isDateAllowed(date) {
                    const dayOfWeek = date.getDay();
                    const isOpen = days.some(
                        (day) =>
                            new Date(day.date).toDateString() === date.toDateString() &&
                            !day.is_open
                    );
                    const isClosed = days.some(
                        (day) =>
                            new Date(day.date).toDateString() === date.toDateString() &&
                            day.is_open
                    );
                    return (dayOfWeek === 5 || dayOfWeek === 6 || dayOfWeek === 0 || isOpen) && !isClosed;
                }

                // Devuelve las horas de apertura y cierre para una fecha dada
                async function getOpeningHours(date) {
                    const response = await fetch(`/get-opening-hours/${date.toISOString().split('T')[0]}`);
                    const hours = await response.json();
                    return {
                        startTime: hours.start_time,
                        endTime: hours.end_time,
                    };
                }

                // Inicializa el calendario de flatpickr con la configuración necesaria
                const fp = flatpickr("#hora-usuario", {
                    locale: "es",
                    enableTime: true,
                    time_24hr: true,
                    dateFormat: "Y-m-d\\TH:i",
                    altFormat: "j F H:i",
                    altInput: true,
                    minDate: "today",
                    disable: [
                        function (date) {
                            return !isDateAllowed(date);
                        },
                    ],
                    // Cuando el calendario esté listo, actualiza los días inhabilitados
                    onReady: async function (selectedDates, dateStr, instance) {
                        setTimeout(() => updateDisabledDays(instance), 100);
                        if (selectedDates[0]) {
                            const openingHours = await getOpeningHours(selectedDates[0]);
                            instance.set("minTime", openingHours.startTime);
                            instance.set("maxTime", openingHours.endTime);
                        }
                    },
                    // Cuando se cambie la fecha seleccionada, actualiza los días inhabilitados y las horas de apertura/cierre
                    onChange: async function (selectedDates, dateStr, instance) {
                        setTimeout(() => updateDisabledDays(instance), 100);
                        if (selectedDates[0]) {
                            const openingHours = await getOpeningHours(selectedDates[0]);
                            instance.set("minTime", openingHours.startTime);
                            instance.set("maxTime", openingHours.endTime);
                        }
                    },
                    // Cuando cambie el mes, actualiza los días inhabilitados
                    onMonthChange: function (selectedDates, dateStr, instance) {
                        setTimeout(() => updateDisabledDays(instance), 100);
                    },
                    // Cuando se abra el calendario, actualiza los días inhabilitados
                    onOpen: function (selectedDates, dateStr, instance) {
                        setTimeout(() => updateDisabledDays(instance), 100);
                    },
                });

                // Función para actualizar los estilos de los días inhabilitados en el calendario
                function updateDisabledDays(fp) {
                    const disabledDays = fp.days.childNodes;
                    const now = new Date();
                    now.setHours(0, 0, 0, 0);

                    disabledDays.forEach((day) => {
                        const date = new Date(day.dateObj.getTime());
                        if (!isDateAllowed(date) || date < now) {
                            day.classList.add("flatpickr-disabled-day");
                        } else {
                            day.classList.remove("flatpickr-disabled-day");
                        }
                    });
                }
            });


        </script>


    </div @endsection