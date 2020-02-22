<template>
  <div>
    <div
      class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
    >
      <h1 class="h2">Управление вашими учреждениями</h1>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a
          class="nav-link active"
          id="home-tab"
          data-toggle="tab"
          href="#home"
          role="tab"
          aria-controls="home"
          aria-selected="true"
        >Уаделение</a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          id="profile-tab"
          data-toggle="tab"
          href="#profile"
          role="tab"
          aria-controls="profile"
          aria-selected="false"
        >Добвление</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <ul class="list-group mt-4" style="max-width:30%">
          <div
            class="d-flex justify-content-between"
            v-for="address in addresses"
            :key="address.id"
          >
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">{{ address.address_name }}</label>
            <div>
              <input
                class="mt-2"
                type="checkbox"
                :id="address.id"
                :value="address.id"
                v-model="checked_addresses"
              />
              <label class="ml-1" :for="address.id">удалить</label>
            </div>
          </div>
        </ul>
        <a href="#" class="btn btn-success mt-1" @click="deleteUch($event)" v-if="!asking_delete">Удалить</a>
        <div class="spinner-border text-success" role="status" v-if="asking_delete">
          <span class="sr-only"></span>
        </div>
        <span class="text-danger mt-3 ml-2" v-if="delete_valid">Выберите элементы для удаления!</span>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="form-row align-items-center mt-4">
          <div class="col-auto">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">Добавить учреждение</div>
              </div>
              <input
                type="text"
                v-bind:class="{ 'is-invalid' : valid }"
                class="form-control"
                v-model="uch_name"
                placeholder="введите название..."
                required
                autofocus
              />
            </div>
          </div>
          <div class="col-auto">
            <div class="spinner-border text-success" role="status" v-if="asking">
              <span class="sr-only"></span>
            </div>
            <a
              href="#"
              class="btn btn-success mb-2"
              @click="uchSave($event)"
              v-if="!asking"
            >Сохранить</a>
            <span class="text-danger mt-1 ml-2" v-if="status_202">Такое учреждение уже есть!</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: [],
  data: function() {
    return {
      uch_name: "",
      valid: "",
      status_202: false,
      asking: false,
      addresses: "",
      checked_addresses: [],
      delete_valid: false,
      asking_delete: false
    };
  },
  mounted() {
    this.getAddress();
  },
  methods: {
    deleteUch: function(event) {
    event.preventDefault()
      if (this.checked_addresses.length === 0) {
        this.delete_valid = true;
        console.log("no");
      } else {
        this.asking_delete = true;
        this.delete_valid = false;
        axios
          .post("/ajax/delete/address", {
            id: this.checked_addresses
          })
          .then(responce => {
            this.redirect();
            this.asking_delete = false;
          });
      }
    },
    getAddress: function() {
      axios.get("/ajax/addresses").then(response => {
        if (response.data === "") {
          this.no_addresses = true;
        }
        this.addresses = response.data;
      });
    },
    uchSave: function(event) {
      this.status_202 = false;
      event.preventDefault();
      if (this.isValid(this.uch_name)) {
        this.asking = true;
        this.valid = false;
        axios
          .post("/ajax/create/address", {
            name: this.uch_name
          })
          .then(responce => {
            this.asking = false;
            if (responce.status === 202) {
              this.status_202 = true;
            } else {
              this.redirect();
            }
          });
      } else {
        this.valid = true;
      }
    },
    isValid: function(name) {
      if (name === "") return false;
      else return true;
    },
    redirect: function() {
      window.location.href = "/home/actives";
    }
  }
};
</script>
