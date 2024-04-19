<template>
    <div class="py-6  my-4 w-[50%]">
    <h2 class="text-2xl font-medium mb-4">Update Students</h2>
    <form @submit.prevent="updateStudent">
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
                        <select v-model="students.classroom"
                            class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400 "  >
                            <option value="">select class</option>
                            <option v-for="classroom in classrooms" :key="classroom.id" :value="classroom.id">
                                {{classroom.name}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="date" class="mb-3 block text-base font-medium text-gray-700">
                            Time
                        </label>
                        <select v-model="students.classroom"
                            class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400 "  >
                            <option value="">select Time</option>
                            <option v-for="classroom in classrooms" :key="classroom.id" :value="classroom.id">
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

        <!-- <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="date"  class="mb-3 block text-base font-medium text-gray-700">
                            Create Date
                        </label>
                        <input type="date" v-model="students.created_at"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="date" class="mb-3 block text-base font-medium text-gray-700">
                            Update Date
                        </label>
                        <input type="date" v-model="students.updated_at"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>
        </div> -->
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
                    gender:' ',
                    address:'',
                    classroom:'',
                },
                classrooms:[],
               
            }
        },
        mounted(){
            this.getStudent()
            this.getClassroom()
        },
       
        methods: {
            getStudent(){
            this.axios
                .get(`/api/students/${this.$route.params.id}`)
                .then((res)=>{
                    this.students = res.datav
                })
                .catch(error=>console.log(error))
                .finally(()=>this.loading= false)
            },

            getClassroom(){
                this.axios
                    .get(`/api/classrooms/${this.$route.params.id}`)
                     .then(res =>{
                        this.classrooms =  res.data
                    })
                    .catch(error =>console.log(error))
                    .finally(()=>this.loading= false)
            },
            updateStudent(){
                this.axios
                      .put(`/api/students/${this.$route.params.id}`,this.students)
                      .then((res)=>{
                        this.students= res.data,
                        this.$router.push({name: 'students'})
                      })
                      .catch(error =>console.log(error))
                      .finally(()=>this.loading=false)
            }
        },
    }
</script>