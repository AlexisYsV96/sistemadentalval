$(document).ready(function () {
    //console.log(dataHome)
    const meses = [
        'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
    ];
    //const datos = [10, 20, 15, 30, 25, 35, 45, 40, 35, 30, 20, 15];
    let datosTemp = [0,0,0,0,0,0,0,0,0,0,0,0];

    const datos = datosTemp.map((element,index)=>{
        let objmes = dataHome.find((obj)=> parseInt(obj.mes) - 1 == index );
        return objmes ? objmes.cantidad : element
    });
    
    const ctx = document.getElementById('bar-chart').getContext('2d');
    
    // const barChart = new Chart(ctx, {
    //     type: 'bar',
    //     data: {
    //     labels: meses,
    //     datasets: [{
    //         label: 'Citas Mensuales',
    //         data: datos,
    //         backgroundColor: 'rgba(75, 192, 192, 0.5)', // Color de las barras
    //         borderColor: 'rgba(75, 192, 192, 1)', // Borde de las barras
    //         borderWidth: 1 // Ancho del borde de las barras
    //     }]
    //     },
    //     options: {
    //     responsive: true, // Hace que el gráfico sea responsive
    //     maintainAspectRatio: false, // Permite ajustar el tamaño del gráfico
    //     scales: {
    //         yAxes: [{
    //             ticks: {
    //                 beginAtZero: true // Comienza en 0 en el eje Y
    //             }
    //         }]
    //     }
    //     }
    // });
    var lineChart = new Chart(ctx, {
        type: 'line', // Tipo de gráfico de líneas
        data: {
            labels: meses,
            datasets: [{
                label: 'Citas Registradas por Mes',
                data: datos,
                fill: false, // Sin relleno debajo de la línea
                borderColor: 'rgba(75, 192, 192, 1)', // Color de la línea
                borderWidth: 2 // Ancho de la línea
            }]
        },
        options: {
            responsive: true, // Hace que el gráfico sea responsive
            maintainAspectRatio: false, // Permite ajustar el tamaño del gráfico
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true // Comienza en 0 en el eje Y
                    }
                }]
            }
        }
    });    
});
