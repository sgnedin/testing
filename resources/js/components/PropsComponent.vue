<template>
    <p>lol</p>





</template>

<script>
    export default {
        data: function() {
            return {
                author: '',
                id: 0
            }
        },
        props:[
            'urldata', 'press'
        ],
        mounted() {
            console.log('built')
        },
        methods: {
            update: function() {
                console.log('pressed')
                this.id ++

                axios.get('/get_ajax_data').then((response) => {
                    console.log(response)
                    this.author = response.data.author
                });
            }
        }
    }
</script>
