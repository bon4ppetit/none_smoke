<script setup>
  import {ref} from "vue";
  import Image from "@/Components/Image.vue";
  import InputError from "@/Components/InputError.vue";

  let inputData = ref('');
  let wishVape = 0;
  let errorValidateForm = ref([0, 'message']);

  function sendForm() {
    axios.post(route('api.diary.add'), {
        text: inputData.value,
        wish_vape: wishVape
      })
      .then((res) => {
        if (res.data.code === "ERR_BAD_REQUEST_NUM_WISH_VAPE")
          errorValidateForm.value = [1, res.data.message];
        else {
          window.location.reload();
        }
      })
      .catch((res) => {
        if (res.code === "ERR_BAD_REQUEST")
          errorValidateForm.value = [2, 'Вы не заполнили последнее поле, пожалуйста, расскажите в кратце как прошли ваши недавно пережитые дни относительно самочувствия'];
      })
  }

  function setWishVape(num)
  {
    let wishVapeBlock = document.getElementById('wish_vape_' + num);
    let arrWishVapeBlock = document.getElementsByClassName('wish_vape_block_active');

    for (let item of arrWishVapeBlock) {
      item.classList.remove('wish_vape_block_active')
    }


    wishVapeBlock.classList.add('wish_vape_block_active')
    wishVape = num;
  }
</script>

<template>
  <div class="p-7">
    <div class="text-white">
      <div class="flex items-center mb-4">
        <h3 class="text-2xl font-bold mr-2">Время для отметки</h3>
        <Image class="w-[32px]" path="storage/content_page/clock_for_mark.png"></Image>
      </div>
      <p class="style_on_screen-550">
        Отметьте ваши впечатления о последних днях в борьбе с зависимостью
      </p>
    </div>
    <div class="style_on_screen-550 p-5 text-white">
      <p>
        Оцените, на сколько хорошо прошли последние дни
      </p>
      <p class="text-xs text-gray-400">
        В начале шкалы, вам было очень трудно сдержаться
      </p>
      <p class="text-xs text-gray-400">
        В конце шкалы, вас совсем не тревожила мысль о курении
      </p>
      <div class="style_on_screen-550-child mt-4 pl-5 text-sm w-full">
        <div @click="setWishVape(1)" id="wish_vape_1" class="wish_vape_block_style">
          У меня не получилось сдержаться
        </div>
        <div @click="setWishVape(2)" id="wish_vape_2" class="wish_vape_block_style">
          Было тяжело и мучительно, но я сдержался
        </div>
        <div @click="setWishVape(3)" id="wish_vape_3" class="wish_vape_block_style">
          Я сдержался, но много думал об этом
        </div>
        <div @click="setWishVape(4)" id="wish_vape_4" class="wish_vape_block_style">
          Было пару мыслей
        </div>
        <div @click="setWishVape(5)" id="wish_vape_5" class="wish_vape_block_style">
          Сдержался на легке, ни мыли о курении
        </div>
        <InputError v-if="errorValidateForm[0] === 1" :message="errorValidateForm[1]"></InputError>
      </div>
    </div>
    <div class="p-5 text-white w-full">
      <p class="mb-3 style_on_screen-550">
        Расскажите немного о своих пережитых днях
      </p>
      <input type="text" v-model="inputData" class="text-sm bg-gray-900 text-white border-0 rounded w-full">
      <InputError v-if="errorValidateForm[0] === 2" :message="errorValidateForm[1]"></InputError>
    </div>
    <div class="mt-2 flex justify-end w-full">
      <button @click="sendForm" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Добавить отметку
      </button>
    </div>
  </div>
</template>

<style scoped>
.wish_vape_block_style {
  display: block;
  padding: .75rem 1.25rem;
  transition: all .3s;
  position: relative;
  overflow: hidden;
  z-index: 1;
  border: 2px solid #4b5563;
  border-radius: 7px;
  cursor: pointer;
  margin-bottom: 10px;
}
.wish_vape_block_style:last-child {
  margin-bottom: 0;
}
.wish_vape_block_style:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: $color;
    z-index: -2;
  }
.wish_vape_block_style:before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 100%;
    background-color: rgba(97, 55, 171, 0.38);
    transition: all 1s;
    z-index: -1;
  }
.wish_vape_block_style:hover {
    color: #fff;}
.wish_vape_block_style:hover:before {
      width: 100%;
    }
.wish_vape_block_active {
  background-color: rgba(97, 55, 171, 0.38);
}

@media (max-width: 550px) {
  .style_on_screen-550 {
    padding: 0;
    font-size: 14px;
    margin-bottom: 10px;
  }
  .style_on_screen-550-child {
    padding: 0;
    margin-bottom: 10px;
  }
}


</style>