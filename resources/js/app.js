import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
$(document).ready(
    () => {
        console.log('document chargé');
        //find selected quantity
        $(".cartChangeQuantity").change(
            (event) => {
                /*console.log('quantity:', event.target.value);
                console.log('ref:', event.target.id);*/
                const quantity = event.target.value;
                const id = event.target.id;


                //envoi des données à mettre à jour
                $.ajax('/cart/update/' + id + '/' + quantity).done(
                    res => {
                        console.log('result', res.result);
                        console.log('total', res.total);
                        $('#total').text(res.total);
                    })
            }
        )// end change quantity

        /*****
         * gestion du moteur de recherche
         */

        $("#search").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "/search/" + request.term,
                    /* dataType: "jsonp",
                     data: {
                         term: request.term
                     },*/
                    success: function (data) {

                        const dataName = data.map(item => item.name);
                        response(dataName);

                    }
                });
            },
            minLength: 2,
            select: function (event, ui) {
                log("Selected: " + ui.item.value + " aka " + ui.item.id);
            }
        })


    }
)//end ready
//vider le panier
function emptyCart() {
    window.location = "{{ route('/cart/delete"
}

/****
 * change la quantité de produits dans le panier
 * id:cart
 ***/

/*
const changeQuantity = (id = 0) => {

    console.log('changeQuantity debut');
    console.log('cart id :', id)
    console.log('changeQuantity fin');
}*/
