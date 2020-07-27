//AREA DE COOKIES Y SESIONES
const queryString = window.location.search;
let hasCookie = document.cookie;
let cookieSplit;
let cookieName = 0;
let itemsRopa;

if(queryString == '?err=1'){
    alert('Usuario o clave inválido')
}

function checkValidation(form){
    form.submit();
}

if(hasCookie){
    cookieSplit = hasCookie.split('=');
    cookieName = cookieSplit[1].split(';')
}
//FIN AREA DE COOKIES Y SESIONES
// 
// 
// 
//CREACIÓN DE COMPONENTES VUE
Vue.component('item-box',{
    props:['product_name','product_price','product_img'],
    //Hay clases de bootstrap dentro del template
    template: `
    <div class="item-box mt-4">
        <div class="item-image">
            <img :src="product_img" :alt="product_img">
        </div>
        <div class="item-name">{{ product_name }}</div>
        <div class="item-price">{{ product_price }}$</div>
        <div class="button">
            <button>Agregar al carrito</button>
        </div>
    </div>    
    `
})

Vue.component('topbar',{
    data:function(){
        return{
            isLogged: hasCookie,
            username: cookieName[0],
            isHidden: true
        }
    },
    //Hay clases de bootstrap dentro del template
    template:`
    <nav class="navbar bg-secondary d-flex justify-contnet-between">
        <a href="./index.html" class="navbar-brand text-white">
            <img src="./img/logo.png" alt="logo-groov" class="logo">
        </a>
        <div v-if="isLogged" class="navbar-options d-flex flex-column p-1">
            <span v-on:click="isHidden = !isHidden" id="userMenuBtn">{{ username }}</span>
            <div class="userMenu bg-light flex-column" :class="{'d-none': isHidden}">
                <a href="#">Carrito</a>
                <a href="#">Configuración</a>
                <a href="logout.php">Salir</a>
            </div>
        </div>
        <div v-else class="navbar-options d-flex justify-contnet-between p-1">
            <a href="login.html" class="text-white m-2">Ingresar</a>
            <a href="register.html" class="text-white m-2">Registrarse</a>
        </div>
    </nav>
    `
});
//FIN CREACIÓN DE COMPONENTES VUE
// 
// 
// 
//INICIALIZACIONES DE VUE
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
        ]
    }
});

const topBar = new Vue({
    el: '#topbar',
    data:{
        hola: 'hola',
        ok: true
    }
})
//FIN INICIALIZACIONES DE VUE
