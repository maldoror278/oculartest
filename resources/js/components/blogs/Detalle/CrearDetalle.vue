<template>
   <main>
     <div class="container">
       <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">Crear Nuevo Post</div>
                <div class="card-body">
                    <form @submit.prevent="crearPost">
                        <div class="row">
                            <div class="col-12 mb-2 ">
                             <div class="form-floating">
                              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                              <label for="floatingTextarea2">Contenido</label>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2 ">
                                <div class="form-group">
                                    <label>Autor</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Crear</button>
                    </form>
                       <button class="btn btn-danger" v-on:click="cancelar">Cancelar</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
</template>


<script>
export default {
    name:"detalle",
    data(){
        return {
            autor: "",
            contenido: ""
        }
    },
    mounted(){
    },
    methods:{
      crearPost(){
            this.axios.post('http://localhost:8000/api/savedetalle',{
                autor : "jesus",
                contenido : "contenido",
                idPadre : this.$route.params.id
            })
              .then((res) => this.$router.go(-1))
              .catch((err) => {
                 if(err.response.status === 422)
                  {
                    this.errors = err.response.data.errors
                  }
              });
        },
      cancelar(){
          this.$router.go(-1)
      }
    }
}
</script>
