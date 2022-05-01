import Vue from 'vue';
import VueI18n from 'vue-i18n';
import vnMessage from './vi.js'
import enMessage from './en.js'

Vue.use(VueI18n);

const messages = {
    vn: vnMessage,
    en: enMessage,
}

const i18n = new VueI18n({
    locale: 'vn', // set locale
    messages,
    fallbackLocale: 'vn',
})

export default i18n;