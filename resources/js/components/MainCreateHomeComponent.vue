<template>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2" v-if="filial">{{ filial }}</h1>
            <h1 class="h2" v-else>Выберите филиал</h1>
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
                id: 0,
            }
        },
        mounted() {
            console.log(this.active_id)
        },
        methods: {
            onFinal: function(event) {
                console.log(event)
            }
        },
        watch: {
            filial: function(newVal, oldVal) {
                
            }
        }
    }
</script>
