    
<template>
  <div>
    <a
      class="btn btn-primary"
      data-toggle="collapse"
      href="#collapseExample"
      role="button"
      aria-expanded="false"
      aria-controls="collapseExample"
    >Фильтр</a>
    <div class="collapse" id="collapseExample">
      <div class="card card-body mt-4">
        <div class="d-flex">
          <div class="container-fluid">
            <div class="form-check">
              <label>Этажи</label>
            </div>
            <div class="form-check" v-for="floors in filters.floors" :key="floors.id">
              <input class="form-check-input" type="checkbox" value id="defaultCheck1" />
              <label class="form-check-label" for="defaultCheck1">{{ floors.name }}</label>
            </div>
          </div>
          <div class="container-fluid">
            <div class="form-check">
              <label>Производитель</label>
            </div>
            <div class="form-check" v-for="(proizvod, iterator) in filters.proizv" :key="iterator">
              <input class="form-check-input" type="checkbox" value id="defaultCheck1" />
              <label class="form-check-label" for="defaultCheck1">{{ proizvod }}</label>
            </div>
          </div>
          <div class="container-fluid">
            <div class="form-check">
              <label>Учреждение</label>
            </div>
            <div class="form-check" v-for="uch in filters.uch" :key="uch.id">
              <input class="form-check-input" type="checkbox" value id="defaultCheck1" />
              <label class="form-check-label" for="defaultCheck1">{{ uch.address_name }}</label>
            </div>
          </div>
          <div class="container-fluid">
            <div class="form-check">
              <label>Актив</label>
            </div>
            <div class="form-check" v-for="active in filters.active" :key="active.id">
              <input class="form-check-input" type="checkbox" value id="defaultCheck1" />
              <label class="form-check-label" for="defaultCheck1">{{ active.name }}</label>
            </div>
          </div>
          <div class="container-fluid">
            <div class="form-check">
              <label>Кабинет</label>
            </div>
            <div class="form-check" v-for="(cab, iterator) in filters.cabinet" :key="iterator">
              <input class="form-check-input" type="checkbox" value id="defaultCheck1" />
              <label class="form-check-label" for="defaultCheck1">{{ cab }}</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      filters: ""
    };
  },
  props: ["object"],
  mounted() {
    this.getFilters();
  },
  methods: {
    getFilters: function() {
      axios.get("/ajax/filters").then(responce => {
        console.log(responce.data);
        this.filters = responce.data;
      });
    }
  }
};
</script>
