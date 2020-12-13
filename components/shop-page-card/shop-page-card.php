<link rel="stylesheet" href="./components/shop-page-card/shop-page-card.css">

<script>
    async function addToCart(id) {
        fetch('cart-functions/addToCart.php', {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/json'
                },
                redirect: 'follow',
                referrerPolicy: 'no-referrer',
                body: JSON.stringify({
                    id: id
                })
            })
            .then(val => val.json())
            .then(dataResult => {
                console.log(dataResult)

                if (dataResult.statusCode == 200) {
                    const success = '#success' + id;
                    const ele = document.querySelector(success)
                    ele.innerHTML = 'Added to Cart';
                    ele.classList.add('success')

                    setTimeout(() => {
                        ele.innerHTML = '';
                        ele.classList.remove('success')
                    }, 2000)
                } else if (dataResult.statusCode == 201) {
                    alert("Error occured !");
                } else if (dataResult.statusCode == 202) {
                    window.alert('please login first');
                    window.open('login.php', '_self');
                }
            })
            .catch(err => console.log(err))

    }
</script>

<?php
function shop_page_card($id, $title, $cost, $stock, $desc, $image)
{
    $svg = file_get_contents("./images/shopping-cart.svg");
    echo "
        <div class=\"shop-card\">
        <div class=\"shop-card-img\">
            <img src=$image alt=\"placeholder\">
        </div>

        <div class=\"shop-card-data\">
            <div class=\"shop-card-title-cost-avail\">
                <div class=\"shop-card-title-cost\">
                    <div class=\"shop-card-title\">
                        $title
                    </div>
                    <div class=\"shop-card-cost\">
                        ₹$cost
                    </div>
                </div>
                <div class=\"shop-card-avail\">
                    ✕ $stock
                </div>
            </div>
            <div class=\"shop-card-desc-btn\">
                <div class=\"shop-card-desc\">
                    <div>$desc</div>
                </div>
                <button class=\"shop-card-btn\" onclick=\"addToCart($id)\">
                    $svg
                </button>
            </div>
        </div>
        <p id=\"success$id\"></p>
        </div>

    ";
}
