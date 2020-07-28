Vue.component('articulo',{
    props:['articulo_precio','articulo_nombre','articulo_img'],
    
    template:`
    <div id="articulo-box" class="articulo-box row d-flex">
        <div class="articulo-img col">
            <img :src="articulo_img" :alt="articulo_img">
        </div>
        <div class="articulo-desc col-6">
            <h3 class="nombre">{{ articulo_nombre }}</h3>
            <span class="precio-ariculo">{{ articulo_precio }}$</span>
        </div>
        <div class="quitar-articulo col">X</div>
    </div>
    `
});

const aritucloContainer = new Vue({
    el: '#articulo-container'
});