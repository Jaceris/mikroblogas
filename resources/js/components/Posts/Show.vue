<template> 
  <div class="max-w-7xl relative overflow-hidden bg-white py-16">
    <div class="relative px-4 sm:px-6 lg:px-8">
      <div class="mx-auto max-w-prose text-lg">
        <h1>
          <span class="mt-2 block text-center text-3xl font-bold leading-8 tracking-tight text-gray-900 sm:text-4xl">{{ post.title }}</span>
        </h1>
      </div>
      <div class="prose prose-lg prose-indigo mx-auto mt-6 text-gray-500">
        <p>{{ post.content }}</p>
      </div>
    </div>
    <div class="relative px-4 sm:px-6 lg:px-8">
      <div class="mx-auto max-w-prose text-lg">
        <h4>
          <span class="mt-8 block text-center text-2xl font-bold leading-8 tracking-tight text-gray-900 sm:text-2xl">Comments</span>
        </h4>
      </div>
      <div v-for="(comment, index) in post.comments" :key="index" class="prose prose-lg prose-indigo mx-auto mt-6 text-gray-500">
        <p class="text-sm text-gray-900">
            <span>
                <time :datetime="comment.datetime" class="mr-1">{{ comment.created_at }}</time> 
                {{ comment.user_name }}
            </span>
          </p>
        <p>{{ comment.content }}</p>
      </div>
    </div>
    <div class="relative px-4 mt-16 sm:px-6 lg:px-8">
      <form @submit.prevent="storeComment(comment)">
        <!-- Content -->
        <div class="mt-4">
          <textarea v-model="comment.content" id="content" name="content" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            <div class="text-red-600 mt-1">
              <div v-for="(message, index) in validationErrors?.content" :key="index" >
                {{ message }}
              </div>
            </div>
        </div>
        
        <!-- Buttons -->
        <div class="mt-4">
          <button :disabled="isLoading" class="inline-flex items-center px-3 py-2 bg-blue-600 text-white rounded disabled:opacity-75 disabled:cursor-not-allowed">
            <div v-show="isLoading" class="inline-block animate-spin w-4 h-4 mr-2 border-t-2 border-t-white border-r-2 border-r-white border-b-2 border-b-white border-l-2 border-l-blue-600 rounded-full"></div>
              <span v-if="isLoading">Processing...</span>
              <span v-else>Comment</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>

import {reactive, onMounted } from "vue";
import usePosts from "../../composables/posts";
import useComments from "../../composables/comments";
import { useRoute } from "vue-router";
       
const { post, getPost } = usePosts()

const { storeComment, validationErrors, isLoading } = useComments()

const route = useRoute()

const comment = reactive({
    content: '',
    user_id: 1,
    post_id: route.params.id,
})

onMounted(() => {
    getPost(route.params.id)
})
   
</script>
