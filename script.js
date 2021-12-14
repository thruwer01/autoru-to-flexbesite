const catalog = document.querySelector('#car_catalog');

$.ajax({
    method: "GET",
    url: "https://u1550497.cp.regruhosting.ru/api/v1/get_cars/",
    success: (data) => {
        const cars = data;

        // cars.map(car => {
        //     let carNode = document.createElement('div');
        //     carNode.className = 'cell';
        //     carNode.innerHTML = `
        //     <div class="cell_inside">
        //         <a href="${car.car_url}" target="_blank">
        //             <img class="img" src="${car.car_main_img}"/>
        //             <div class="car_all_info">
        //                 <span class="car_name">${car.car_name}</span>
        //                 <span class="car_info">${car.car_year}, ${car.car_run} км</span>
        //                 <span class="car_price">${car.car_price} <b>₽</b></span>
        //             </div>
        //         </a>
        //     </div>
        //     `;
        //     catalog.appendChild(carNode);
        // });
        console.log(cars);
    }
})