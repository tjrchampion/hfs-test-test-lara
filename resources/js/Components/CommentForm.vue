<template>
  <form v-on:submit.prevent="submitComment" class="mt-5">
    <div class="border-2 mt-5 border-gray-300 rounded-md p-3 bg-gray-100">
      <h2 class="text-2xl font-extrabold dark:text-black">Add a comment</h2>
      <div class="mb-2 mb-2">
        <InputLabel for="postBody" value="What would you like to say?" />
        <textarea 
          id="commentBody"
          class="border w-full mt-3 rounded-md shadow px-3 py-2 inline-flex items-center text-base leading-6 font-small bg-white text-dark-blue-800 hover:text-gray-700 transition duration-150 ease-in-out" 
          rows="5"
          v-model="form.body"
          placeholder="Leave a kind and considerate comment..."
        ></textarea>
        <div v-if="form.errors.body" class="text-red-500">{{ form.errors.body }}</div>  

        <button type="submit" class="mt-8 border border-transparent rounded-md shadow px-3 py-2 inline-flex items-center text-base leading-6 font-small bg-white text-dark-blue-800 hover:text-gray-700 transition duration-150 ease-in-out">
          Post comment
        </button>

      </div>
    </div>
  </form>
</template>

<script setup>
  import { useForm } from '@inertiajs/vue3';
  import InputLabel from '@/Components/InputLabel.vue';

  const props = defineProps({
    postId: {
      type: Number,
      required: true,
    }
  })
  const form  = useForm({
    body: '',
    post_id: props.postId
  });

  const submitComment = () => {
    form.post(route('comment.store'), {
      preserveScroll: true,
      onSuccess: () => {
        form.reset();
      }
    });
  }
</script>