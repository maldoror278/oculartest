<template>
  <main>
   <router-link to="/nuevoBlog" class="btn btn-success">Nuevo</router-link>
    <div class="col-12">
    <table class="table table-striped">
      <thead>
        <tr>
         <th scope="col"> Id</th>
         <th scope="col"> Titulo</th>
         <th scope="col"> Resumen</th>
         <th scope="col"> Contenido</th>
         <th scope="col"> Autor</th>
         <th scope="col"> Creación</th>
        </tr>
      </thead>
      <tbody>
          <tr v-for=" blog in blogs.data" :key="blog.id">
             <td>{{ blog.id }}</td>
             <td>{{ blog.titulo }}</td>
             <td>{{ blog.resumen }}</td>
             <td col-4>{{ blog.contenido }}</td>
             <td>{{ blog.autor }}</td>
             <td>{{ blog.created_at }}</td>
           <td>
             <router-link :to="{name: 'editarBlog', params: {id: blog.id}}" class="btn btn-success"> Edit </router-link>
             <button @click="borrarBlog(blog.id)" class="btn btn-danger">Eliminar</button>
             <button @click="showAlert(blog)" class="btn btn-info">Detalle</button>
           </td>
          </tr>
      </tbody>
    </table>
    <pagination :data="blogs" @pagination-change-page="created"></pagination>
  </div>
</main>
</template>

<script>
export default {
    name:"blogs",
    data(){
        return{
           blogs : {}
        }
    },
    mounted(){
       this.created();
    },
    methods:{
      created(page = 1){
        this.axios.get('http://localhost:8000/api/blog?page=' + page)
        .then(response => {
            this.blogs = response.data;
             console.log(response);
            }).catch((err) => console.log(err));
        },
        borrarBlog(id){
           if(this.$swal('¿Esta usted seguro de realizar esta acción?')){
               this.axios.delete(`http://localhost:8000/api/blog/${id}`)
               .then(
                   response =>{
                      this.created();
                   }).catch(error =>{console.log(error);
              })
           }
        },
        showAlert(blog) {
          this.$swal(
              `
                Datos de Publicación
                Titulo    : ${blog.titulo}
                Contenido : ${blog.contenido}
                Resumen   : ${blog.resumen}
                Autor     : ${blog.autor}
                Creación  : ${blog.created_at}
              `
              );
        }
    }
}
</script>
