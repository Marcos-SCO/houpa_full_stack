const BASEApi = `http://localhost/projetosCompletos/houpa_test/src/api`;
const BASE = `http://localhost/projetosCompletos/houpa_test/src/`;

// Carrinho
let cart = [];
// Qtd inicial para itens
let modalQt = 1;

let modalKey = 0;

let content = document.getElementById('content');
let productContainer = document.querySelector('.product-container');
// let slickContainer = document.querySelector('.slick-container');

fetch(`${BASEApi}/lojas`)
    .then(data => data.json())
    .then(data => formContent(data))

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
                    <h2>${price}</h2>
                </figcaption>
                <button>Comprar</button>
            </figure>`
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