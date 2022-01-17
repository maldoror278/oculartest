<template>
   <main>
      <div class="container">
       <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">Crear Nuevo blog</div>
                <div class="card-body">
                    <form @submit.prevent="crear">

                        <div class="row">
                            <div class="col-12 mb-2 ">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" v-model="blog.titulo">
                                    <div class="alert alert-danger" v-if="errors && errors.titulo">
                                      {{ errors.titulo[0] }}
                                    </div>
                              </div>
                            </div>
                        </div>

                      <div class="row">
                            <div class="col-12 mb-2 ">
                                <div class="form-group">
                                    <label>Resume</label>
                                    <input type="text" class="form-control" v-model="blog.resumen">
                                    <div class="alert alert-danger" v-if="errors && errors.resumen">
                                      {{ errors.resumen[0] }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-2 ">
                                <div class="form-floating">
                                <textarea class="form-control" style="height: 100px" v-model="blog.contenido"></textarea>
                                    <div class="alert alert-danger" v-if="errors && errors.contenido">
                                      {{ errors.contenido[0] }}
                                    </div>
                             </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-2 ">
                                <div class="form-group">
                                    <label>Autor</label>
                                    <input type="text" class="form-control" v-model="blog.autor">
                                    <div class="alert alert-danger" v-if="errors && errors.autor">
                                      {{ errors.autor[0] }}
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
    name:"crear-blog",
    data(){
        return {
            blog:{},
            errors:{}
        }
    },
    methods:{
       crear(){
            this.axios.post('http://localhost:8000/api/blog',this.blog)
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
