addEventListener('DOMContentLoaded', () =>{
    const contadores = document.querySelectorAll('.contador-cantidad');
    const velocidad = 10000000;
    const animarContadores = () =>{
        for (const contador of contadores) {
            const actualizarContador = () =>{
                let cantMax = +contador.dataset.cantidadTotal,
                valorActual = +contador.innerText,
                incremento = cantMax / velocidad;
                if(valorActual < cantMax){
                    contador.innerText = Math.ceil(valorActual + incremento);
                    setTimeout(actualizarContador, 5);
                }
                else{
                    contador.innerText = '+ de ' + cantMax;
                }
            };
            actualizarContador();
        }
    };

    const mostrarContadores = elementos =>{
        elementos.forEach(elemento => {
            if(elemento.isIntersecting){
                elemento.target.classList.add('animar');
                elemento.target.classList.remove('ocultar');
                setTimeout(animarContadores, 300);
            }
        });
    };

    const oberserver = new IntersectionObserver(mostrarContadores, {
        threshold: 0.75
    });
    const elementosHTML = document.querySelectorAll('.contador');
    elementosHTML.forEach(elementoHTML =>{
        oberserver.observe(elementoHTML);
    });
});