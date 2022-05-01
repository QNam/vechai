<template>
<div class="languageSelect">
    <p><label for="">{{ $t('language') }}:</label></p>
    <select v-model="$i18n.locale">
        <option v-for="(lang,index) in languages" :key="index" :value="lang.value" >{{ lang.text }}</option>
    </select>
</div>
</template>

<script>
    export default {
        name: "LanguageChange",
        data: () => ({
          languages: 
          [
            {
              text: 'Vietnamese',
              value: 'vn'
            },
            {
              text: 'English',
              value: 'en'
            }
          ],
        }),
    }
</script>

<style scoped>
.languageSelect select{
  background: transparent;
  padding: 3px 10px;
  border: 1px solid #FFF;
  color: #fff;
}

.languageSelect p{
  margin: 0;
}
.languageSelect label{
  color: #fff;
  text-transform: capitalize;
  margin-bottom: 10px;
}
</style>
