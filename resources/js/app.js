require('./bootstrap');

window.Vue = require('vue');

require('./API')

import App from './components/App.vue';

import router from './router.js';
//import store from './store';
import i18n from './lang/i18n'

//Import Froala Editor 
import 'froala-editor/js/plugins.pkgd.min.js';
//Import third party plugins
import 'froala-editor/js/third_party/embedly.min';
import 'froala-editor/js/third_party/font_awesome.min';
import 'froala-editor/js/third_party/spell_checker.min';
import 'froala-editor/js/third_party/image_tui.min';
// Import Froala Editor css files.
import 'froala-editor/css/froala_editor.pkgd.min.css';

// Import and use Vue Froala lib.
import VueFroala from 'vue-froala-wysiwyg';
import 'ant-design-vue/dist/antd.css';

Vue.use(VueFroala)


import {
    Table, 
    Upload, 
    Modal, 
    Icon, 
    message,
    notification, 
    Input,
    Form,
    Switch,
    Checkbox,
    Pagination,
    Popconfirm,
    Dropdown,
    Menu,
    InputNumber} from 'ant-design-vue';

Vue.use(Table);
Vue.use(Upload);
Vue.use(Modal);
Vue.use(Icon);
Vue.use(Checkbox);
Vue.use(Switch);
Vue.use(message);
Vue.use(notification);
Vue.use(Input);
Vue.use(Dropdown);
Vue.use(Menu);
Vue.use(Popconfirm);
Vue.use(Form);
Vue.use(Pagination);
Vue.use(InputNumber);

Vue.prototype.$message = message;
Vue.prototype.$notification = notification;


const app = new Vue({
    el: '#app',
    data: { loading: false },
    // store,
    i18n,
    router,
    render: renderComponent => renderComponent(App)
});
