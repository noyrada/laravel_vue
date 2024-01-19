<template>
    <div class="bg-gray-50 px-10 py-2  m-auto w-[80%] rounded-md">
    <h2 class="text-2xl font-medium mb-4">New Classroom</h2>
    <form @submit.classrooms.prevent="addClass">
        
        <div class="mb-3">
            <label  class="block text-gray-700 font-medium mb-2">Classroom</label>
            <input type="text" v-model="classrooms.name"
            class="border border-gray-400 p-2 w-full rounded-md focus:outline-none focus:border-blue-400" placeholder="Name" required>   
        </div>

        <div class="mb-3">
            <label  class="block text-gray-700 font-medium mb-2">Time</label>
            <input type="text" v-model="classrooms.time"
            class="border p-2 w-full rounded-md focus:outline-none focus:border-blue-400" placeholder="Time" required>      
        </div>   
    <div class="flex flex-wrap -m-2">
        <div class="p-2 w-1/2">
          <div class="relative">
            <label class="block text-gray-700 font-medium mb-2">Subject</label>
            <div class="mb-3">
            <select  v-model="classrooms.subject1"
            @change="changeHandle"
                class="border p-2 w-full rounded-md focus:outline-none focus:border-blue-400 "  >
                <option value="0">select subject</option>
                <option v-for="subject in subjects" :value="subject.id">
                    {{subject.name}}
                </option>                      
            </select>
            </div> 
            <div class="mb-3">
            <select   v-model="classrooms.subject2"
            @change="changeHandle1"
                class="border p-2 w-full rounded-md focus:outline-none focus:border-blue-400 "  >
                <option value="0">select subject</option>
                <option v-for="subject in subjects" :value="subject.id">
                    {{subject.name}}
                </option>                      
            </select>
            </div>
            <div class="mb-3">
            <select   v-model="classrooms.subject3"
            @change="changeHandle2"
                class="border p-2 w-full rounded-md focus:outline-none focus:border-blue-400 "  >
                <option value="0">select subject</option>
                <option v-for="subject in subjects" :value="subject.id">
                    {{subject.name}}
                </option>                      
            </select>
        </div>
        </div>
        </div>
        <!-- Teacher -->
        <div class="p-2 w-1/2">
          <div class="relative">
            <label class="block text-gray-700 font-medium mb-2">Teacher</label>
        <div class="mb-3">
            <select   v-model="classrooms.teacher1"
                class="border p-2 w-full rounded-md focus:outline-none focus:border-blue-400 "  >
                <option value="0">select teachers</option>
                <option v-for="teacher in teacher1" :value="teacher.id">
                    {{teacher.name}}
                </option>                      
            </select>
        </div>
        <div class="mb-3">
            <select  v-model="classrooms.teacher2"
                class="border p-2 w-full rounded-md focus:outline-none focus:border-blue-400 "  >
                <option value="0">select teachers</option>
                <option v-for="teacher in teacher2" :value="teacher.id">
                    {{teacher.name}}
                </option>                      
            </select>
        </div>
        <div class="mb-3">
            <select   v-model="classrooms.teacher3"
                class="border p-2 w-full rounded-md focus:outline-none focus:border-blue-400 "  >
                <option value="0">select teachers</option>
                <option v-for="teacher in teacher3" :value="teacher.id">
                    {{teacher.name}}
                </option>                       
            </select>
        </div>
          </div>
        </div>
        </div>

        <div class="my-5">
            <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                Save
            </button>
        </div>
    </form>
</div>
</template>

<script>
export default {
        data() {
            return {
                classrooms:{
                    'name':'',
                    'time':'',
                    'subject1':'',
                    'subject2':'',
                    'subject3':' '
                },
                subjects:[],
                teachers:[],
                teacher1:[],
                teacher2:[],
                teacher3:[]
            }
        },    
        mounted(){
            this.getSubject()
            this.getTeacher()
        },  
        methods: {
            getTeacher(){
                axios
                    .get(`/api/teachers`)
                    .then((res)=> {
                        console.log(res.data)
                        this.teachers = res.data
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

            changeHandle(){
                axios
                    .get(`/api/classrooms/${this.classrooms.subject1}/teachers`)
                    .then((res)=>
                    {
                        this.teacher1 = res.data
                    })
                    .catch(error=>console.log(error))
                    .finally(()=>this.loading= false)

            },
            changeHandle1(){
                axios
                    .get(`/api/classrooms/${this.classrooms.subject2}/teachers`)
                    .then((res)=>
                    {
                        this.teacher2 = res.data
                    })
                    .catch(error=>console.log(error))
                    .finally(()=>this.loading= false)
            },
            changeHandle2(){
                axios
                    .get(`/api/classrooms/${this.classrooms.subject3}/teachers`)
                    .then((res)=>
                    {
                        this.teacher3 = res.data
                    })
                    .catch(error=>console.log(error))
                    .finally(()=>this.loading= false)
            },

            addClass() {
                this.axios
                    .post('/api/classrooms', this.classrooms)
                    .then(response => (
                        this.classrooms = response.data,
                        this.$router.push({ name: 'classroom' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }

</script>