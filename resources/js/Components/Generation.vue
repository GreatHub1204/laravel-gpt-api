<script setup>
import { ref, computed, reactive } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import FormSection from '@/Components/FormSection.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import axios from 'axios';
import SpeechKit  from '@mastashake08/speech-kit'
const form = useForm({
    prompt: '',
    type: 'image',
    processing: false,
    resultText: '',
    imageUrl: '',
    messages: [],
    speech: false,
    rate: 0.85
});
async function shareImage(url) {
  const response = await fetch(url);
  const blob = await response.blob();
  const filesArray = [
    new File(
      [blob],
      new Date().getTime() + '.jpg',
      {
        type: "image/png",
        lastModified: new Date().getTime()
      }
   )
  ];
  const shareData = {
    files: filesArray,
  };
  navigator.share(shareData);
}
const submit = () => {
  // axios.defaults.withCredentials = true;
  let data = {}
  if (form.type == 'image') {
    data = {prompt:form.prompt, type: form.type}
  } else if (form.type == 'chat'){
    if (form.messages.length == 0) {
      form.messages.push(
        {"role": "system", "content": form.system_role}
      )
    }

    form.messages.push(
      {"role": "user", "content": form.prompt}
    )
    data = {
      max_tokens: 1000,
      model: 'gpt-3.5-turbo',
      messages: form.messages,
      type: form.type}
  } else {
    data = {prompt:form.prompt, type: form.type, model: 'text-davinci-001', max_tokens: 1000, temperature: 0.9}
  }
  form.processing = true
  form.reset('imageUrl')
  form.reset('resultText')
   axios.post('/api/generate-result', data)
   .then(res => {
     form.processing = false
     if (form.type === 'image') {
       form.imageUrl = res.data.data.data.data[0].url
     } else if (form.type == 'chat') {
       form.resultText = res.data.data.data.choices[0].message.content
       form.messages.push(
         {"role": "assistant", "content": form.resultText}
       )

     } else {
       form.resultText = res.data.data.data.choices[0].text

     }

     if (form.speech == true) {
       const sk = new SpeechKit({rate: form.rate})
       sk.speak(form.resultText)
     }

     form.reset('prompt')
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
        <h3 class="text-gray-500">Generation Form</h3>
      </template>
      <template #description>
        <p>
          This is the generic 0R1KUL generation form. Simply let the system know the folowing:
          <ul>
            <li> Text or image generation </li>
            <li> Prompt </li>
            <li> Chat </li>
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
            <option value="chat">Chat</option>
          </select>
          <input type="checkbox" v-model="form.speech" v-checked="form.speech">
          <label for="speech">TTS Enabled</label><br>
          
            <input type="range" min="0" max="1" step="0.01" v-model="form.rate" name="rate">
            <label for="rate">Speech Rate</label>

        </div>
        <SectionBorder />
        <div v-if="form.type == 'chat'">
            <InputLabel for="role" value="What is my role?" />
            <TextInput
                id="prompt"
                v-model="form.system_role"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
            />
        </div>
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
        </div>
      </template>
    </FormSection>
    <p v-show="form.resultText !== ''" class="mt-6 text-gray-500 leading-relaxed">
      {{form.resultText}}
    </p>
    <img loading="lazy" v-show="form.imageUrl !== ''" :src="form.imageUrl" class="object-contain h-96 w-96 rounded"/>
    <!-- <PrimaryButton @click="shareImage(form.imageUrl)" v-show="form.imageUrl !== ''">
      Share Image
    </PrimaryButton> -->
  </div>
</template>
