<template>
    
    <section class="newsIndex">
        <div class="newsIndex__data">
            <a-table bordered :dataSource="listNews" :columns="columns" rowKey='id'>
                <div slot="status" slot-scope="text, record">
                    <div v-if="record.status == 1">
                        <a-switch :disabled="true" defaultChecked /> <span>Hiện</span>
                    </div>
                    <div v-else>
                        <a-switch /> <span>Ẩn</span>
                    </div>
                </div>
                <div slot="author" slot-scope="text, record">
                    meobeodamdang
                </div>
                <div slot="action" slot-scope="text, record">
                    <a :href="record.link" target="_BLANK" class="action action--view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <router-link :to="'/news/edit/' + record.id" class="action action--edit"><i class="fa fa-pencil" aria-hidden="true"></i></router-link>
                    <a-popconfirm
                        title="Bạn chắc chán muốn xóa ?"
                        @confirm="remove(record.id)"
                        okText="OK"
                        cancelText="Cancel"
                    >
                    <a class="action action--del"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </a-popconfirm>
                </div>
            </a-table>
            <div class="avpagination newsIndex__data__pagination">
                <a-pagination @change="setPage" v-model="config.page" :total="config.total" showLessItems />
            </div>
        </div>
        
    </section>

</template>

<script>


export default {
    data() {
        return {
            listNews: [],
            config: {
                pageSize: 10,
                page: 1,
                total: 0,
            },
            columns: [
                { title: 'Stt', dataIndex: 'id', key: 'id' },
                { title: 'Tiếu đề', dataIndex: 'title', key: 'title' },
                { title: 'Tác giả', dataIndex: 'author', key: 'author', scopedSlots: { customRender: 'author' } },
                { title: 'Ngày đăng', dataIndex: 'created_at_format', key: 'created_at_format' },
                { title: 'Trạng thái', dataIndex: 'status', key: 'status', scopedSlots: { customRender: 'status' } },
                { title: '', dataIndex: '', key: 'action', scopedSlots: { customRender: 'action' }},
            ],
        }
    },
    mounted() {
        this.getListNews();
    },
    methods: {
        setPage(page) {
            this.config.page = page;
        },
        remove(id) {
            axios.post(api('news.remove'), {id})
            .then((response) => { 
                this.getListNews();
            });
        },
        getListNews() {
            var params = {
                pageSize: this.config.pageSize,
                page: this.config.page,
            };

            axios.get(`${api('news.get')}?limit=${params.pageSize}&page=${params.page}`)
            .then((response) => {
                this.listNews = response.data.data,
                this.config.total = response.data.total
                this.config.curent = response.data.current_page
                this.config.last = response.data.last_page
            })
        }
    },

    watch: {
        'config.page': function() {
            this.getListNews();
        }
    }
}
</script>

<style lang="scss">
.ant-pagination-jump-next,
.ant-pagination-item-link,
.ant-pagination-item {
    display: inline-flex!important;
    align-items: center;
    justify-content: center;
    min-width: 32px!important;
}
.action {
    border-radius: 4px;
    width: 24px;
    height: 24px;
    display: inline-flex;
    align-items: center; 
    justify-content: center;

    &--view{
        background-color: #ebebeb;
        color: #333;
        &:hover {
            color: #333;
        }
    }
    &--edit {
        background-color: #f39b13;
        color: #fff;
        &:hover {
            color: #fff;
        }
    }
    &--del {
        background-color: #dc3333;
        color: #fff!important;
        &:hover {
            color: #fff;
        }
    }
}
.newsIndex {
    .ant-table-pagination.ant-pagination {
        display: none;
    }

    &__data {
        table {
            th .ant-table-column-title{
                font-weight: bold;
            }
        }
        &__pagination {
            margin-top: 40px;
            text-align: center;
        }
    }
    
}
    
</style>