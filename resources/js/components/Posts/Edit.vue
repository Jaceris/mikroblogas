<template>
    <form class="max-w-2xl" @submit.prevent="updatePost(post)">
        <!-- Title -->
        <div>
            <label for="title" class="block font-medium text-sm text-gray-700">
                Title
            </label>
            <input v-model="post.title" id="title" name="title" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <div class="text-red-600 mt-1">
                <div v-for="(message, index) in validationErrors?.title" :key="index" >
                    {{ message }}
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="mt-4">
            <label for="content" class="block font-medium text-sm text-gray-700">
                Content
            </label>
            <textarea v-model="post.content" id="content" name="content" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            <div class="text-red-600 mt-1">
                <div v-for="(message, index) in validationErrors?.content" :key="index" >
                    {{ message }}
                </div>
            </div>
        </div>

        <!-- Private -->
        <div class="mt-4">
            <label for="private" class="block font-medium text-sm text-gray-700">
                Private
            </label>
            <input v-model="post.private" id="private" name="private" type="checkbox" class="block mt-1 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
            <div class="text-red-600 mt-1">
                <div v-for="(message, index) in validationErrors?.private" :key="index" >
                    {{ message }}
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-4">
            <button :disabled="isLoading" class="inline-flex items-center px-3 py-2 bg-blue-600 text-white rounded disabled:opacity-75 disabled:cursor-not-allowed">
                <div v-show="isLoading" class="inline-block animate-spin w-4 h-4 mr-2 border-t-2 border-t-white border-r-2 border-r-white border-b-2 border-b-white border-l-2 border-l-blue-600 rounded-full"></div>
                <span v-if="isLoading">Processing...</span>
                <span v-else>Update</span>
            </button>
        </div>
    </form>
</template>

<script setup>

import {reactive, onMounted } from "vue";
import usePosts from "../../composables/posts";
import { useRoute } from "vue-router";
       
const { post, getPost, updatePost, validationErrors, isLoading } = usePosts()

const route = useRoute()

onMounted(() => {
    getPost(route.params.id)
})
     
</script>
