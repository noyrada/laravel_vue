<template>
    <div class="bg-gray-50 border px-14 py-3 w-[90%] m-auto shadow-gray-50 rounded-md">
    <h2 class="text-2xl font-medium mb-4">Form Teacher</h2>
    <form @submit.prevent="updateTeacher"  >
        <div class="mb-2">
            <label  class="block text-gray-700 font-medium mb-2">Username</label>
            <input type="text" v-model="teachers.name"
                class="border  p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" placeholder="Username" required>
        </div> 
        <div class="-mx-3 flex flex-wrap">
            <div class="w-full px-3 sm:w-1/2">    
                <div class="mb-2">
                    <label class="block text-gray-700 font-medium mb-2">Gender</label>
                    <select v-model="teachers.gender"
                        class="border  p-2 w-full rounded-lg focus:outline-none focus:border-blue-400 "  required>
                        <option value="">Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>
       
            <div class="w-full px-3 sm:w-1/2">
                <div class="">
                    <label class="block text-gray-700 font-medium mb-2">Subject</label>
                    <select  multiple v-model="teachers.subject"
                        class="border p-2 w-full rounded-lg focus:outline-none focus:border-blue-400 "  >
                        <option v-for="subject in subjects" :value="subject.id">
                            {{subject.name}}
                        </option>                      
                    </select>
                </div> 
            </div> 
    </div>
        <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-2">
                        <label  class="block text-gray-700 font-medium mb-2">Phone</label>
                        <input type="number" v-model="teachers.phone"
                        class="border  p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" placeholder="Phone" required>
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-2">
                        <label  class="block text-gray-700 font-medium mb-2">Salary</label>
                        <input type="number" v-model="teachers.salary"
                        class="border  p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" placeholder="Salary" required>
                    </div>
                </div>
            </div>
        <div class="mb-4">
            <label  class="block text-gray-700 font-medium mb-2">Address</label>
            <textarea type="text" v-model="teachers.address"
                class="border  p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" placeholder="Address" required>
            </textarea>
        </div>
            
        <div>
            <button type="submit" class="bg-gray-400 text-gray-200 px-4 py-2 rounded-lg hover:bg-gray-500">Create</button>
        </div>
    </form>
</div>

</template>

<script>
import axios from 'axios'

    export default{

        data(){
            return{
                teachers:{
                    'name': '',
                    'gender':'',
                    'phone':'',
                    'salary':'',
                    'address':'',
                    'subject':[]                
                },
                subjects:[]
                
            }
        },
        mounted()
        {
            this.getSubject()
            this.getTeacher()
        },
        methods: {
            getTeacher(){
                axios
                    .get(`/api/teachers/${this.$route.params.id}`)
                    .then((res)=>{              
                        this.teachers = res.data
                        this.teachers.subject = res.data?.subject
                    })
                    .catch(error=>console.log(error))
                    .finally(()=>this.loading= false)
            },
           
            getSubject(){
                axios
                .get(`/api/subjects`)
                .then((res)=>{
                    console.log(res.data)
                    this.subjects =  res.data
                })
                .catch(error=>console.log(error))
                .finally(()=>this.loading= false)
            },

            updateTeacher(){
                axios
                    .put(`/api/teachers/${this.$route.params.id}`,this.teachers)
                    .then((res)=>{
                        this.$router.push({name:'teachers'})
                      })
                    .catch(error =>console.log(error))
                    .finally(()=>this.loading=false)
            },
        },
    }
    
</script>