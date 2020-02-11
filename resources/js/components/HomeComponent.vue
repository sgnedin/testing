<template>
      <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar mt-4">
                    <div class="sidebar-sticky">
                        <h6>Ваши филиалы:</h6>
                        <ul class="nav flex-column">
                            <li class="nav-item" v-for="address in addresses" :key="address.id">
                                <a class="nav-link" href="#" @click="setActive(address.id, address.address_name, $event)">
                                    <span data-feather="shopping-cart"></span>
                                    {{ address.address_name }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main-home-component :active_id="active_id" :filial="filial"></main-home-component>
            </div>
        </div>
</template>

<script>
    export default {
        props:['user'],
        data: function(){
            return {
                addresses: '',
                active_id: 0,
                filial: undefined
            }
        },
        mounted() {
            this.update()
            this.getAddress()
        },
        methods: {
            update: function() {
                console.log(this.user);
            },
            getAddress: function() {
                axios.get('/ajax/addresses').then((response) => {
                    this.addresses = response.data
                });
            },
            setActive: function(id,address, event) {
                event.preventDefault()
                this.active_id = id
                this.filial = address
            }
        }
    }
</script>
