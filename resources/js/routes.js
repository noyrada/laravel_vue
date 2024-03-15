import Home from './Views/Home.vue';
import ListStudent from './Views/students/ListStudent.vue';
import About from './Views/About.vue';
import Contact from './Views/Contact.vue';
import CreateStudent from './Views/students/CreateStudent.vue';
import ListClass from './Views/Classrooms/ListClass.vue';
import CreateClass from './Views/Classrooms/CreateClass.vue';
import EditClass from './Views/Classrooms/EditClass.vue';
import EditStudent from './Views/students/EditStudent.vue';
import ShowStudent from './Views/students/ShowStudent.vue';
import ShowClass from './Views/Classrooms/ShowClass.vue';
import ListSubject from './Views/Subjects/ListSubject.vue';
import CreateSubject from './Views/Subjects/CreateSubject.vue';
import EditSubject from './Views/Subjects/EditSubject.vue';
import ShowSubject from './Views/Subjects/ShowSubject.vue';
import ListTeacher from './Views/Teachers/ListTeacher.vue';
import CreateTeacher from './Views/Teachers/CreateTeacher.vue';
import ShowTeacher from './Views/Teachers/ShowTeacher.vue';
import EditTeacher from './Views/Teachers/EditTeacher.vue';

export const routes = [

    { path: '/', name: 'home', component: Home },
    { path: '/about', name: 'about', component: About },
    { path: '/contact', name: 'contact', component: Contact },
    //student
    { path: '/students', name: 'students', component: ListStudent },
    { path: '/create/student', name: 'createStudent', component: CreateStudent },
    { path: '/edit/student/:id', name: 'editstudent', component: EditStudent },
    { path: '/view/student/:id', name: 'viewstudent', component: ShowStudent },
    //Class
    { path: '/classroom', name: 'classroom', component: ListClass },
    { path: '/create/class', name: 'createclass', component: CreateClass },
    { path: '/edit/class/:id', name: 'editclass', component: EditClass },
    { path: '/show/class/:id', name: 'showclass', component: ShowClass },
    //Teacher
    { path: '/teachers', name: 'teachers', component: ListTeacher },
    { path: '/teachers/create', name: 'createTeacher', component: CreateTeacher },
    { path: '/teachers/show/:id', name: 'teachers.Show', component: ShowTeacher },
    { path: '/teachers/edit/:id', name: 'teachers.edit', component: EditTeacher},

    //Subject
    { path: '/subjects', name: 'subjects', component: ListSubject },
    { path: '/subjects/create', name: 'subjectsCreate', component: CreateSubject },
    { path: '/subjects/show/:id', name: 'subject.Show', component: ShowSubject },
    { path: '/subjects/edit/:id', name: 'subjects.edit', component: EditSubject },

];