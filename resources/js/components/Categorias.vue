<template>
   <main>
      <div class="container">
       <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">Crear Nueva Categoria</div>
                <div class="card-body">
                    <form @submit.prevent="crear">

                        <div class="row">
                            <div class="col-12 mb-2 ">
                                <div class="form-group">
                                    <label>Categoria</label>
                                    <input type="text" class="form-control" v-model="seccion">
                                    <div class="alert alert-danger" v-if="errors && errors.seccion">
                                      {{ errors.seccion[0] }}
                                    </div>
                              </div>
                            </div>
                        </div>

                      <button type="submit" class="btn btn-success">Crear</button>
                      <router-link to="/blogs" class="btn btn-danger">Cancelar</router-link>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
   </main>
</template>


<script>
export default {
  name:"nuevacategoria",
  data(){
      return{
        seccion :"",
        errors : {}
        }
  },
  methods:{
      crear(){

             this.axios.post('http://localhost:8000/api/addcategoria', {
                 seccion : this.seccion
             })
               .then((res) => this.$router.push({name:'blogs'}))
               .catch((err) => {
                  if(err.response.status === 422)
                   {
                    this.errors = err.response.data.errors
                   }
                });
        }
  }
}

</script>
