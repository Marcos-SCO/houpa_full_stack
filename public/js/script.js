const BASEApi = `http://localhost/projetosCompletos/houpa_test/src/api`;
const BASE = `http://localhost/projetosCompletos/houpa_test/src/`;

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

// Função para gerar informações do modal
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
        <p>Camisas</p>
        <p><b>${name}</b></p>
        <p>${description}</p>
        <p><b>R$ ${price}</b></p>
        <div><p>Tamanhos:</p>`+ getGrids(grids) + `</div>
        <span class='item-qtd'>Quantidade: </span> 
        <button class='modal-button black'>Comprar</button>
        <button class='modal-button white'>Adicionar ao carrinho</button>
        <div>
            <p>Frete</p>
            <p>Calcule o frete estimado para sua região</p>
            <div class='calc'>
                <input type="text" placeholder="CEP" class='calc-input' />
                <button class='calc-btn'>Calcular</button>
            </div>
            <p>Não sei meu cep</p>
        </div>
        <div class='class='share''>
            <p>Compartilhar</p>
            <div class='share-img'>
               <img src='img/insta.svg' alt='Instagram'>
               <img src='img/pinterest.svg' alt='Pinterest'>
               <img src='img/whats.svg' alt='WhatsApp'>
               <img src='img/face.svg' alt='Facebook'>
               <img src='img/linkedin.svg' alt='LinkedIn'>
            </div>
        </div>
        </div>`;

    });
    return modalItem.append(modalContent);
}

// Traz os tamanhos de produtos com formatação
function getGrids(grids) {
    // Pega grids com html formatado
    return grids.map(({ quantity, sizeId, sizeName }) => {
        return `<span id='${sizeId}' class='grid-id-${sizeName} grid-item' onclick="showQuantity(this,${quantity})">${sizeName}</span>`
    }).join('');
}

// Função para mostrar quantidade dos tamanhos
function showQuantity(e, quantity) {
    // Pega todos elementos 
    let gridItems = document.querySelectorAll('.grid-item');
    // Remove classe ativa 
    gridItems.forEach(item => item.classList.remove('active'));
    // Adiciona classe active para elemento
    e.classList.add('active');
    // Pega elemento
    let qtdItem = document.querySelector('.item-qtd');
    // Joga a quantidade no elemento
    qtdItem.innerHTML = `Quantidade: ${quantity}`;
}

/// Função para o slider do slick
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
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        ]
    })
};