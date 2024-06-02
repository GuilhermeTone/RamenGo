import Swal from 'sweetalert2';
let idProtein = null;
let idBroth = null;
document.addEventListener('DOMContentLoaded', function () {
    function listProteins() {
        fetch(`/api/proteins`, {
            headers: {
                'x-api-key': 'ZtVdh8XQ2U8pWI2gmZ7f796Vh8GllXoN7mr0djNf'
            }
        })
            .then(response => response.json())
            .then(proteins => {
                const divBody = document.querySelector('.cards_proteins');
                divBody.innerHTML = '';
                if (proteins.error == 'x-api-key header missing') {
                    Swal.fire({
                        title: 'Atenção!',
                        text: 'Não foi possível carregar os dados. Por favor, tente novamente mais tarde.',
                        icon: 'warning',
                    })
                }
                proteins.forEach(protein => {
                    const card = document.createElement('div');

                    card.innerHTML = `
                    <div class="card-protein" data-protein-id="${protein.id}">
                        <img src="${protein.imageActive}" alt="${protein.name}" style="display: none;" class="img-protein-ativa">
                        <img src="${protein.imageInactive}" alt="${protein.name}" class="img-protein-inativa">
                        <h2>${protein.name}</h2>
                        <p>${protein.description}</p>
                        <span class="price">US$ ${protein.price}</span>
                    </div>
                `;

                    divBody.appendChild(card);

                });
                document.querySelectorAll('.card-protein').forEach(button => {
                    button.addEventListener('click', function () {
                        document.querySelectorAll('.card-protein.protein-selected').forEach(el => {
                            el.classList.remove('protein-selected');

                            let imgAtiva = el.querySelector('.img-protein-ativa');
                            let imgInativa = el.querySelector('.img-protein-inativa');
                            imgAtiva.style.display = 'none';
                            imgInativa.style.display = 'unset';
                        });

                        this.classList.add('protein-selected');

                        let imgAtiva = this.querySelector('.img-protein-ativa');
                        let imgInativa = this.querySelector('.img-protein-inativa');
                        if (imgAtiva) imgAtiva.style.display = 'unset';
                        if (imgInativa) imgInativa.style.display = 'none';

                        idProtein = this.getAttribute('data-protein-id');
                    });
                });
            })
            .catch(error => console.error(error));
    }

    listProteins();

    function listBroths() {
        fetch(`/api/broths`, {
            headers: {
                'x-api-key': 'ZtVdh8XQ2U8pWI2gmZ7f796Vh8GllXoN7mr0djNf'
            }
        })
            .then(response => response.json())
            .then(broths => {
                const divBody = document.querySelector('.cards_broths');
                divBody.innerHTML = '';
                if (broths.error == 'x-api-key header missing') {
                    Swal.fire({
                        title: 'Atenção!',
                        text: 'Não foi possível carregar os dados. Por favor, tente novamente mais tarde.',
                        icon: 'warning',
                    })
                }
                broths.forEach(broth => {
                    const card = document.createElement('div');

                    card.innerHTML = `
                    <div class="card-broth" data-broth-id="${broth.id}">
                        <img src="${broth.imageActive}" alt="${broth.name}" style="display: none;" class="img-broth-ativa">
                        <img src="${broth.imageInactive}" alt="${broth.name}" class="img-broth-inativa">
                        <h2>${broth.name}</h2>
                        <p>${broth.description}</p>
                        <span class="price">US$ ${broth.price}</span>
                    </div>
                `;

                    divBody.appendChild(card);

                });
                document.querySelectorAll('.card-broth').forEach(button => {
                    button.addEventListener('click', function () {

                        document.querySelectorAll('.card-broth.broth-selected').forEach(el => {
                            el.classList.remove('broth-selected');
                            // Reverte todas as imagens ao estado normal
                            let imgAtiva = el.querySelector('.img-broth-ativa');
                            let imgInativa = el.querySelector('.img-broth-inativa');
                            imgAtiva.style.display = 'none';
                            imgInativa.style.display = 'unset';
                        });

                        this.classList.add('broth-selected');

                        let imgAtiva = this.querySelector('.img-broth-ativa');
                        let imgInativa = this.querySelector('.img-broth-inativa');
                        if (imgAtiva) imgAtiva.style.display = 'unset';
                        if (imgInativa) imgInativa.style.display = 'none';

                        idBroth = this.getAttribute('data-broth-id');
                    });
                });


            })
            .catch(error => console.error(error));
    }

    listBroths();

    document.querySelector('#make-order-button').addEventListener('click', function (e) {
        e.preventDefault();
        if (idProtein && idBroth) {

            fetch('/api/orders', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'x-api-key': 'ZtVdh8XQ2U8pWI2gmZ7f796Vh8GllXoN7mr0djNf'
                },
                body: JSON.stringify({
                    brothId: idBroth,
                    proteinId: idProtein
                })
            })
                .then(response => response.json())
                .then(orders => {
                    if (orders.error == 'x-api-key header missing') {
                        Swal.fire({
                            title: 'Atenção!',
                            text: 'Não foi possível carregar os dados. Por favor, tente novamente mais tarde.',
                            icon: 'warning',
                        })
                    }
                    if (orders.error == 'both brothId and proteinId are required') {
                        Swal.fire({
                            title: 'Atenção!',
                            text: 'Selecione ao menos 1 Proteina e um acompanhamento.',
                            icon: 'warning',
                        })
                    }
                    if (orders.error == 'could not place order') {
                        Swal.fire({
                            title: 'Erro!',
                            text: 'Não conseguiu fazer o pedido',
                            icon: 'error',
                        })
                    }

                    window.location.replace(`/success/${orders.proteinId}/${orders.brothId}`);

                })
                .catch((error) => {
                    Swal.fire({
                        title: 'Atenção!',
                        text: 'Não conseguiu fazer o pedido',
                        icon: 'error',
                    })
                });
        }else{
            Swal.fire({
                title: 'Atenção!',
                text: 'Selecione ao menos 1 Proteina e um acompanhamento.',
                icon: 'warning',
            })
        }


    });
});


