<template>
  <div class="bg-white px-4 sm:px-6 lg:px-8">
    <div class="relative mx-auto max-w-lg divide-y-2 divide-gray-200 lg:max-w-7xl">
      <div class="mt-6 grid gap-16 pt-4 lg:grid-cols-2 lg:gap-x-5 lg:gap-y-4">
        <div v-for="post in posts" :key="post.id">
          <p class="text-sm text-gray-500">
            <span>
                <time :datetime="post.datetime" class="mr-2">{{ post.created_at }}</time> 
                <a class="gap-px">{{ post.user_full_name }}</a>
            </span>
          </p>
          <a href="#" class="mt-2 block">
            <p class="text-xl font-semibold text-gray-900">{{ post.title }}</p>
            <p class="mt-3 text-base text-gray-500">{{ post.content }}</p>
          </a>
          <div class="mt-3">
            <a href="#" class="text-base font-semibold text-indigo-600 hover:text-indigo-500">Read more...</a>
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
