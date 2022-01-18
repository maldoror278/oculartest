<template>
  <main>
    <h2>Listado General de Blogs </h2>
   <div class="mb-2">
     <router-link to="/nuevoBlog" class="btn btn-success">Nuevo Blog</router-link>
     <router-link to="/miblog/admin/categoria" class="btn btn-success"> + categoria</router-link>
   </div>
    <div class="col-12">
    <table class="table table-striped">
      <thead>
        <tr>
         <th scope="col"> Id</th>
         <th scope="col"> Titulo</th>
         <th scope="col"> Resumen</th>
         <th scope="col"> Autor</th>
         <th scope="col"> Categoria </th>
        </tr>
      </thead>
      <tbody>
          <tr v-for=" blog in blogs.data" :key="blog.id">
             <td>{{ blog.id }}</td>
             <td>{{ blog.titulo }}</td>
             <td>{{ blog.resumen }}</td>
             <td>{{ blog.autor }}</td>
             <td>{{ blog.seccion }}</td>
             <td>
             <router-link :to="{name: 'editarBlog', params: {id: blog.id}}" class="btn btn-success"> Edit </router-link>
             <router-link :to="{name: 'detalle', params: {id: blog.id}}" class="btn btn-primary"> Publicaciones </router-link>
             <button @click="borrarBlog(blog.id)" class="btn btn-danger">Eliminar</button>
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
             console.log(this.blogs);
            }).catch((err) => console.log(err));
        },
        borrarBlog(id){
           if(confirm('¿Esta usted seguro de realizar esta acción?')){
               this.axios.delete(`http://localhost:8000/api/blog/${id}`)
               .then(
                   response =>{
                      this.created();
                   }).catch(error =>{console.log(error);
              })
           }
        },
        DetalleBlog(){
               this.$router.push({name:'detalle'})
        }
     }
}
</script>
