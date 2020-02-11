<template>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div v-if="filial" class="d-flex justify-content-between">
                <h1 class="h2">{{ filial }}</h1>
                <filter-main-home-component></filter-main-home-component>
            </div>
            <h1 class="h2" v-else>Выберите филиал</h1>
            
        </div>
        <div class="row row-cols-1 row-cols-md-2" v-for="object in objects" :key="object.id">
            <cart-main-home-component :object="object"></cart-main-home-component>
        </div>
    </main>
</template>

<script>
    export default {
        props:[
            'active_id',
            'filial'
        ],
        data: function() {
            return {
                objects: undefined
            }
        },
        mounted() {
            console.log('loaded')
        },
        methods: {
            getObjects: function() {
                axios.get('/ajax/objects').then((responce) => {
                    console.log(responce.data);
                    this.objects = responce.data
                });
            }
        },
        watch: {
            filial: function(newVal, oldVal) {
                this.getObjects()
            }
        }
    }
</script>
