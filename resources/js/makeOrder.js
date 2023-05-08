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



/////////////////////////////////////////////


document.getElementById("boten").addEventListener("click", function (e) {
    e.preventDefault();
    publicacionEnCanal()
})
function testUsuarioNombre(usuario_nombre) {
    const regex = /^[a-zA-ZáéíóúÁÉÍÓÚ\s]*$/;
    return regex.test(usuario_nombre);
}
function testUsuarioDetalle(usuario_detalle) {
    const regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s\d]*$/;
    return regex.test(usuario_detalle);
}
function testUsuarioEmail(usuario_email) {
    const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    return regex.test(usuario_email);
}
function testUsuarioTelefono(usuario_tel) {
    const regex = /^(6|7|8|9)\d{8}$/;
    return regex.test(usuario_tel);
}
function testUsuarioCp(usuario_cp) {
    const regex = /^([0-4][1-9]|[5][0-2])\d{3}$/;
    return regex.test(usuario_cp);
}
function testUsuarioCuando(usuario_cuando) {
    return usuario_cuando != "";
}

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
    }

    if (
        testUsuarioNombre(usuario_nombre) &&
        testUsuarioDetalle(usuario_detalle) &&
        testUsuarioCuando(usuario_cuando) &&
        testUsuarioEmail(usuario_email) &&
        testUsuarioTelefono(usuario_tel) &&
        testUsuarioCp(usuario_cp) &&
        usuario_aceptaPoliticas
    ) {
        return { "identidad-usuario": usuario_nombre, "pedido-usuario": usuario_menu, "detalles": usuario_detalle, "hora-usuario": usuario_cuando, "email-usuario": usuario_email, "telefono-usuario": usuario_tel, "cp-usuario": usuario_cp }
    } else {
        return null
    }
}


function publicacionEnCanal() {

    const datosForm = obtenerDatos()
    let jsonData = JSON.stringify(datosForm)

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
            console.log(response.status);
            if (response.status = 200) {
                const channelName = 'pollosChanel';
                const apiKey = "jVwvcw.mYv2yA:LzJ0YKCqrncnG7Zs90n9E349K_yVvQRv5FI9mfJHSII"
                const ably = new Ably.Realtime(apiKey);

                let channel = ably.channels.get(channelName);

                channel.publish('NuevoPedido', jsonData);
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