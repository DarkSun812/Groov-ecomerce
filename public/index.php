<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groov Store</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
</head>
<body>
    
    <div id="topbar" class="topbar">
        <topbar id_user="notLogged"></topbar>
    </div>
       
    <div class="container-fluid">
        <div class="showcase text-white d-flex justify-content-between align-items-center">
            <div class="showcase-direction go-left"></div>
            <div class="showcase-direction go-right">></div>
            <img src="https://video.cgtn.com/news/3d63444e35676a4d344d6a4d77516a4e3367444f31457a6333566d54/video/9b60b21e3f2d41628e812eeec3fd260f/9b60b21e3f2d41628e812eeec3fd260f.jpg" alt="carousel-1">
            <img src="https://dvh1deh6tagwk.cloudfront.net/finder-au/wp-uploads/2020/05/Clothesinarack_Getty_1536x864.jpg" alt="carousel-2">
            <img src="https://cdn.vox-cdn.com/thumbor/QgEMwYKlcK9fSFsZD2FIe9SouxM=/0x0:4915x3930/1200x800/filters:focal(1719x1156:2505x1942)/cdn.vox-cdn.com/uploads/chorus_image/image/61753005/clothingrack.0.jpg" alt="carousel-3">
        </div>
    </div>
    <div class="todo">
        <div class="container">
            <!-- Letra xd -->
           <h1>¡Ofertas!</h1> 
            <!-- SOLO BEST-SELLING ES CLASE ORIGINAL, EL RESTO ES DE BOOTSTRAP -->
            <div id="best-selling" class="best-sell d-flex justify-content-between flex-wrap">
                <!-- OBJETO VUE PARA LOS ITEMS -->
                <item-box v-for="(item, key) in items" :product_img="item" product_name="Oferta" :product_price="price[key]" v-for="item in items"></item-box>
                <!-- OBJETO VUE PARA LOS ITEMS -->
            </div>
        </div>
    </div>
    <!-- FALTA AGREGAR MÁS CONTENIDO EN EL FOOTER -->
    <footer class="bg-dark text-white">
        All rights reserved
    </footer>
    <script src="./groov-function.js"></script>
    <script>
        new Vue({
            el: '#best-selling',
            data: {
                hola: 'Holaa',
                items: [
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcT-KJJ86934j_xrD2TZ8NAzD4cuz7UgKwz2gg&usqp=CAU",
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTGtPmEY8jHc_USLiHZMOsTw9u-TpCnjEbY6Q&usqp=CAU",
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTBT4gf4QuqsINYa_OSdBQ1jJVMo4A0l1oOkQ&usqp=CAU",
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRIDc_bU6_Syrx1f2PXzTbvAxG9YFYL7Br3Tw&usqp=CAU",
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQteoFsKbgX3ehNl72GW7bORndrnSPoCM1PVw&usqp=CAU",
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQl2r6niWtFimVUavl7GIHT5Pg_b8zUd-BLPw&usqp=CAU",
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSigTsrn9COIn7p5QnBT0IlQ1AFMFNgMvx1xw&usqp=CAU",
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQxL3sbX2AvpC4w-Z5cgFxI7Nu7jbfIPiEqbw&usqp=CAU",
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTxdZJTNCzuAEY4YyBcGls87M27LdTrqCH_oQ&usqp=CAU",
                ],
                price: price
            }
        });
    </script>
</body>
</html>
