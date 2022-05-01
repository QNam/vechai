import Vue from 'vue';
import Router from 'vue-router';

import Home from './components/Home/Index';
import NewsCreate from './components/News/NewsCreate';
import NewsIndex from './components/News/NewsIndex';
import NewsEdit from './components/News/NewsEdit';

Vue.use(Router);

export default new Router({
    routes: [
        { path: '/', name: 'Home', component: Home },
        // { path: '/setting', name: 'WebSetting', component: WebSetting },
        // { path: '/components', name: 'Components', component: Components },
        { path: '/news/create', name: 'NewsCreate', component: NewsCreate },
        { path: '/news', name: 'NewsIndex', component: NewsIndex },
        { path: '/news/edit/:id', name: 'NewsIndex', component: NewsEdit },
    ]
})
