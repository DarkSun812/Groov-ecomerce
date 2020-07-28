//VARIABLES E INICIALIZACIONES NECESARIAS
let itemsRopa;
let price = [];
let articulos_en_carrito = [];
let COOKIE = "";
console.log(COOKIE);
for(let i=0;i<9;i++){
    price[i] = Math.floor(Math.random() * 50) + 10;
}

//AREA DE COOKIES Y SESIONES
const queryString = window.location.search;
let hasCookie = document.cookie;
let cookieSplit;
let cookieName = 0;



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
    props:['product_name','product_price','product_img','product_id'],
    //Hay clases de bootstrap dentro del template
    data: function(){
        return{
                item_id:function idArticulo(id){
                    articulos_en_carrito.push(id);
                    document.cookie = `articulos=${articulos_en_carrito}`;
                }
        }
    },
    template: `
    <div class="item-box mt-4">
        <div class="contenido">
            <div class="item-image">
                <img :src="product_img" :alt="product_img">
            </div>
            <div class="item-name">{{ product_name }}</div>
            <div class="item-price">{{ product_price }}$</div>
            <div class="button"><button v-on:click="item_id(product_id)">Agregar al carrito</button></div>
        </div>
    </div>    
    `
})

Vue.component('topbar',{
    props:['id_user','username','tipo_usuario'],
    //Hay clases de bootstrap dentro del template
    data: function(){
        return {
            isLogged: function(){
                if(this.id_user == "notLogged"){
                    return false;
                }else{
                    return true;
                }
            },
            isHidden: true,
            isAdmin: function(){
                if(this.tipo_usuario == 'admin'){
                    return true;
                }
            }
        }
    },
    template:`
    <nav class="navbar bg-secondary d-flex justify-contnet-between">
        <a href="./index.html" class="navbar-brand text-white">
            <img loading="lazy" src="../img/logo.png" alt="logo-groov" class="logo">
        </a>
        <div v-if="isLogged()" class="navbar-options d-flex flex-column p-1">
        <span>Artículos: ${articulos_en_carrito.length}</span>    
        <span v-on:click="isHidden = !isHidden" id="userMenuBtn">{{ username }}</span>
            <div class="userMenu bg-light flex-column" :class="{'d-none': isHidden}">
                <a href="store.php">Tienda</a>
                <a v-if="isAdmin()" href="menu.php">Menu</a>
                <a href="../logout.php">Salir</a>
            </div>
            
        </div>
        <div v-else class="navbar-options d-flex justify-contnet-between p-1">
            <a href="login.html" class="text-white m-2">Ingresar</a>
            <a href="register.html" class="text-white m-2">Registrarse</a>
        </div>
        
    </nav>
    `
});

Vue.component('input-menu',{
    props:['nombre','valor'],
    data: function(){
        return{
            readonly:this.bloqueado
        }
    },
    template:`
    <div class="form-group">
        <label for="nombre">{{ nombre }}</label>
        <input class="form-control" type="text" :name="nombre" :value="valor">
    </div>
    `
});

//FIN CREACIÓN DE COMPONENTES VUE
// 
// 
// 
//INICIALIZACIONES DE VUE
const topBar = new Vue({
    el: '#topbar',
    data:{
        hola: 'hola',
        ok: true
    }
})
//FIN INICIALIZACIONES DE VUE
