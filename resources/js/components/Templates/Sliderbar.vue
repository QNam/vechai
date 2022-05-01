<template>
    <div>
        <nav>
            <div class="sidebar-header">
                <h3>QNam Admin</h3>
            </div>

            <ul class="list-unstyled components">
                <!-- <p>Dummy Heading</p> -->
                <li><router-link to="/"><i class="fa fa-home sidebar-icon" aria-hidden="true"></i> <span>{{ $t('menu_home') }}</span></router-link></li>  
                <li class="active">
                    <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-newspaper-o  sidebar-icon" aria-hidden="true"></i> <span>{{ $t('menu_news') }}</span>
                    </a>
                    <ul class="collapse list-unstyled" id="submenu1">
                        <li>
                            <router-link to="/news">Danh sách tin tức</router-link>
                        </li>
                        <li>
                            <router-link to="/news/create">Thêm tin tức</router-link>
                        </li>
                    </ul>
                </li>
                <li><router-link to="/"><i class="fa fa-cog  sidebar-icon" aria-hidden="true"></i> <span>Liên hệ</span></router-link></li>
            </ul>

            <div class="sidebar-lang">
                <LanguageChange></LanguageChange>
            </div>
        </nav> 
    </div>
</template>

<script>

import LanguageChange from './LanguageChange.vue';

export default {
    name: "sliderbar",
    components:{LanguageChange},
}
</script>

<style scoped>
.sidebar-lang{
    padding: 10px;
}
.sidebar-icon {
    width: 30px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}
</style>

