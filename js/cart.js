$(document).ready(function () {
    var cart = [];

    window.location.href = "file:///C:/xampp/htdocs/woncoalt/chocolateria/boostrap/detalles-del-producto.html";
    var productName = $(this).data("product");
        var productPrice = $(this).data("price");

        // Agregar el producto al carrito
        cart.push({ name: productName, price: productPrice });

        // Redirigir a la página del carrito
        redirectToCart();
    });

    function redirectToCart() {
        // Construir la URL de la página de carrito
        var cartPageUrl = "file:///C:/xampp/htdocs/woncoalt/chocolateria/boostrap/carrito.html";

        // Agregar los productos seleccionados a la URL (puedes usar URLSearchParams)
        cart.forEach(function (item, index) {
            cartPageUrl += (index === 0 ? "?" : "&") + "product[]=" + encodeURIComponent(item.name) + "&price[]=" + encodeURIComponent(item.price);
        });

        // Redirigir al usuario a la página de carrito
        window.location.href = cartPageUrl;
    }
;
