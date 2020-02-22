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
                            <hr>
                            <li class="nav-item">
                                <a class="nav-link" href="#" @click="setActiveUch($event)">
                                    <span data-feather="shopping-cart"></span>
                                    добавить/удалить...
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main-home-component :active_id="active_id" :no_addresses="no_addresses" :filial="filial"></main-home-component>
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
                filial: undefined,
                no_addresses: false,
            }
        },
        mounted() {
            this.getAddress()
        },
        methods: {
            getAddress: function() {
                axios.get('/ajax/addresses').then((response) => {
                    if(response.data === '') {
                        this.no_addresses = true
                    }
                    this.addresses = response.data
                });
            },
            setActive: function(id,address, event) {
                event.preventDefault()
                this.active_id = id
                this.filial = address
            },
            setActiveUch: function(event) {
                event.preventDefault()
                this.active_id = 'newUch'
            }
        }
    }
</script>
