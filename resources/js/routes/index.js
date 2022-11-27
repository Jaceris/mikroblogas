import { createRouter, createWebHistory } from 'vue-router';
import PostsIndex from '../components/Posts/Index.vue'
import PostsCreate from '../components/Posts/Create.vue'
import PostsEdit from '../components/Posts/Edit.vue'
import PostsShow from '../components/Posts/Show.vue'

const routes = [
    { 
        path: '/', 
        name: 'posts.index',
        component: PostsIndex,
        meta: { title: 'Posts' },
    },
    { 
        path: '/posts/create', 
        name: 'posts.create',
        component: PostsCreate,
        meta: { title: 'Create new post' },
    },
    {
        path: '/posts/edit/:id',
        name: 'posts.edit',
        component: PostsEdit,
        meta: { title: 'Edit post' }
    },
    {
        path: '/posts/:id',
        name: 'posts.show',
        component: PostsShow,
        meta: { title: 'Show post' }
    },
]
export default createRouter({
    history: createWebHistory(),
    routes
})
