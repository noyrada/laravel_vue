<template>
    <div class="bg-gray-50 px-14 py-3 my-2 w-[70%] m-auto rounded-md">
    <h2 class="text-2xl font-medium mb-4">Form Students</h2>
    <form @submit.prevent="addStudent">
        <div class="mb-4">
            <label  class="block text-gray-700 font-medium mb-2">Name</label>
            <input type="text" v-model="students.name"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" placeholder="username" required>
        </div>      
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Gender</label>
            <select v-model="students.gender"
                class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400 "  required>
                <option value="">Select gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>      
        <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="date" class="mb-3 block text-base font-medium text-gray-700">
                            Class
                        </label> 
                        <select v-model="students.class" 
                            class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400 "  >
                            <option value="">select class</option>
                            <option v-for="classrooms in classroom" :key="classrooms.id" :value="classrooms.id">
                                {{classrooms.name}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="date" class="mb-3 block text-base font-medium text-gray-700">
                            Time
                        </label>
                        <select v-model="students.class"
                            class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400 "  >
                            <option value="">select Time</option>
                            <option v-for="classrooms in classroom" :key="classrooms.id" :value="classrooms.id">
                                {{classrooms.time}}
                            </option>
                           
                        </select>
                    </div>
                </div>
            </div>

        <div class="mb-4">
            <label  class="block text-gray-700 font-medium mb-2">Address</label>
            <input type="text" v-model="students.address"
            class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" placeholder="Address" required>
        </div>
        <div>
            <button type="submit" class="bg-gray-400 text-gray-200 px-4 py-2 rounded-lg hover:bg-gray-500">Create</button>
        </div>
    </form>
</div>

</template>

<script>
    export default{

        data(){
            return{
                students:{
                    name: '',
                    gender:'',
                    address:'',
                    class:''
                },
                
            }
        },
        mounted()
        {
            this.getStudent()
        },
        methods: {
           
            getStudent(){
                axios
                .get(`/api/students`)
                .then((res)=>{
                    console.log(res.data)
                    this.classroom =  res.data.data.classroom
                })
                .catch(error=>console.log(error))
                .finally(()=>this.loading= false)
            },


            addStudent(){
                axios
                    .post(`/api/students/${this.$route.params.id}`,this.students)
                    .then((res)=>{
                        console.log(res.data)
                        this.$router.push({name:'students'})
                      })
                    .catch(error =>console.log(error))
                    .finally(()=>this.loading=false)
            },
        },
    }
    
</script>