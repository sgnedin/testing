<template>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10">
        <div v-if="show">
            <div v-if="active_id === 'newUch'">
                <add-new-uch-component></add-new-uch-component>
            </div>
            <div v-else>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2" v-if="filial">{{ filial }}</h1>
                    <h1 class="h2" v-else>Выберите учреждение</h1>
                </div>
                <div v-if="!no_addresses">
                    <filter-main-home-component v-if="filial"></filter-main-home-component>
                    <div class="row row-cols-1 row-cols-md-2 mt-4" v-for="object in objects" :key="object.id">
                        <cart-main-home-component :object="object"></cart-main-home-component>
                    </div>
                </div>
                <div v-else><h3>Увас нет учреждений!</h3> добавить...</div>
            </div>
        </div>
    </main>
</template>

<script>
    export default {
        props:[
            'active_id',
            'filial',
            'no_addresses'
        ],
        data: function() {
            return {
                objects: undefined,
                show: true
            }
        },
        mounted() {
            console.log('loaded')
        },
        methods: {
            getObjects: function() {
                axios.get('/ajax/objects').then((responce) => {
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

<style>
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>