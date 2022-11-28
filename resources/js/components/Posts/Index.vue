<template>
  <div class="bg-white px-4 sm:px-6 lg:px-8">
    <div class="relative mx-auto max-w-lg divide-y-2 divide-gray-200 lg:max-w-7xl">
      <div class="mt-6 grid gap-16 pt-4 lg:grid-cols-2 lg:gap-x-5 lg:gap-y-4">
        <div v-for="post in posts" :key="post.id" class="mb-4">
          <p class="text-sm text-gray-500">
            <span>
                <time :datetime="post.datetime" class="mr-1">{{ post.created_at }}</time> 
                {{ post.user_name }}
                <router-link 
                  :to="{ name: 'posts.edit', params: { id: post.id } }" 
                  class="mr-1 font-semibold text-indigo-600 hover:text-indigo-500">
                  Edit
                </router-link>
            </span>
          </p>
          <router-link 
              :to="{ name: 'posts.show', params: { id: post.id } }" 
              class="mt-2 block text-xl font-semibold text-gray-900 hover:text-gray-500">
              {{ post.title }}
          </router-link>
          <p class="mt-3 text-base text-gray-500">{{ post.excerpt }}</p>
          <div class="mt-3">
            <router-link 
              :to="{ name: 'posts.show', params: { id: post.id } }" 
              class="mr-2 text-base font-semibold text-indigo-600 hover:text-indigo-500">
              Read more...
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import usePosts from '../../composables/posts'

const { posts, getPosts } = usePosts()

onMounted(() => {
  getPosts()
})

</script>
