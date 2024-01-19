<template>
    <div class="py-6  my-4 w-[30%]">
    <h2 class="text-2xl font-medium mb-4">Edit Subject</h2>
    <form @submit.prevent="editSubject">
        <div class="mb-4">
            <label  class="block text-gray-700 font-medium mb-2">Old Name</label>
            <input type="text" v-model="subjects.name"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" placeholder="Enter..." required>
        </div>      
        <div>
            <button type="submit" class="bg-gray-400 text-gray-200 px-4 py-2 rounded-lg hover:bg-gray-500">Edit</button>
        </div>
    </form>
</div>
</template>
<script>
    export default{
        data(){
            return{
                subjects:{
                    'name': '',
                },    
                subjects:[]          
            }
        },
        mounted()
        {
            this.getSubject()
        },
        methods:{

            getSubject(){
              this.axios
                    .get(`/api/subjects/${this.$route.params.id}`)
                    .then((res) =>{
                      this.subjects = res.data
                    })
                    .catch(error=>console.log(error))
                    .finally(()=>this.loading = false)
            },

            editSubject(){
                axios
                    .put(`/api/subjects/${this.$route.params.id}`,this.subjects)
                    .then((res)=>{
                        this.$router.push({name:'subjects'})
                    })
                    .catch(error =>console.log(error))
                    .finally(()=>this.loading=false)
            },
        },
    }
    
</script>