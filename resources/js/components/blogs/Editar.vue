<template>
    <main>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">Editar blog</div>
                <div class="card-body">
                    <form @submit.prevent="update">

                       <div class="row">
                            <div class="col-12 mb-2 ">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" v-model="blog.titulo">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-2 ">
                                <div class="form-group">
                                    <label>Resume</label>
                                    <input type="text" class="form-control" v-model="blog.resumen">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-2 ">
                                <div class="form-floating">
                                <textarea class="form-control" style="height: 100px" v-model="blog.contenido"></textarea>
                             </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-2 ">
                                <div class="form-group">
                                    <label>Autor</label>
                                    <input type="text" class="form-control" v-model="blog.autor">
                                </div>
                            </div>
                        </div>

                      <button type="submit" class="btn btn-success"> Grabar Cambios </button>
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
    name:"editar-blog",
    data(){
        return {
            blog:{
            titulo     : "",
            contenido  : "",
            resumen    : "",
            autor      : ""
            }
        }
    },
    mounted(){
       this.created();
    },
     methods:{
       created(){
            this.axios.get(`http://localhost:8000/api/blog/${this.$route.params.id}`)
              .then(response => {
               const {titulo,contenido,resumen,autor} = response.data
               this.blog.titulo = titulo,
               this.blog.contenido = contenido,
               this.blog.resumen = resumen,
               this.blog.autor = autor
             }).catch((err) => console.log(err));
        },
      update(){
            this.axios.put(`http://localhost:8000/api/blog/${this.$route.params.id}`,this.blog)
            .then((res) => this.$router.push({name:'blogs'}))
            .catch((err) => console.log(err));
      }
   }
}
</script>
