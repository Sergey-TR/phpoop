let buttons = document.querySelectorAll('.product__add');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/addBasket/', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: id,
                            total: "1"
                            //totalSumm: "0"
                        })
                    });
                    const answer = await response.json();
                    document.getElementById('total').innerText = answer.total;
                    //document.getElementById('totalSumm').innerText = answer.totalSumm;
                }
            )();
        })
    });
let totalSumm = document.getElementById('totalSumm');
let clearBtn = document.querySelectorAll('.clear_btn');
    clearBtn.forEach((elem) => {
    elem.addEventListener('click', () => {
        let id = elem.getAttribute('data-id');

        (
            async () => {
                const response = await fetch('/basket/deleteProductBasket/', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id: id,
                        totalSumm: totalSumm
                    })
                });
                const answer = await response.json();
                location.replace('http://php.oop/basket/basket/');
                document.getElementById(id).remove();
                document.getElementById('total').innerText = answer.total;
                document.getElementById('totalSumm').innerText = answer.totalSumm;
            }
        )();
    })
});
    function ok() {
        alert('Заказ принят в обработку, в ближайшее время с Вами свяжуться')
    }

    //НЕ ПОЛУЧИЛОСЬ

// let changeBtn = document.querySelectorAll('.qty_inp');
//     changeBtn.forEach((elem) => {
//     elem.addEventListener('click', () => {
//         let id = elem.getAttribute('id');
//         (
//             async () => {
//                 const responce = await fetch('/basket/changeProductBasket/', {
//                     method: 'POST',
//                     headers: {
//                         'Content-Type': 'application/json'
//                     },
//                     body: JSON.stringify({
//                         id: id,
//
//                     })
//                 });
//                 console.log(responce);
//                 const answer = await response.json();
//                 document.getElementById('count').innerText = answer.count;
//             }
//         )();
//     });
// });