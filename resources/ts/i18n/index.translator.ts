import { createI18n } from 'vue-i18n'
import main from './en/main.json'

const i18n = createI18n({
    locale: 'en',
    messages: {
        en: {
            main
        }
    }
})

export default i18n