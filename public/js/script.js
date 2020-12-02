const BASEApi = `http://localhost/projetosCompletos/houpa_test/src/api`;
const BASE = `http://localhost/projetosCompletos/houpa_test/src/`;

// Carrinho
let cart = [];
// Qtd inicial para itens
let modalQt = 1;

let modalKey = 0;

let body = document.querySelector('body');
let content = document.getElementById('content');
let modalItem = document.querySelector('.modal-item');
let productContainer = document.querySelector('.product-container');
// let slickContainer = document.querySelector('.slick-container');

fetch(`${BASEApi}/lojas`)
    .then(data => data.json())
    .then(data => formContent(data));

function formContent(data) {
    data.map(({ id, name, products, thumb }) => {
        productContainer.innerHTML +=
            `<div id="store-${id}" class="store-container">
            <figure class='store-figure'>
                <img src='${thumb}'>
                <figcaption>
                    <h3>${name}</h3>
                </figcaption>
            </figure>
            <div class='responsive slick-container'>${productContent(products)}</div>`;
    });

    // Renderiza slick na tela
    initSlick();
}

function productContent(products) {
    return products.map(({ id, name, description, photo, price }) => {
        return `<figure id='camisa_${id}' class='camisa-item'>
            <span id='${id}' class='fav-item'></span>
            <img src='${BASE}${photo}'>
                <figcaption>
                    <h3>${description}</h3>
                    <h2>R$ ${price}</h2>
                </figcaption>
                <button onclick="fetchForModal(${id});">Comprar</button>
            </figure>`
    }).join('');
}

function fetchForModal(id) {
    fetch(`${BASEApi}/produtos/${id}`)
        .then(data => data.json())
        .then(data => modalGenerate(data));
}

function modalGenerate(...data) {
    console.log(data);
    modalItem.innerHTML = '';
    modalItem.classList.add('active');
    body.classList.add('modal-active');
    modalItem.innerHTML += `<span class='modal-close' onClick="modalItem.classList.remove('active');body.classList.remove('modal-active')">X</span>`;

    let modalContent = document.createElement('div');
    modalContent.classList.add('modal-content');

    data.map(({ id, name, description, photo, price, grids, store }) => {
        // Modal info 1
        modalContent.innerHTML += `<div class='modal-info1'>
        <img src='${photo}'>
        <ul class='product-info'>
        <li>- ${description}</li>
        <li>- Marca: ${store}</li>
        </ul>
        </div>`;

        // modal info 2
        modalContent.innerHTML += `<div class='modal-info2'>
        <span id='${id}' class='fav-item modal'></span>
        <h5>Camisas</h5>
        <h2>${name}</h2>
        <h4>${description}</h4>
        <h1>R$ ${price}</h1>
        <div><h5>Tamanhos:</h5>`+
            getGrids(grids)
            + `</div>
        </div>`;

    });
    return modalItem.append(modalContent);
}

function getGrids(grids) {
    return grids.map(({ quantity, sizeId, sizeName }) => {
        return `<span id='${sizeId}' class='grid-item' onclick="this.classList.toggle('active');">${sizeName}</span>`
    }).join('');
}

function initSlick() {
    $('.responsive').slick({
        arrows: true,
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    })
};