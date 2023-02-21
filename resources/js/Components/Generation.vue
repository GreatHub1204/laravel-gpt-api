<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import FormSection from '@/Components/FormSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import axios from 'axios';

const form = useForm({
    prompt: '',
    type: 'image',
    imageUrl: '',
    processing: false
});
const submit = () => {
  // axios.defaults.withCredentials = true;
  form.processing = true
   axios.post('/api/generate-result', {prompt:form.prompt, type: form.type})
   .then(res => {
     form.processing = false
     form.imageUrl = res.data.data.data.data[0].url
   })
    // form.transform(data => ({
    //     ...data,
    // })).post('/api/generate-result', {
    //     onFinish: () => form.reset('prompt'),
    // });
};
</script>

<template>
  <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 ">
    <FormSection @submitted="submit">
      <template #title>
        <h3>Generation Form</h3>
      </template>
      <template #description>
        <p>
          This is the generic 0R1KUL generation form. Simply let the system know the folowing:
          <ul>
            <li> Text or image generation </li>
            <li> Prompt </li>
          </ul>
        </p>
      </template>
      <template #actions>
        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Submit
        </PrimaryButton>
      </template>
      <template #form>
        <div>
          <InputLabel for="type" value="Type" />
          <select id="type" v-model="form.type">
            <option value="image">Image</option>
            <option value="text">Text</option>
          </select>
        </div>
        <SectionBorder />
        <div>
            <InputLabel for="prompt" value="Prompt" />
            <TextInput
                id="prompt"
                v-model="form.prompt"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
            />
            <InputError class="mt-2" :message="form.errors.prompt" />
        </div>
      </template>
    </FormSection>
    <img loading="lazy" v-show="form.imageUrl !== ''" :src="form.imageUrl" class="object-contain h-96 w-96 rounded"/>
  </div>
</template>
